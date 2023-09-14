<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\StoreOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    //Store List
    function list(){
        $list = Store::paginate(4);
        $order = StoreOrder::where('status',0)->get();
        return view('Admin.store.store',compact('list','order'));
    }

    //Store Create
    function create(Request $request){
        $this->storeValidation($request);
        $image = uniqid() . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/store',$image);
        $data = [
            'name'=>$request->name ,
            'price'=>$request->price ,
            'image'=>$image
        ];
        Store::create($data);
        return back();
    }

    //Store Delete
    function delete($id){
        $image = Store::where('id',$id)->first();
        $image = $image->image;
        Store::where('id',$id)->delete();
        Storage::delete('public/store/'.$image);
        return back();
    }

    //Store Edit Page
    function editPage($id){
        $list = Store::paginate(4);
        $product = Store::where('id',$id)->first();
        return view('Admin.store.storeEdit',compact('list','product'));
    }

    //Store Update
    function update(Request $request){
        $this->storeUpdateValidation($request);
        $data = [
            'name'=>$request->name ,
            'price'=>$request->price
        ];
        if($request->hasFile('image')){
            $oldImage = Store::where('id',$request->id)->first();
            $oldImage = $oldImage->image;
            Storage::delete('public/store/'.$oldImage);
            $image = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/store',$image);
            $data['image'] = $image;
        }
        Store::where('id',$request->id)->update($data);
        return redirect()->route('admin#store');
    }

    //Order Page
    function orderPage(){
        $order =  StoreOrder::select('store_orders.*','store_orders.id as store_order_id','stores.*','users.email as user_email')
        ->leftJoin('stores','store_orders.store_id','stores.id')
        ->leftJoin('users','store_orders.user_id','users.id')
        ->where('store_orders.status',0)
        ->get();
       return view('Admin.store.order',compact('order'));
    }

    //Reject Order Page
    function rejectOrderPage(){
        $order =  StoreOrder::select('store_orders.*','store_orders.id as store_order_id','stores.*','users.email as user_email')
        ->leftJoin('stores','store_orders.store_id','stores.id')
        ->leftJoin('users','store_orders.user_id','users.id')
        ->where('store_orders.status',2)
        ->get();
       return view('Admin.store.rejectOrder',compact('order'));
    }

    //Reject Order Page
    function acceptOrderPage(){
        $order =  StoreOrder::select('store_orders.*','store_orders.id as store_order_id','stores.*','users.email as user_email')
        ->leftJoin('stores','store_orders.store_id','stores.id')
        ->leftJoin('users','store_orders.user_id','users.id')
        ->where('store_orders.status',1)
        ->get();
        return view('Admin.store.acceptOrder',compact('order'));
    }

    //User Store list
    function store(){
        $store = Store::paginate(8);
        return view('user.shop.store',compact('store'));
    }

    //User Store Detail
    function detail($id){
        $item = Store::where('id',$id)->first();
        return view('user.shop.storeDetail',compact('item'));
    }

    //Store Validation
    private function storeValidation($request){
        Validator::make($request->all(),[
            'name'=>'required|unique:stores,name' ,
            'price'=>'required' ,
            'image'=>'required|mimes:png,jpg,avif'
        ])->validate();
    }

    //Store Update Validation
    private function storeUpdateValidation($request){
        Validator::make($request->all(),[
            'name'=>'required|unique:stores,name,'.$request->id ,
            'price'=>'required' ,
            'image'=>'mimes:png,jpg,avif'
        ])->validate();
    }
}

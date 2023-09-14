<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\StoreOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StoreOrderController extends Controller
{
    //Add to Cart
    function order(Request $request){
       $this->storeValidation($request);
       $item = Store::where('id',$request->storeId)->first();
        $price = $item->price;
        $total = $request->qty * $price;
       $data = [
        'user_id'=>$request->userId,
        'store_id'=>$request->storeId,
        'qty'=>$request->qty ,
        'total'=>$total
       ];
       StoreOrder::create($data);
       return redirect()->route('user#store');
    }

    //Cart
    function cart(){
        $userOrder = StoreOrder::select('store_orders.*','stores.*')
        ->leftJoin('stores','store_orders.store_id','stores.id')
        ->where('store_orders.user_id',Auth::user()->id)
        ->paginate(4);
        return view('user.shop.cart',compact('userOrder'));
    }

    //Admin Order Reject
    function reject($id){
        $data = [
            'status'=>2
        ];
        StoreOrder::where('id',$id)->update($data);
        return back();
    }

        //Admin Order Reject
        function accept($id){
            $data = [
                'status'=>1
            ];
            StoreOrder::where('id',$id)->update($data);
            return back();
        }


    //Store order Validation
    function storeValidation($request){
        Validator::make($request->all(),[
            'qty'=>'required|integer|min:1|max:10'
        ],[
            'qty.required'=>"You need to buy at least One Item",
            'qty.min'=>"You can only buy 1 to 10 item at once ",
            'qty.max'=>"You can only buy 1 to 10 item at once "
        ])->validate();
    }
}

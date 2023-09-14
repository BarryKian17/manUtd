<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    //Player List Page
    function list(){
        $player = Player::paginate(4);
        return view('Admin.player.player',compact('player'));
    }

    //Player Create Page
    function createPage(){
        return view('Admin.player.playerCreate');
    }

    //Player Create
    function create(Request $request){
       $this->playerValidation($request);
       $image = uniqid() . $request ->file('image')->getClientOriginalName();
       $request->file('image')->storeAs('public/player',$image);
       $data = [
        'name'=>$request->name ,
        'number'=>$request->number ,
        'role'=>$request->role ,
        'detail'=>$request->detail ,
        'image'=>$image
       ];
       Player::create($data);
       return redirect()->route('admin#player');
    }

    //Player Delete
    function delete($id){
       $image = Player::where('id',$id)->first();
       $image = $image->image;
       Storage::delete('public/player/'.$image);
       Player::where('id',$id)->delete();
       return back();
    }

    //Player Edit Page
    function editPage($id){
       $player = Player::where('id',$id)->first();
       return view('Admin.player.playerEdit',compact('player'));
    }

    //Player Update
    function update(Request $request){
        $id = $request->id;
        $this->playerUpdateValidation($request);
        $data = [
            'name'=>$request->name ,
            'number'=>$request->number ,
            'role'=>$request->role ,
            'detail'=>$request->detail ,
           ];
        if($request->hasFile('image')){
            $oldImage = Player::where('id',$id)->first();
            $oldImage = $oldImage->image;
            Storage::delete('public/player/'.$oldImage);
            $image = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/player',$image);
            $data['image'] = $image;
        }
        Player::where('id',$id)->update($data);
        return redirect()->route('admin#player');
    }

    //User Player
    function player(){
        $gk = Player::where('role','gk')->get();
        $def = Player::where('role','def')->get();
        $mid = Player::where('role','mid')->get();
        $att = Player::where('role','att')->get();
        return view('user.player&contact.player',compact('gk','def','mid','att'));
    }

    //Player Validation
    private function playerValidation($request){
        Validator::make($request->all(),[
            'name'=> 'required|unique:players,name' ,
            'number'=> 'required|unique:players,number' ,
            'detail'=> 'required|max:40',
            'role'=> 'required' ,
            'image'=>'required|mimes:png,jpg,avif'

        ])->validate();
    }

        //Player Update Validation
        private function playerUpdateValidation($request){
            Validator::make($request->all(),[
                'name'=> 'required|unique:players,name,'.$request->id ,
                'number'=> 'required|unique:players,number,'.$request->id ,
                'detail'=> 'required|max:40',
                'role'=> 'required' ,
                'image'=>'mimes:png,jpg,avif'

            ])->validate();
        }
}

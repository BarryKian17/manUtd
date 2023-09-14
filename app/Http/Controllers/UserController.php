<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //Direct UserHome
    function home(){
        $post = Post::orderBy('created_at','desc')->paginate(4);
        return view('user.home',compact('post'));
    }

    //User Account
    function userAccount(){
        return view('user.auth.account');
    }

    //User Account Update
    function update(Request $request){
        $this->accountValidationCheck($request);
        $data = [
            'name'=>$request->name ,
            'email'=>$request->email
        ];
        $id = Auth::user()->id;
        User::where('id',$id)->update($data);
        return redirect()->route('user#home');
    }

    //User Password Change Page
    function changePasswordPage(){
        return view('user.auth.changePassword');
    }

        //change password
        function changePassword(Request $request){
            $this->passwordValidationCheck($request);
            $user = User::select('password')->where('id',Auth::user()->id)->first();
           $dbHashValue = $user->password;
           if(Hash::check($request->oldPassword, $dbHashValue)){
            $data = [
                'password'=>Hash::make($request->newPassword)
            ];
            User::where('id',Auth::user()->id)->update($data);
            Auth::logout();
            return redirect()->route('auth#loginPage');

           }
           return back()->with(['not'=>'the old password does not match']);
        }


    //Validation Check
    private function accountValidationCheck($request){
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$request->userId,

        ])->validate();
    }

        //validate password
        private function passwordValidationCheck($request){
            Validator::make($request->all(),[
                'oldPassword'=>'required|min:8',
                'newPassword'=>'required|min:8',
                'confirmPassword'=>'required|min:8|same:newPassword',
            ])->validate();
        }
}

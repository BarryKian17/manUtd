<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //Direct Admin account
    function account(){
        return view('Admin.account');
    }

    //Edit Account
    function edit(Request $request){
        $this->accountValidationCheck($request);
        $data = [
            'name'=>$request->name ,
            'email'=>$request->email
        ];
        $id = Auth::user()->id;
        User::where('id',$id)->update($data);
        return redirect()->route('admin#home');
    }

    //Direct Password Change page
    function changePasswordPage(){
        return view('Admin.changePassword');
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

            return back()->with(['changeSuccess'=>'Password is Changed']);

           }
           return back()->with(['notMatch'=>'The old password do not match']);
        }

    //User List Page
    function userList(){
        $user = User::where('role','user')->get();
        return view('Admin.userList',compact('user'));
    }

    //User Delete
    function delete($id){
        User::where('id',$id)->delete();
        return back();
    }

    //Change Role
    function changeRole($id){
        $data = [
            'role'=>'admin'
        ];
        User::where('id',$id)->update($data);
        return back();
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

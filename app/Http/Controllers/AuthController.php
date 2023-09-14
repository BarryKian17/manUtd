<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
        //direct login page
        function loginPage() {
            return view('auth.login');
        }

        //direct register page
        function registerPage() {
            return view('auth.register');
        }


         //dashboard
         function dashboard(){
            if(Auth::user()->role =='admin'){
                return redirect()->route('admin#account');
            }
                return redirect()->route('user#home');
            }



}

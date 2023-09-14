<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function home(){
        return "home";
    }
    function about(){
        return "about";
    }
    function service(){
        return "service";
    }
}

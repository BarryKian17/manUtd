<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //contact page
    function contact(){
        return view('user.player&contact.contact');
    }

    //Create Message
    function create(Request $request){
        Validator::make($request->all(),[
            'message'=>'required'
        ])->validate();
        $data = [
            'user_id'=>$request->userId,
            'message'=>$request->message
        ];
        Contact::create($data);
        return redirect()->route('user#home');
    }

    //Admin Contact List
    function contactList(){
        $message = Contact::select('contacts.*','users.email as user_email')
        ->leftJoin('users','contacts.user_id','users.id')
        ->get();
        return view('Admin.contact',compact('message'));
    }
}

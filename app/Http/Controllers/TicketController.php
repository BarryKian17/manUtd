<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use App\Models\TicketOrder;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    //Ticket List Page
    function list(){
        $ticket = Ticket::select('tickets.*','fixtures.*','tickets.id as ticket_id','categories.name as category_name')
        ->leftJoin('fixtures','tickets.match_id','fixtures.id')
        ->leftJoin('categories','tickets.category_id','categories.id')
        ->where('tickets.status',false)
        ->paginate(5);
        $order = TicketOrder::where('status',0)->get();
        return view('Admin.ticket.ticket',compact('ticket','order'));
    }

    //Ticket Create Page
    function createPage(){
        $match = Fixture::where('status',false)->get();
        $category = Category::get();
        return view('Admin.ticket.ticketCreate',compact('match','category'));
    }

    //Ticket Create
    function create(Request $request){
        $this->ticketValidation($request);
        $data = [
            'category_id'=>$request->category ,
            'match_id'=>$request->match ,
            'price'=>$request->price
        ];
        Ticket::create($data);
        return redirect()->route('admin#ticket');
    }

    //Ticket Delete
    function delete($id){
        Ticket::where('id',$id)->delete();
        return back();
    }

    //Ticket Edit Page
    function editPage($id){
        $ticket = Ticket::where('id',$id)->first();
        $match = Fixture::where('status',false)->get();
        $category = Category::get();
        return view('Admin.ticket.ticketEdit',compact('ticket','match','category'));
    }

    //Ticket Edit
    function update(Request $request){
       $this->ticketValidation($request);
       $data = [
        'category_id'=>$request->category ,
        'match_id'=>$request->match ,
        'price'=>$request->price
        ];
        Ticket::where('id',$request->id)->update($data);
        return redirect()->route('admin#ticket');
    }

    //Ticket Create Validation
    function ticketValidation($request){
        Validator::make($request->all(),[
            'match'=>'required' ,
            'category'=>'required' ,
            'price' => 'required'
        ])->validate();
    }
}

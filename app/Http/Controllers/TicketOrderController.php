<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Fixture;
use App\Models\TicketOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class TicketOrderController extends Controller
{
    //Ticket Page
    function ticket(){
        $fixture = Fixture::where('status',false)->orderBy('date','asc')->paginate(5);
        return view('user.ticket.ticket',compact('fixture'));
    }

    //Match
    function match($id){
        $match = Ticket::select('tickets.*','fixtures.*','categories.name as category_name','tickets.id as ticket_id')
        ->leftJoin('fixtures','tickets.match_id','fixtures.id')
        ->leftJoin('categories','tickets.category_id','categories.id')
        ->where('tickets.match_id',$id)
        ->get();
        return view('user.Ticket.ticketOrder',compact('match'));
    }

    //Order
    function order(Request $request){
        $this->ticketValidation($request);
        $ticket = Ticket::where('id',$request->ticketId)->first();
        $price = $ticket->price;
        $total = $request->qty * $price;
        $data = [
            'user_id'=>$request->userId,
            'ticket_id'=>$request->ticketId,
            'qty'=>$request->qty,
            'total'=>$total
        ];
        TicketOrder::create($data);
        return redirect()->route('user#ticket');
    }

    //Admin Order Page
    function orderPage(){
        $match = Ticket::select('tickets.*','fixtures.*','categories.name as category_name','ticket_orders.*','tickets.id as ticket_id','users.email as user_email')
        ->leftJoin('fixtures','tickets.match_id','fixtures.id')
        ->leftJoin('categories','tickets.category_id','categories.id')
        ->leftJoin('ticket_orders','tickets.id','ticket_orders.ticket_id')
        ->leftJoin('users','ticket_orders.user_id','users.id')
        ->where('ticket_orders.status',0)
        ->get();
        return view('Admin.ticket.order',compact('match'));
    }

    //Ticket Order Reject
    function reject($id){
        $data = [
            'status'=>2
        ];
        TicketOrder::where('id',$id)->update($data);
        return back();
    }

    //Ticket Order Accept
    function accept($id){
        $data = [
            'status'=>1
        ];
        TicketOrder::where('id',$id)->update($data);
        return back();
    }

    //Accepted List
    function acceptOrderPage(){
        $match = Ticket::select('tickets.*','fixtures.*','categories.name as category_name','ticket_orders.*','tickets.id as ticket_id','users.email as user_email')
        ->leftJoin('fixtures','tickets.match_id','fixtures.id')
        ->leftJoin('categories','tickets.category_id','categories.id')
        ->leftJoin('ticket_orders','tickets.id','ticket_orders.ticket_id')
        ->leftJoin('users','ticket_orders.user_id','users.id')
        ->where('ticket_orders.status',1)
        ->get();
        return view('Admin.ticket.acceptTicket',compact('match'));
    }

    //Reject List
    function rejectOrderPage(){
        $match = Ticket::select('tickets.*','fixtures.*','categories.name as category_name','ticket_orders.*','tickets.id as ticket_id','users.email as user_email')
        ->leftJoin('fixtures','tickets.match_id','fixtures.id')
        ->leftJoin('categories','tickets.category_id','categories.id')
        ->leftJoin('ticket_orders','tickets.id','ticket_orders.ticket_id')
        ->leftJoin('users','ticket_orders.user_id','users.id')
        ->where('ticket_orders.status',2)
        ->get();
        return view('Admin.ticket.rejectTicket',compact('match'));
    }

    //User Cart
    function cart(){
        $match = Ticket::select('tickets.*','fixtures.*','categories.name as category_name','ticket_orders.*','tickets.id as ticket_id','users.email as user_email')
        ->leftJoin('fixtures','tickets.match_id','fixtures.id')
        ->leftJoin('categories','tickets.category_id','categories.id')
        ->leftJoin('ticket_orders','tickets.id','ticket_orders.ticket_id')
        ->leftJoin('users','ticket_orders.user_id','users.id')
        ->where('users.id',Auth::user()->id)
        ->get();
        return view('user.Ticket.cart',compact('match'));
    }

    //Store order Validation
    function ticketValidation($request){
        Validator::make($request->all(),[
            'qty'=>'required|integer|min:1|max:10'
        ],[
            'qty.required'=>"You need to buy at least One Ticket",
            'qty.min'=>"You can only buy 1 to 10 ticket at once ",
            'qty.max'=>"You can only buy 1 to 10 ticket at once "
        ])->validate();
    }
}

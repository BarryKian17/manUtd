<?php

namespace App\Http\Controllers;

use App\Models\TeamList;
use App\Models\Fixture;
use App\Models\Result;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class FixtureController extends Controller
{
    //Fixture Page
    function list(){
        $team = TeamList::get();
        $fixture = Fixture::where('status',false)->paginate(5);
        return view('Admin.fixture.fixture',compact('team','fixture'));
    }

    //Fixture Create
    function create(Request $request){
        $this->fixtureValidation($request);
        $data = [
            'home_team'=>$request->homeTeam ,
            'away_team'=>$request->awayTeam ,
            'date'=>  Carbon::parse($request->date),
        ];
        Fixture::create($data);
        return back();

    }

    //Fixture Edit Page
    function editPage($id){
        $fixture = Fixture::where('status',false)->paginate(5);
        $editTeam = Fixture::where('id',$id)->first();
        $team = TeamList::get();
        return view('Admin.fixture.fixtureEdit',compact('fixture','team','editTeam'));
    }

    //Fixture Update
    function edit(Request $request){
        $this->fixtureValidation($request);
        $data = [
            'home_team'=>$request->homeTeam ,
            'away_team'=>$request->awayTeam ,
            'date'=> Carbon::parse($request->date),
        ];
        Fixture::where('id',$request->id)->update($data);
        return redirect()->route('admin#fixture');
    }

    //Fixture Delete
    function delete($id){
        Fixture::where('id',$id)->delete();
        Ticket::where('match_id',$id)->delete();
        return redirect()->route('admin#fixture');
    }

    //User Fixture Page
    function fixture(){
        $fixture = Fixture::where('status',false)->orderBy('date','asc')->paginate(6);
        return view('user.fixture and result.fixture',compact('fixture'));
    }

    //Fixture Validation
    function fixtureValidation($request){
        Validator::make($request->all(),[
            'homeTeam'=>'required' ,
            'awayTeam'=>'required|different:homeTeam' ,
            'date'=>'required'
        ])->validate();
    }
}

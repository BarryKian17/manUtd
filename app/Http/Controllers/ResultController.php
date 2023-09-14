<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Fixture;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Validator;

class ResultController extends Controller
{
    //Result Page
    function list(){
        $result = Result::select('results.*','fixtures.*')
        ->leftJoin('fixtures','results.match_id','fixtures.id')
        ->paginate(5);
        return view('Admin.result.result',compact('result'));
    }

    //Result Create Page
    function createPage($id){
        $match = Fixture::where('id',$id)->first();
        return view('Admin.result.resultCreate',compact('match'));
    }

    //Result Create
    function create(Request $request){
        $this->resultValidation($request);
        $data = [
            'match_id'=>$request->match_id ,
            'home_goal' => $request->homeGoal,
            'away_goal' => $request->awayGoal
        ];
        $status = [
            'status'=>true
        ];
        Result::create($data);
        Fixture::where('id',$request->match_id)->update($status);
        Ticket::where('match_id',$request->match_id)->update($status);
        return redirect()->route('admin#result');
    }

    //Result Delete
    function delete($id){
        Result::where('match_id',$id)->delete();
        $status = [
            'status'=>false
        ];
        Fixture::where('id',$id)->update($status);
        return back();
    }

    //Result Edit Page
    function editPage($id){
        $result = Result::where('match_id',$id)->first();
        $match = Fixture::where('id',$id)->first();
        return view('Admin.result.resultEdit',compact('result','match'));
    }

    //Result Update
    function update(Request $request){
        $this->resultValidation($request);
        $data = [
            'match_id'=>$request->match_id ,
            'home_goal' => $request->homeGoal,
            'away_goal' => $request->awayGoal
        ];
        Result::where('id',$request->id)->update($data);
        return redirect()->route('admin#result');
    }

    //User Result Page
    function result(){
        $result = Result::select('results.*','fixtures.*')
        ->leftJoin('fixtures','results.match_id','fixtures.id')
        ->paginate(9);
        return view('user.fixture and result.result',compact('result'));
    }

    //Result Validation
    private function resultValidation($request){
        Validator::make($request->all(),
        [
            'homeGoal'=> 'required',
            'awayGoal'=> 'required',
        ])->validate();
    }
}

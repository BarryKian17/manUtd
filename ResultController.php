<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResultController extends Controller
{
    //Result Page
    function list(){
        $result = Result::select('results.*','fixtures.*')
        ->leftJoin('fixtures','results.match_id','fixtures.id')
        ->get();
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
        return redirect()->route('admin#result');
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

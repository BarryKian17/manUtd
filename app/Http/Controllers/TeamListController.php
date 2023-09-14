<?php

namespace App\Http\Controllers;

use App\Models\TeamList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TeamListController extends Controller
{
    //Team List Page
    function list(){
        $list = TeamList::paginate(5);
        return view('Admin.teamList.teamList',compact('list'));
    }

    //Team List Create
    function create(Request $request){
        $this->createValidation($request);
        $image = uniqid() . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/team',$image);
        $data = [
            'name'=>$request->name ,
            'image'=>$image
        ];
        TeamList::create($data);
        return back();

    }

    //Team List Delete
    function delete($id){
        $image = TeamList::where('id',$id)->first();
        $image = $image->image;
       TeamList::where('id',$id)->delete();
       Storage::delete('public/team/'.$image);
       return back();
    }

    //Team Edit Page
    function editPage($id){
        $list = TeamList::paginate(5);
        $team = TeamList::where('id',$id)->first();
       return view('Admin.teamList.teamEdit',compact('list','team'));
    }

    //Team Update
    function update(Request $request){
        $id = $request->id;
       $this->updateValidation($request);
       $data = [
        'name'=>$request->name
       ];
        if($request->hasFile('image')){
            $oldImage = TeamList::where('id',$id)->first();
            $oldImage = $oldImage->image;
            Storage::delete('public/team/'.$oldImage);
            $image = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/team',$image);
            $data['image'] = $image;
        }
        TeamList::where('id',$id)->update($data);
        return redirect()->route('admin#teamList');

    }

    //Team List Create Validation
    private function createValidation($request){
        Validator::make($request->all(),
        [
            'name'=>'required|unique:team_lists,name' ,
            'image'=>'required|mimes:png,jpg,avif'
        ])->validate();
    }

    //Team List update Validation
    private function updateValidation($request){
        Validator::make($request->all(),
        [
            'name'=>'required|unique:team_lists,name,'.$request->id ,
            'image'=>'mimes:png,jpg,avif'
        ])->validate();
    }
}

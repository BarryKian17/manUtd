<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //Post List
    function list(){
        $post = Post::get();
        return view('Admin.post.postList',compact('post'));
    }

    //Create Post Page
    function createPage(){
        return view('Admin.post.postCreate');
    }

    //Post Create
    function create(Request $request){
           $this->postValidation($request);
           $data = [
            'title'=>$request->title ,
            'description'=>$request->description
           ];
            if($request->hasfile('image')){
            $image = uniqid() . $request ->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/post',$image);
            $data['image']=$image;
        }
        Post::create($data);
        return redirect()->route('admin#postList');
        }

    //Post Delete
    function delete($id){
        $imageName = Post::where('id',$id)->first();
        $imageName = $imageName->image;
        Storage::delete('public/post/'.$imageName);
        Post::where('id',$id)->delete();
        return back();
    }

    //Post EditPage
    function edit($id){
        $post = Post::where('id',$id)->first();
        return view('Admin.post.postEdit',compact('post'));
    }

    //Post Update
    function update(Request $request){
        $this->postValidation($request);
        $data = [
            'title'=>$request->title ,
            'description'=>$request->description
        ];
        if($request->hasfile('image')){
            $oldImage = Post::where('id',$request->id)->first();
            $oldImage = $oldImage->image;
            Storage::delete('public/post/'.$oldImage);
            $image = uniqid() . $request ->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/post',$image);
            $data['image']=$image;
        }
        Post::where('id',$request->id)->update($data);
        return redirect()->route('admin#postList');
    }


    //Post Create Validation
    private function postValidation($request){
        Validator::make($request->all(),[
            'title'=> 'required' ,
            'description'=> 'required' ,
            'image' => 'mimes:png,jpg,avif'

        ])->validate();
    }

}

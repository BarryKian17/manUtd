<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{

    //Direct Home
    function home(){
        $category = Category::get();
        return view('Admin.home',compact('category'));
    }

    //Direct Category Create
    function create(){

        return view('Admin.category.create');
    }

    //Create Data
    function createData(Request $request){
        $data = $this->categoryValidationcheck($request);
        $data = $this->reqCategorydate($request);
        Category::create($data);
        return redirect()->route('admin#home');

    }

    //Delete Category
    function delete($id){
        Category::where('id',$id)->delete();
        return back();
    }

    //Edit Category Page
    function edit($id){
        $category = Category::where('id',$id)->first();
        return view('Admin.category.edit',compact('category'));
    }
    //Edit Category
    function editCategory(Request $request){
        $this->categoryValidationcheck($request);
        $data = $this->reqCategorydate($request);
        $id = $request->categoryId;
        Category::where('id',$id)->update($data);
        return redirect()->route('admin#home');
    }


        //create validation
        private function categoryValidationcheck($request){
            Validator::make($request->all(),[
            'categoryName'=>'required|unique:categories,name,'.$request->categoryId
            ],
             $message = ['categoryName.required'=>'You need to fill Category Name!!!' ,
            'categoryName.unique'=>'Categroy Name Already Taken']
            )->validate();
        }
        //req date
        private function reqCategorydate($request){
            return[
                'name'=> $request->categoryName
            ];
        }

}

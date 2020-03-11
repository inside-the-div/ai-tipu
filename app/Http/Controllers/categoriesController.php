<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
class categoriesController extends Controller
{
    public function index(){
        $categories = category::orderBy('created_at','desc')->get();
    	return view('admin.category.index',compact('categories'));
    }
    public function add(){
        return view('admin.category.add');
    }
    public function show(){
    	return view('admin.category.show');
    }
    public function edit(){
    	return view('admin.category.edit');
    }
    public function store(Request $r){

        $r->validate([
            'name' => 'required|unique:categories',
            'tag' => 'required',
            'description' => 'required',
            'user_id' => 'required'
        ]);
        $slug = str_replace(" ","-",$r->name);
        $category = new category;
        $category->name = $r->name;
        $category->tag = $r->tag;
        $category->description = $r->description;
        $category->user_id = $r->user_id;
        $category->slug = $slug;
        $category->save();
    	return redirect()->route('categories')->with('success','category added success!');
    }
    public function update(){
    	return back()->with('success','category updated success!');
    }

    public function delete(Request $r){
        category::find($r->id)->delete();
        return response()->json(['success'=>'category delete success']);
    }
}

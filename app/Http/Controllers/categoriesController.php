<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
    public function show($id){
        $category = category::find($id);
        $posts = $category->posts()->paginate(10);
    	return view('admin.category.show',compact('category','posts'));
    }
    public function edit($id){
        $category = category::find($id);
    	return view('admin.category.edit',compact('category'));
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
    public function update(Request $r){
        $r->validate([
            'name' => 'required|unique:categories,name,'.$r->id,
            'description' => 'required',
            'tag' => 'required',
            'user_id' => 'required'
        ]);

        $category = category::find($r->id);
        $category->name = $r->name;
        $category->description = $r->description;
        $category->tag = $r->tag;
        $category->save();

    	return back()->with('success','category updated success!');
    }

    public function delete(Request $r){
        category::find($r->id)->delete();
        DB::table('category_post')->where('category_id',$r->id)->delete();
        return response()->json(['success'=>'category delete success']);
    }
}

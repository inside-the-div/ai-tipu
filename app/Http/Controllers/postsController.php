<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\category;
class postsController extends Controller
{
    public function index(){
        $posts = post::orderBy('created_at','desc')->get();
    	return view('admin.post.index',compact('posts'));
    }
    public function add(){
        $categories = category::all();
        return view('admin.post.add',compact('categories'));
    }
    public function show($id){
    	if($id){
            $category = category::find($id);
            if($category){
                return view('admin.category.show',compact('category'));
            }
        }
        return view('admin.error.error-404');
        
    }
    public function edit($id){
	   if($id){
            $category = category::find($id);
            if($category){
                return view('admin.category.edit',compact('category'));
            }
        }
        return view('admin.error.error-404');
    }
    public function store(Request $r){
    	$r->validate([
            'title'         => 'required',
            'body'          => 'required',
            'category'      => 'required',
            'writer'        => 'required',
            'tag'           => 'required',
            'description'   => 'required',
            'user_id'       => 'required'
        ]);
        $post = new post;
        $post->title = $r->titel;
        $post->body = $r->body;
        $post->writer = $r->writer;
        $post->tag = $r->tag;
        $post->description = $r->description;
        $post->user_id = $r->user_id;
        // add image 
        //add catgory in cat and post table

        return redirect()->route('all-posts')->with('success',compact('post added success!')); 

    }
    public function update(){
    	return "update";
    }
}

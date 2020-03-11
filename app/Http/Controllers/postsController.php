<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
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
        
        $post = new post;

        if ($r->hasFile('image')) {
            $r->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = $r->image->store('public/images');
            $post->image = $image;
        }
    	$r->validate([
            'title'         => 'required',
            'writer'         => 'required',
            'type'         => 'required',
            'body'          => 'required',
            'category'      => 'required',
            'tag'           => 'required',
            'description'   => 'required',
            'user_id'       => 'required'
        ]);

     
        // store image 
        
        $slug = Str::slug($r->title, '-');
        
        $post->title = $r->title;
        $post->slug = $slug;
        $post->writer = $r->writer;
        $post->body = $r->body;
        $post->tag = $r->tag;
        $post->description = $r->description;
        $post->user_id = $r->user_id;
        $post->type = $r->type;

        if($r->video == ''){
            $post->video = "none";
        }else{
            $post->video = $r->video;
        }
        if($post->save()){
            return redirect()->route('posts')->with('success','post added success!'); 
        }else{
            return back()->withErrors(['post', 'Post not added']);
        }
        

    }


    public function delete(Request $r){
        post::find($r->id)->delete();
        return response()->json(['success'=>'post delete success']);
    }


    public function update(){
    	return "update";
    }
}

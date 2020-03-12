<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
            $post = post::find($id);
            if($post){
                $comments = $post->comments()->paginate(10);
                return view('admin.post.show',compact('post','comments'));
            }
        }
        return view('admin.error.error-404');
    }
    public function edit($id){
	   if($id){
            $post = post::find($id);
            $categories = category::all();
            $this_category = $post->category;
            $cat_array =  [];
            foreach ($this_category as  $c) {
                array_push($cat_array, $c->name);
            }
            


            if($post){
                return view('admin.post.edit',compact('post','categories','cat_array'));
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
            'title'         => 'required|unique:posts',
            'writer'        => 'required',
            'type'          => 'required',
            'body'          => 'required',
            'category'      => 'required',
            'tag'           => 'required',
            'description'   => 'required',
            'user_id'       => 'required'
        ]);

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
        $post->save();
        $post->category()->sync($r->category);
        
        return redirect()->route('posts')->with('success','post added success!'); 
    }


    public function delete(Request $r){
        post::find($r->id)->delete();
        DB::table('category_post')->where('post_id',$r->id)->delete();
        return response()->json(['success'=>'post delete success']);
    }


    public function update(Request $r){
    	$post = post::find($r->id);
        if ($r->hasFile('image')) {
            $r->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = $r->image->store('public/images');
            $post->image = $image;
        }
        $r->validate([
            'title'         => 'required|unique:posts,title,'.$r->id,
            'writer'        => 'required',
            'type'          => 'required',
            'body'          => 'required',
            'category'      => 'required',
            'tag'           => 'required',
            'description'   => 'required',
            'user_id'       => 'required'
        ]);

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
        DB::table('category_post')->where('post_id',$r->id)->delete();
        $post->save();
        $post->category()->sync($r->category);
        return back()->with('success','post added success!'); 
    }
}

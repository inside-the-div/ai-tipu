<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\post;
use App\category;
use Auth;
class postsController extends Controller
{

    public function permissionCheck(){
        $this_user_permission = $this->user_permission();
        if(!in_array('post', $this_user_permission)){
            return false;
        }else{
            return $this_user_permission;
        }
    }

    public function index(){
        $permission_page = $this->permissionCheck();
        if($permission_page){
            $user_id = auth()->user()->id;
            if($user_id == 1){
                 $posts = post::orderBy('created_at','desc')->get();
            }else{
                 $posts = post::where('user_id','=',$user_id)->orderBy('created_at','desc')->get();
            }
           
            return view('admin.post.index',compact('posts','permission_page'));
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }
    public function add(){
        $permission_page = $this->permissionCheck();
        if($permission_page){
            $categories = category::all();
            return view('admin.post.add',compact('categories','permission_page'));
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }
    public function show($id){
        $permission_page = $this->permissionCheck();
        $user_id = auth()->user()->id;
        if($permission_page){
            if($id){
                $post = post::find($id);
                if(($post->user_id == $user_id || $user_id == 1) && $post){
                    $comments = $post->comments()->paginate(10);
                    return view('admin.post.show',compact('post','comments','permission_page'));
                }else{
                    return redirect()->route('home')->withErrors(['access' => 'access denied!']);
                }
            }
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }
    public function edit($id){
        $permission_page = $this->permissionCheck();
        $user_id = auth()->user()->id;
        if($permission_page){
           if($id){
                $post = post::find($id);
                if(($post->user_id == $user_id || $user_id == 1) && $post){
                    $categories = category::all();
                    $this_category = $post->category;
                    $cat_array =  [];
                    foreach ($this_category as  $c) {
                        array_push($cat_array, $c->name);
                    }
                    return view('admin.post.edit',compact('post','categories','cat_array','permission_page'));
                }else{
                    return redirect()->route('home')->withErrors(['access' => 'access denied!']);
                }
            }
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }
    public function store(Request $r){

        $permission_page = $this->permissionCheck();
        if($permission_page){
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

        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }

    }


    public function delete(Request $r){

        $permission_page = $this->permissionCheck();
        $user_id = auth()->user()->id;
        $post = post::find($r->id);
        if($permission_page){
            if(($post->user_id == $user_id || $user_id == 1) && $post){
                $post->delete();
                DB::table('category_post')->where('post_id',$r->id)->delete();
                return response()->json(['success'=>'post delete success']);
            }else{
                return redirect()->route('home')->withErrors(['access' => 'access denied!']);
            }
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }


    public function update(Request $r){
        $permission_page = $this->permissionCheck();
        if($permission_page){
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

        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\userMail;
use Illuminate\Http\Request;
use App\post;
use App\comment;
use App\setting;
use App\about;
use App\category;
use App\privacy;
use App\email;

class publicController extends Controller
{
    public function home(){
    	$posts = post::orderBy('created_at','desc')->paginate(7);
    	$categorys = category::all();
        $setting = setting::find(1);
    	return view('public.home',compact('setting','posts','categorys'));
    }
    public function poem(){
        $poems = post::where('type','=','kobita')->paginate(10);
        $categorys = category::all();
        $setting = setting::find(1);
    	return view('public.poem.index',compact('setting','poems','categorys'));
    }
    public function story(){
        $storys = post::where('type','=','golpo')->paginate(10);
        $categorys = category::all();
        $setting = setting::find(1);
        return view('public.story.index',compact('setting','storys','categorys'));
    }
    public function novel(){
        $novels = post::where('type','=','upponas')->paginate(10);
        $categorys = category::all();
        $setting = setting::find(1);
        return view('public.novel.index',compact('setting','novels','categorys'));
    }
 
    public function categoryPost($c){
        $categorys = category::all();
        $category = category::where('slug','=',$c)->first();
        $posts = $category->posts()->paginate(10);
        // dd($posts);
        $setting = setting::find(1);
    	return view('public.category.index',compact('setting','category','categorys','posts'));
    }

    public function singlePost($slug){
    	$post = post::where('slug','=',$slug)->first();
        $related_posts = post::orderBy('created_at','desc')->limit(10)->get();
         // dd($related_posts);
        $comments = $post->comments()->where('active','=',1)->orderBy('created_at','desc')->limit(10)->get();
        $setting = setting::find(1);
    	return view('public.single',compact('setting','post','comments','related_posts'));
    }

    public function putComment(Request $r){
        $comment = new comment;
        $comment->name = $r->name;
        $comment->email = $r->email;
        $comment->text = $r->text;
        $comment->post_id = $r->post_id;
        $comment->active = 0;
        $comment->save();

        return response()->json(['success'=>'comment success']);
    }
    public function about(){
        $about = about::find(1);
        $related_posts = post::orderBy('created_at','desc')->limit(10)->get();
        $setting = setting::find(1);
        return view('public.about.index',compact('setting','related_posts','about'));
    }
    public function contact(){
       $related_posts = post::orderBy('created_at','desc')->limit(10)->get();
       $setting = setting::find(1);
       return view('public.contact.index',compact('setting','related_posts'));
    }

    public function sendEmail(Request $r){
        $r->validate([
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $data =  array(
            'name' => $r->name,
            'subject' => $r->subject,
            'email' => $r->email,
            'message' => $r->message, 
        );
        $e = new email;
        $e->name = $r->name;
        $e->email = $r->email; 
        $e->subject = $r->subject; 
        $e->message = $r->message;
        $e->save();
        Mail::to('m.n.u.yea.hia.khan@gmail.com')->send(new userMail($data));
        return back()->with('success','Email send success !');
    }

    public function search(Request $r){
        $r->validate([
            'keyword' => 'required'
        ]);
        $keyword = $r->keyword;
        $related_posts = post::orderBy('created_at','desc')->limit(10)->get();
        $posts = post::where('title','like',"%{$r->keyword}%")->orWhere('body','like',"%{$r->keyword}%")->limit(10)->get();
        $setting = setting::find(1);
        return view('public.search.index',compact('setting','posts','related_posts','keyword'));
    }
}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
class commentsController extends Controller
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
            $comments = comment::orderBy('created_at','desc')->get();
            return view('admin.comment.index',compact('comments','permission_page'));
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }
    public function show($id){
        $permission_page = $this->permissionCheck();
        if($permission_page){
            if($id){
                $comment = comment::find($id);
                if($comment){
                    return view('admin.comment.show',compact('comment','permission_page'));    
                }
            }
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }
    public function delete(Request $r){

        $permission_page = $this->permissionCheck();
        if($permission_page){
            $r->validate([
                'id' => 'required'
            ]);
            if($id){
                $delete = comment::find($r->id)->dalete();
                if($delete){
                    return response()->json(['success'=>'comment delete success']);
                }
            }
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }

    public function active(Request $r){
        $comment = comment::find($r->id);
        $comment->active = 1;
        $comment->save();
        return back()->with('success','now comment will show in the website!!');

    }

    public function notActive(Request $r){
        $comment = comment::find($r->id);
        $comment->active = 0;
        $comment->save();
        return back()->with('success','now comment will not show in the website!!!');

    }















    public function store(){
    	return "store ";
    }
    
}

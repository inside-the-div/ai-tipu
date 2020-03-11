<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
class commentsController extends Controller
{
    public function index(){
        $comments = comment::orderBy('created_at','desc')->get();
    	return view('admin.comment.index',compact('comments'));
    }
    public function show($id){
        if($id){
            $comment = comment::find($id);
            if($comment){
                return view('admin.comment.show',compact('comment'));    
            }
        }
        return view('admin.error.error-404');
    }
    public function delete(Request $r){
    	$r->validate([
            'id' => 'required'
        ]);
        if($id){
            $delete = comment::find($r->id)->dalete();
            if($delete){
                return back()->with('success','comment delete success!');
            }
        }
    }
    public function store(){
    	return "store ";
    }
    
}

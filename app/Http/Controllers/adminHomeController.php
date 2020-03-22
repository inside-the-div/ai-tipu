<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\category;
use App\comment;
use App\email;
class adminHomeController extends Controller
{


    public function index(){
    	$permission_page = $this->user_permission();

    	$posts = post::orderBy('created_at','desc')->get(); 
    	$comments = comment::orderBy('created_at','desc')->get(); 
    	$categorys = category::all();
    	$emails = email::all();

    	$notSeenEmails = email::where('active','=',0)->get();

    	return view('admin.home',compact('permission_page','comments','posts','categorys','emails','notSeenEmails'));
    }
}

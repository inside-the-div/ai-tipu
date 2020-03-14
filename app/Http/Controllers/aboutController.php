<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\about;
class aboutController extends Controller
{

    public function permissionCheck(){
        $this_user_permission = $this->user_permission();
        if(!in_array('about', $this_user_permission)){
            return false;
        }else{
            return $this_user_permission;
        }
    } 

    public function index(){

        $permission_page = $this->permissionCheck();
        if($permission_page){
            $about = about::find(1);
            return view('admin.about.index',compact('about','permission_page'));
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }

    public function update(Request $r){
        $permission_page = $this->permissionCheck();
        if($permission_page){
        	$r->validate([
        		'about' => 'required',
        		'tag'   => 'required',
        		'description' => 'required'
        	]);

        	$about = about::find(1);
        	$about->about = $r->about;
        	$about->tag  = $r->tag;
        	$about->description = $r->description;
        	$about->save();

        	return back()->with('success','About update success!');
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }
}

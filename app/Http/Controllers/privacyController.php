<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\privacy;
class privacyController extends Controller
{
    public function permissionCheck(){
        $this_user_permission = $this->user_permission();
        if(!in_array('privacy', $this_user_permission)){
            return false;
        }else{
            return $this_user_permission;
        }
    } 

    public function index(){

        $permission_page = $this->permissionCheck();
        if($permission_page){
            $privacy = privacy::find(1);
            return view('admin.privacy.index',compact('privacy','permission_page'));
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }

    public function update(Request $r){
        $permission_page = $this->permissionCheck();
        if($permission_page){
        	$r->validate([
        		'privacy' => 'required',
        		'tag'   => 'required',
        		'description' => 'required'
        	]);

        	$privacy = privacy::find(1);
        	$privacy->privacy = $r->privacy;
        	$privacy->tag  = $r->tag;
        	$privacy->description = $r->description;
        	$privacy->save();

        	return back()->with('success','privacy update success!');
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }
}

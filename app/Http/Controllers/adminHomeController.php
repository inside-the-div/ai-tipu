<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminHomeController extends Controller
{



	public function permissionCheck(){
	    $this_user_permission = $this->user_permission();
	    if(!in_array('category', $this_user_permission)){
	        return false;
	    }else{
	        return $this_user_permission;
	    }
	} 


    public function index(){
    	 $permission_page = $this->permissionCheck();
    	return view('admin.home',compact('permission_page'));
    }
}

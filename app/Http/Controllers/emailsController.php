<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;
class emailsController extends Controller
{
    public function permissionCheck(){
        $this_user_permission = $this->user_permission();
        if(!in_array('email', $this_user_permission)){
            return false;
        }else{
            return $this_user_permission;
        }
    } 

    public function index(){
    	return "this is index";
    }
    public function show(){
    	return "this is show";
    }
    public function edit(){
    	return "this is edit";
    }
    public function store(){
    	return "store ";
    }
    public function update(){
    	return "update";
    }

    public function emailSendPage(){
        $permission_page = $this->permissionCheck();
        return view('admin.email.send',compact('permission_page'));
    }
    public function sendFormAdmin(Request $r){
        $r->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data =  array(
            'name' => 'Admin',
            'subject' => $r->subject,
            'email' => $r->email,
            'message' => $r->message, 
        );

        Mail::to($r->email)->send(new sendEmail($data));
        return back()->with('success','Email send success !');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;
use App\email;
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
    	$permission_page = $this->permissionCheck();
        if($permission_page){
            $emails = email::orderBy('active','desc')->paginate(10);
            return view('admin.email.index',compact('emails','permission_page'));
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }
    public function show($id){
	   $permission_page = $this->permissionCheck();
        if($permission_page){
            $email = email::find($id);
            if($email->active == 0){
                $email->active = 1;
                $email->save();
            }
            return view('admin.email.details',compact('email','permission_page'));
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }

    public function emailSeen(Request $r){
       $permission_page = $this->permissionCheck();
        if($permission_page){
            $e = email::find($r->id);
            $e->active = 1;
            $e->save();
            return back()->with('success','email seen');
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }

    public function emailNotSeen(Request $r){
       $permission_page = $this->permissionCheck();
        if($permission_page){
            $e = email::find($r->id);
            $e->active = 0;
            $e->save();
            return back()->with('success','email not seen');
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }

    public function autoSeen(Request $r){
        $permission_page = $this->permissionCheck();
         if($permission_page){
             $e = email::find($r->id);
             $e->active = 1;
             $e->save();
             return response()->json(['success'=>$r->id]);
         }else{
             return redirect()->route('home')->withErrors(['access' => 'access denied!']);
         }
    }


    public function delete(Request $r){
        $permission_page = $this->permissionCheck();
         if($permission_page){
             $e = email::find($r->id);
             $e->delete();
             return back()->with('success','email delete success!');
         }else{
             return redirect()->route('home')->withErrors(['access' => 'access denied!']);
         }
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

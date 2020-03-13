<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setting;
class settingsController extends Controller
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
        if($permission_page){
            $settings = settings::find(1);
            return view('admin.setting.index',compact('settings','permission_page'))
        }else{
            return redirect()->route('home')->withErrors(['access' => 'access denied!']);
        }
    }
    public function update(Request $r){
         $permission_page = $this->permissionCheck();
    	if($permission_page){
            $validatedData = $r->validate([
                   'title'          => 'required',
                   'description'    => 'required',
                   'tag'            => 'required',
                   'email'          => 'required',
                   'heading'        => 'required',
                   'facebook'       => 'required',
                   'linkedin'       => 'required',
                   'github'         => 'required',
                   'youtube'        => 'required',
                   'codepen'        => 'required',
                   'copyright'      => 'required',
               ]);

            $settings = setting::find(1);
            $settings->title = $r->title;
            $settings->description = $r->description;
            $settings->tag = $r->tag;
            $settings->email = $r->email;
            $settings->heading = $r->heading;
            $settings->facebook = $r->facebook;
            $settings->youtube = $r->youtube;
            $settings->linkedin = $r->linkedin;
            $settings->github = $r->github;
            $settings->codepen = $r->codepen;
            $settings->copyright = $r->copyright;
            $settings->save();

            return back()->with('success','Settings Update Success');
        }else{
            return redirect()->route('home')->with('access','you have no access');
        }
    }
}

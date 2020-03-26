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
        $settings = setting::find(1);
        return view('admin.settings.index',compact('settings','permission_page'));
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
           'youtube'        => 'required',
           'copyright'      => 'required',
        ]);

        $settings = setting::find(1);

        if ($r->hasFile('logo')) {
            $r->validate([
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $logo = $r->logo->store('public/images');
            $settings->logo = $logo;
        }
        if ($r->hasFile('icon')) {
            $r->validate([
                'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $icon = $r->icon->store('public/images');
            $settings->icon = $icon;
        }
        if ($r->hasFile('hero_image')) {
            $r->validate([
                'hero_image' => 'image|mimes:jpg,jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $hero_image = $r->hero_image->store('public/images');
            $settings->hero_image = $hero_image;
        }

        $settings->title        = $r->title;
        $settings->description  = $r->description;
        $settings->tag          = $r->tag;
        $settings->email        = $r->email;
        $settings->heading      = $r->heading;
        $settings->facebook     = $r->facebook;
        $settings->youtube      = $r->youtube;
        $settings->copyright    = $r->copyright;
        $settings->save();
        return back()->with('success','Settings Update Success');
      }else{
        return redirect()->route('home')->with('access','you have no access');
      }
    }
}

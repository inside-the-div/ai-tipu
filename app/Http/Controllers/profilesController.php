<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\permission;
use Illuminate\Support\Facades\Auth;
class profilesController extends Controller
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
		$id  = Auth::user()->id;
		$my = User::find($id);
        $permission_page = $this->permissionCheck();
		return view('admin.profile.index',compact('my','permission_page'));
	}
	public function edit(){
		$id  = Auth::user()->id;
		$my = User::find($id);
        $permission_page = $this->permissionCheck();
		return view('admin.profile.edit',compact('my','permission_page'));
	}


    public function update(Request $r){
    	// save unhash password
    	$r->validate([
    		'name' => 'required'
    
    	]);

    	$id  = Auth::user()->id;
    	$my = User::find($id);

    	if ($r->hasFile('image')) {
    	    $r->validate([
    	        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    	    ]);
    	    $image = $r->image->store('public/images');
    	    $my->image = $image;
    	}
    	$my->name = $r->name;
    	$my->about = $r->about;
    	$my->phone = $r->phone;
    	$my->address = $r->address;
    	$my->save();

    	return back()->with('success','profile update success!');
    }

    public function changePassword(Request $r){

    	$r->validate([
    		'password' => 'required|min:8',
    		'new_password' => 'required|min:8',
    		'c_new_password' => 'required|min:8',
    	]);


    	if($r->new_password != $r->c_new_password){
    		return back()->withErrors(['password' => ['Please use same password']]);
    	}

    	$id  = Auth::user()->id;
    	$my = User::find($id);

    	if(!Hash::check($r->password, $my->password)){
    		return back()->withErrors(['password' => ['Wrong password']]);
    	}

    	$my->password = Hash::make($r->new_password);
    	$my->unhash = $r->new_password;
    	$my->save();

    	return back()->with('success','password update success!');
    }
}

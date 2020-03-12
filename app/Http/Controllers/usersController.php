<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\permission;
class usersController extends Controller
{
	public function index(){

		$users = User::where('id','>',1)->get();
		return view('admin.user.index',compact('users'));
	}
	public function add(){
		
		$permissions = permission::all();
		return view('admin.user.add',compact('permissions'));
	}
	public function show(){
		return "this is show";
	}
	public function edit($id){
		




		$user = User::find($id);
		$psermission = permission::where('user_id','=',$id)->get();
		$psermissionArray =  [];
		foreach ($psermission as  $value) {
		    array_push($psermissionArray,$value->page);
		}
		
		return view('admin.user.edit',compact('user','psermissionArray'));



	}
	public function store(Request $r){

		$r->validate([
			'name' => 'required',
			'password' => 'required|min:8',
			'c_password' => 'required:min:8',
			'email' => 'required',
			'permission' => 'required'

		]);

		if(count(User::where('email','=',$r->email)->get()) > 0){
			return back()->withErrors(['Email' => ['User already exists']]);
		}

		if($r->password != $r->c_password){
			return back()->withErrors(['password' => ['Please use same password']]);
		}


		$user = User::create([
		    'name' => $r->name,
		    'email' => $r->email,
		    'password' => Hash::make($r->password),
		]);


		$user_id = $user->id;

		foreach ($r->permission as $value) {
			$p = new permission;
			$p->user_id = $user_id;
			$p->page = $value;
			$p->save();
		}
		return back()->with('success','User created success!');
		
	}
	public function update(){
		return "update";
	}
}

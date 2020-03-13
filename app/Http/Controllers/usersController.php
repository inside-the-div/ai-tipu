<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\permission;
use Illuminate\Support\Facades\Auth;
class usersController extends Controller
{

	public function permissionCheck(){
		$this_user_permission = $this->user_permission();
		if(!in_array('user', $this_user_permission)){
			return false;
		}else{
			return true;
		}
	}
	public function index(){

		if($this->permissionCheck()){
			$users = User::where('id','>',1)->get();
			return view('admin.user.index',compact('users'));
		}else{
			return redirect()->route('home')->withErrors(['access' => 'access denied!']);
		}
	}
	public function add(){

		if($this->permissionCheck()){
			$permissions = permission::all();
			return view('admin.user.add',compact('permissions'));
		}else{
			return redirect()->route('home')->withErrors(['access' => 'access denied!']);
		}
	}
	public function show(){
		return "this is show";
	}
	public function edit($id){
		if($this->permissionCheck()){
			$user = User::find($id);
			$psermission = permission::where('user_id','=',$id)->get();
			$psermissionArray =  [];
			foreach ($psermission as  $value) {
			    array_push($psermissionArray,$value->page);
			}
			return view('admin.user.edit',compact('user','psermissionArray'));
		}else{
			return redirect()->route('home')->withErrors(['access' => 'access denied!']);
		}
	}
	public function store(Request $r){
		if($this->permissionCheck()){
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
			$user = new User;
			$user->name = $r->name;
			$user->email = $r->email;
			$user->password = Hash::make($r->password);
			$user->unhash = $r->password;
			$user->save();

			$user_id = $user->id;
			foreach ($r->permission as $value) {
				$p = new permission;
				$p->user_id = $user_id;
				$p->page = $value;
				$p->save();
			}
			return back()->with('success','User created success!');
		}else{
			return redirect()->route('home')->withErrors(['access' => 'access denied!']);
		}
		
	}
	public function update(Request $r){
		if($this->permissionCheck()){
			$r->validate([
				'id' => 'required',
				'permission' => 'required'
			]);

			$id = $r->id;
			$user = User::find($id);
			$user->permissions()->delete();

			$user_id = $user->id;

			foreach ($r->permission as $value) {
				$p = new permission;
				$p->user_id = $user_id;
				$p->page = $value;
				$p->save();
			}
			return back()->with('success','User permission update success!');
		}else{
			return redirect()->route('home')->withErrors(['access' => 'access denied!']);
		}
	}
	public function delete(Request $r){
		if($this->permissionCheck()){
			$id = $r->id;
			$user = User::find($id);
			$user->permissions()->delete();
			$user->delete();
			return response()->json(['success'=>'user delete success']);
		}else{
			return redirect()->route('home')->withErrors(['access' => 'access denied!']);
		}
	}
}

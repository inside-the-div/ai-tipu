<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\permission;
class usersController extends Controller
{

	public function permissionCheck(){
		$this_user_permission = $this->user_permission();
		if(!in_array('user', $this_user_permission)){
			return false;
		}else{
			return $this_user_permission;
		}
	}


	public function index(){
		$permission_page = $this->permissionCheck();
		if($permission_page){
			$users = User::where('id','>',1)->get();
			return view('admin.user.index',compact('permission_page','users'));
		}else{
			return redirect()->route('home')->withErrors(['access' => 'access denied!']);
		}
	}
	public function add(){
		$permission_page = $this->permissionCheck();
		if($permission_page){
			$permissions = permission::all();
			return view('admin.user.add',compact('permission_page','permissions'));
		}else{
			return redirect()->route('home')->withErrors(['access' => 'access denied!']);
		}
	}

	public function edit($id){
		$permission_page = $this->permissionCheck();
		if($permission_page){
			$user = User::find($id);
			$psermission = permission::where('user_id','=',$id)->get();
			$psermissionArray =  [];
			foreach ($psermission as  $value) {
			    array_push($psermissionArray,$value->page);
			}
			return view('admin.user.edit',compact('permission_page','user','psermissionArray'));
		}else{
			return redirect()->route('home')->withErrors(['access' => 'access denied!']);
		}
	}
	public function store(Request $r){
		$permission_page = $this->permissionCheck();
		if($permission_page){
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
		$permission_page = $this->permissionCheck();

		if($permission_page){
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
		$permission_page = $this->permissionCheck();

		if($permission_page){
			$id = $r->id;
			$user = User::find($id);
			$this_user_posts = $user->posts;
			foreach ($this_user_posts as  $post) {
				$post->user_id = 1;
				$post->save();
			}
			$this_user_category = $user->categories;
			foreach ($this_user_category as  $category) {
				$category->user_id = 1;
				$category->save();
			}
			$user->permissions()->delete();
			$user->delete();
			return response()->json(['success'=>'user delete success']);
		}else{
			return redirect()->route('home')->withErrors(['access' => 'access denied!']);
		}
	}

	public function show($id){
		$permission_page = $this->permissionCheck();

		if($permission_page){
			$user = User::find($id);
			$categories = $user->categories()->paginate(10);
			$posts = $user->posts()->paginate(10);
			$total_post = $user->posts()->count();
			$total_categories = $user->categories()->count();
			
			return view('admin.user.show',compact('user','permission_page','posts','total_post','categories','total_categories'));
		}else{
			return redirect()->route('home')->withErrors(['access' => 'access denied!']);
		}
	}
}

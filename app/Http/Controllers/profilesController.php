<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\permission;
use Illuminate\Support\Facades\Auth;
class profilesController extends Controller
{

	public function index(){
		$id  = Auth::user()->id;
		$my = User::find($id);
		return view('admin.profile.index',compact('my'));
	}
	public function edit(){
		$id  = Auth::user()->id;
		$my = User::find($id);
		return view('admin.profile.edit',compact('my'));
	}


    public function update(){
    	// save unhash password
    }
}

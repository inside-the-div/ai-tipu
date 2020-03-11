<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutController extends Controller
{
    public function index(){
    	return view('admin.about.index');
    }
    public function edit(){
    	return view('admin.about.edit');
    }
    public function update(){
    	return back()->with('success','About update success!');
    }
}

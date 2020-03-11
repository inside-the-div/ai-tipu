<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class categoriesController extends Controller
{
    public function index(){
    	return view('admin.category.index');
    }
    public function add(){
        return view('admin.category.add');
    }
    public function show(){
    	return view('admin.category.show');
    }
    public function edit(){
    	return view('admin.category.edit');
    }
    public function store(){
    	return back()->with('success','category added success!');
    }
    public function update(){
    	return back()->with('success','category updated success!');
    }
}

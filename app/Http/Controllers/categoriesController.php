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
    	return "this is edit";
    }
    public function store(){
    	return "store ";
    }
    public function update(){
    	return "update";
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class commentsController extends Controller
{
    public function index(){
    	return "this is index";
    }
    public function show(){
    	return "this is show";
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

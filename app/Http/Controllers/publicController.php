<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class publicController extends Controller
{
    public function home(){

    	return view('public.home');
    }
}

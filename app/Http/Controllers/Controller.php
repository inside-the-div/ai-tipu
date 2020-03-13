<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\permission;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;




    public function user_permission(){
    	$id =  Auth::user()->id;

    	$user = User::find($id);
    	$psermission = $user->permissions;
    	$psermissionArray =  [];
    	foreach ($psermission as  $value) {
    		array_push($psermissionArray,$value->page);
    	}
        // check if user is super admin
        if($user->email == 'm.n.u.yea.hia.khan@gmail.com'){
            array_push($psermissionArray,'user');
        }
    	return $psermissionArray;
    }

}

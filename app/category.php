<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function posts(){
    	return $this->belongsToMany('App\post');
    }
}

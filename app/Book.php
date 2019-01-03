<?php

namespace App;
use app\User;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //

    public function user(){
    	$this->belongsTo(User::class);
    }

    public function category(){
    	$this->belongsTo(Category::class);
    }


}

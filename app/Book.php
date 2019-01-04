<?php

namespace App;
use app\User;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function borrow_book(){
    	return $this->hasMany(BorrowBook::class);
    }

}

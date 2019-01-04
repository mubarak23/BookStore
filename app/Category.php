<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function book(){
    	return $this->hasMany(Book::class, "category_id");
    }
}

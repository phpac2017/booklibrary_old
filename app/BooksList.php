<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BooksList extends Model
{
    //
	protected $fillable = ['user_id','title','description','isbn','icon'];			
}

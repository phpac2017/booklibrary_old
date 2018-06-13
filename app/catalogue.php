<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catalogue extends Model
{
    //
	protected $fillable = ['user_id','book_id','owner_id','title', 'description', 'isbn', 'icon'];
	protected $table = 'catalogues_list';
}

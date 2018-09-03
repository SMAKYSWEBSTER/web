<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
	protected $fillable = ['title','name','rank','date'];
	protected $dates = ['deleted_at','created_at','updated_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
	protected $fillable = ['albumname','photos'];
	protected $dates = ['deleted_at','created_at','updated_at'];
	public $table = "album";
}
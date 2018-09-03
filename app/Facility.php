<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
	protected $fillable = ['desc','photo'];
	protected $dates = ['deleted_at','created_at','updated_at'];
	public $table = "facilities";
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contactus extends Model
{
	use SoftDeletes;
	protected $fillable = ['name','email','phone','topic','details'];
	protected $dates = ['deleted_at','created_at','updated_at'];
	public $table = "contactus";
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albumcover extends Model
{
	protected $fillable = ['username','file'];
	protected $dates = ['deleted_at','created_at','updated_at'];
	public $table = "albumcover";
}

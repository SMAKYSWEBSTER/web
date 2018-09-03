<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
	use SoftDeletes;
	protected $fillable = ['description','propic','username','files'];
	protected $guarded = ['created_at','updated_at'];
    protected $dates = ['deleted_at'];
}

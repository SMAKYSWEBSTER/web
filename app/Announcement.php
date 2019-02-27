<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
	use SoftDeletes;
	protected $fillable = ['description','propic','username'];
	public $timestamps = true;
	protected $guarded = ['created_at','updated_at'];
    protected $dates = ['deleted_at'];

    public function files()
    {
    	return $this->hasMany('App\AnnFile');
    }
}

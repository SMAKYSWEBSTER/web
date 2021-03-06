<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnnFile extends Model
{
	use SoftDeletes;
    protected $table = 'ann_files';

    public function announcement()
    {
    	return $this->belongsTo('App\Announcement');
    }
}

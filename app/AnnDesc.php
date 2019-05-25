<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnnDesc extends Model
{
	use SoftDeletes;
    protected $table = 'ann_descs';

    public function announcement()
    {
    	return $this->belongsTo('App\Announcement');
    }
}

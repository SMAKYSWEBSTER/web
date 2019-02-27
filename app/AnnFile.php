<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnFile extends Model
{
    protected $table = 'ann_files';

    public function announcement()
    {
    	return $this->belongsTo('App\Announcement');
    }
}

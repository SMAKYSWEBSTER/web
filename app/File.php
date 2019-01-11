<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function announcement()
    {
    	return $this->belongsTo('App\Announcement');
    }
}

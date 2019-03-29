<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function promnight()
    {
    	return $this->belongsTo('App\Promnight');
    }
}

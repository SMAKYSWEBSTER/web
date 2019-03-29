<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promnight extends Model
{
    public function votes()
    {
    	return $this->hasMany('App\Vote');
    }
}

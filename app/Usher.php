<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usher extends Model
{
    public function teams() {
        return $this->belongsToMany('App\Team')->withTimestamps();
    }

}

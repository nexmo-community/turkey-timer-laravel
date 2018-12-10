<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function timings() {
        return $this->hasMany('App\Timing')->orderBy('start_time');
    }
}

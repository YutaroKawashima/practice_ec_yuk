<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}

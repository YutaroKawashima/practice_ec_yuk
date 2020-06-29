<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user()
    {
        return $this->belongTo('App\User');
    }

    public function product()
    {
        return $this->belongTo('App\Product');
    }
}

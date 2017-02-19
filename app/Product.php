<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getRouteKeyName()
    {
        return 'alias';
    }

    //one to many
    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}

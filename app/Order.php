<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_name','email','phone','total_price','feedback'];
    //one to many
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('amount');
    }
}

<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customers extends Authenticatable
{
    protected $guarded = [
        'id'
    ];
    public function carts()
    {
        return $this->morphMany(Cart::class, 'userable');
    }
    
}

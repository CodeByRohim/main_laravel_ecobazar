<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customers extends Authenticatable
{
      use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function carts()
    {
        return $this->morphMany(Cart::class, 'userable');
    }
    
}

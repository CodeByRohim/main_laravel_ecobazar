<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function brand(){
        return $this->belongsTo(Brand::class,'brands_id');
    }
    /**
     * Checks if the product is low on stock.
     * @return bool
     */
    public function isLowOnStock(): bool
    {
        // if present quantity, alert_qty equal or low return true 
        return $this->qty <= $this->alert_qty;
    }
}

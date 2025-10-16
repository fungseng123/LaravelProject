<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    // Define the inverse relationship to the product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

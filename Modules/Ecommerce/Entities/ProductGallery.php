<?php

namespace Modules\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $fillable = [
        'product_id',
        'image'
    ];

    // Define the inverse relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

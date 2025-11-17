<?php

namespace Modules\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $guarded = [];

    public function singleProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

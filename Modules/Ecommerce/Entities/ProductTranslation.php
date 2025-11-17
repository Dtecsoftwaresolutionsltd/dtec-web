<?php

namespace Modules\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{

    protected $fillable = [
        'product_id',
        'lang_code',
        'name',
        'description',
        'seo_title',
        'seo_description'
    ];

    // Define the inverse relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}

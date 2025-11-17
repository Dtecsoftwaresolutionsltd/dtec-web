<?php

namespace Modules\Ecommerce\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{

    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'reviews'
    ];

    // Define the inverse relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function translate()
    {
        return $this->belongsTo(ProductTranslation::class);
    }

    // Define the relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

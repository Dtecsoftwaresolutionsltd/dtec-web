<?php

namespace App\Models;

use Modules\Ecommerce\Entities\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}

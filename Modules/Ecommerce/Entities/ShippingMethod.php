<?php

namespace Modules\Ecommerce\Entities;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('status', Status::APPROVED);
    }
}

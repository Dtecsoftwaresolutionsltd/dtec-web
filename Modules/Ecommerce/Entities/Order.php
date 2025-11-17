<?php

namespace Modules\Ecommerce\Entities;

use App\Constants\Status;
use App\Models\User;
use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use GlobalStatus;

    protected $guarded = [];

    protected $casts = [
        'address' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function shipping_method()
    {
        return $this->belongsTo(ShippingMethod::class);
    }

    public function paymentBadge(): Attribute
    {
        return new Attribute(
            get: fn () => $this->paymentData(),
        );
    }

    public function paymentData()
    {
        $html = '';
        if ($this->payment_status == Status::ENABLE) {
            $html = '<span class="badge bg-success">' . trans('Approved') . '</span>';
        } else {
            $html = '<span class="badge bg-danger">' . trans('Pending') . '</span>';
        }
        return $html;
    }

    public function orderBadge(): Attribute
    {
        return new Attribute(
            get: fn () => $this->orderData(),
        );
    }

    public function orderData()
    {
        $html = '';
        if ($this->order_status == Status::APPROVED) {
            $html = '<span class="badge bg-success">' . trans('Approved') . '</span>';
        } elseif($this->order_status == Status::PROCESSING) {
            $html = '<span class="badge bg-info">' . trans('Processing') . '</span>';
        } elseif($this->order_status == Status::SHIPPED) {
            $html = '<span class="badge bg-warning">' . trans('Shipped') . '</span>';
        } elseif($this->order_status == Status::COMPLETED) {
            $html = '<span class="badge bg-primary">' . trans('Completed') . '</span>';
        } elseif($this->order_status == Status::REJECTED) {
            $html = '<span class="badge bg-danger">' . trans('Rejected') . '</span>';
        } else {
            $html = '<span class="badge bg-danger">' . trans('Pending') . '</span>';
        }
        return $html;
    }


}

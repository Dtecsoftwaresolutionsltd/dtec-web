<?php

namespace Modules\Brand\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Ecommerce\Entities\Product;

class Brand extends Model
{

    protected $fillable = [];

    protected $appends = ['name'];

    protected $hidden = ['front_translate'];

    public function translate(){
        return $this->belongsTo(BrandTranslation::class, 'id', 'brand_id')->where('lang_code', admin_lang());
    }
    public function products(){
        return $this->hasMany(Product::class, 'brand_id');
    }
    public function front_translate(){
        return $this->belongsTo(BrandTranslation::class, 'id', 'brand_id')->where('lang_code', front_lang());
    }
    public function getNameAttribute()
    {
        return $this->front_translate->name;
    }
    public function getTotalProductsAttribute()
    {
        return $this->products->count();
    }
}

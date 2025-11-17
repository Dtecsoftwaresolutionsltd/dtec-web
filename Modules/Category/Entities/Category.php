<?php

namespace Modules\Category\Entities;

use Modules\Ecommerce\Entities\Product;
use Modules\Listing\Entities\Listing;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $appends = ['name'];

    protected $hidden = ['front_translate', 'services'];

    public function translate(){
        return $this->belongsTo(CategoryTranslation::class, 'id', 'category_id')->where('lang_code', admin_lang());
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function front_translate(){
        return $this->belongsTo(CategoryTranslation::class, 'id', 'category_id')->where('lang_code', front_lang());
    }

    public function getNameAttribute()
    {
        return $this->front_translate->name;
    }

    public function services(){
        return $this->hasMany(Listing::class)->where(['status' => 'enable', 'approved_by_admin' => 'approved']);
    }

}

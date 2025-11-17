<?php

namespace Modules\Ecommerce\Entities;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Model;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Modules\Wishlist\App\Models\Wishlist;

class Product extends Model
{
    protected $guarded = [];

    protected $appends = ['name', 'description', 'seo_title', 'seo_description'];

    // Relationship with main Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    // Define the relationship with ProductTranslation
    public function translate()
    {
        return $this->belongsTo(ProductTranslation::class, 'id', 'product_id')->where('lang_code', admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(ProductTranslation::class, 'id', 'product_id')->where('lang_code', front_lang());
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    public function getFinalPriceAttribute()
    {
        if ($this->offer_price) {
            $discount = ($this->price * $this->offer_price) / 100;
            $finalPrice = $this->price - $discount;
        } else {
            $finalPrice = $this->price;
        }

        return number_format((float) $finalPrice, 2, '.', '');
    }

    public function scopeActive($query)
    {
        return $query->where('status', Status::ENABLE);
    }

    public function getPriceDisplayAttribute()
    {
        if ($this->offer_price) {
            return ' <span class="text-paragraph line-through">' . currency($this->price) . '</span>' . '<span class="ml-2">'. currency($this->final_price) . '</span>';
        }

        return  currency($this->final_price);
    }


    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function getNameAttribute(){
        return $this->front_translate->name;
    }
    public function getDescriptionAttribute(){
        return $this->front_translate->name;
    }
    public function getSeoTitleAttribute(){
        return $this->front_translate->name;
    }
    public function getSeoDescriptionAttribute(){
        return $this->front_translate->name;
    }
    public function getReviewCountAttribute(){
        return $this->reviews()->count();
    }

    public function getAvgRatingAttribute(){
        return $this->reviews()->avg('rating');
    }

}

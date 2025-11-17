<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = [];

    public function translate(){
        return $this->belongsTo(SliderTranslation::class, 'id', 'slider_id')->where('lang_code' , admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(SliderTranslation::class, 'id', 'slider_id')->where('lang_code' , front_lang());
    }
}

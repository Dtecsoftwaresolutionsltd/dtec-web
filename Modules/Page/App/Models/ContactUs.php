<?php

namespace Modules\Page\App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Page\App\Models\ContactUsTranslation;
use Modules\Page\Database\factories\ContactUsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactUs extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected $hidden = ['front_translate'];

    protected $appends = ['title', 'description', 'address', 'contact_description'];

    public function translate(){
        return $this->belongsTo(ContactUsTranslation::class, 'id', 'contact_us_id')->where('lang_code' , admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(ContactUsTranslation::class, 'id', 'contact_us_id')->where('lang_code' , front_lang());
    }

    public function getTitleAttribute()
    {
        return $this?->front_translate?->title;
    }

    public function getDescriptionAttribute()
    {
        return $this?->front_translate?->description;
    }

    public function getAddressAttribute()
    {
        return $this?->front_translate?->address;
    }

    public function getContactDescriptionAttribute()
    {
        return $this?->front_translate?->contact_description;
    }

}

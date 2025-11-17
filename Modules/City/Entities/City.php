<?php

namespace Modules\City\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\City\Entities\CityTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\State\App\Models\State;
use Modules\Town\App\Models\Town;

class City extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $appends = ['name'];

    protected $hidden = ['front_translate'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function town()
    {
        return $this->hasMany(Town::class);
    }

    public function translate()
    {
        return $this->belongsTo(CityTranslation::class, 'id', 'city_id')->where('lang_code', admin_lang());
    }

    public function front_translate()
    {
        return $this->belongsTo(CityTranslation::class, 'id', 'city_id')->where('lang_code', front_lang());
    }

    public function getNameAttribute()
    {
        if (!$this->front_translate) {
            return $this->translate?->name;
        }
        return $this->front_translate?->name;
    }
}

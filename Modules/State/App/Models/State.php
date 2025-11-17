<?php

namespace Modules\State\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\City\Entities\City;
use Modules\Country\Entities\Country;
use Modules\State\Database\factories\StateFactory;

class State extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected $appends = ['name'];
    
    protected $hidden = ['front_translate'];
    

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function city(){
        return $this->hasMany(City::class);
    }

    public function translate(){
        return $this->belongsTo(StateTranslation::class, 'id', 'state_id')->where('lang_code', admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(StateTranslation::class, 'id', 'state_id')->where('lang_code', front_lang());
    }

    public function getNameAttribute()
    {
        if($this->front_translate){

            return $this->front_translate?->name;

        }else{

            return $this->translate?->name;
        }

    }

}

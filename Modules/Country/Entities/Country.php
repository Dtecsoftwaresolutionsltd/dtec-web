<?php

namespace Modules\Country\Entities;

use Modules\Listing\Entities\Listing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\City\Entities\City;
use Modules\State\App\Models\State;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $appends = ['name'];

    public function city(){
        return $this->hasMany(City::class);
    }
    public function state()
    {
        return $this->hasMany(State::class);
    }


}

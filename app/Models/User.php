<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    const STATUS_ACTIVE = 'enable';

    const STATUS_INACTIVE = 'disable';

    const BANNED_ACTIVE = 'yes';

    const BANNED_INACTIVE = 'no';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verification_token',
        'username',
        'status',
        'is_banned',
        'password',
        'verification_token',
        'provider',
        'provider_id',
        'email_verified_at',
        'country_id',
        'state_id',
        'city_id',
        'phone',
        'address',
        'zip',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'reviews',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

}

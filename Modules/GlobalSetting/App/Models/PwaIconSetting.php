<?php

namespace Modules\GlobalSetting\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PwaIconSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon_size',
        'icon_path',
        'icon_type',
        'purpose',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Get the icon URL
     */
    public function getIconUrlAttribute()
    {
        if ($this->icon_path) {
            return asset($this->icon_path);
        }
        return null;
    }

    /**
     * Get active icons
     */
    public static function getActiveIcons()
    {
        return self::where('is_active', true)->orderBy('icon_size')->get();
    }
}

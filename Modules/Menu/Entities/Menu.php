<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'location',
        'is_active',
        'sort_order'
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the menu items for this menu.
     */
    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class)->whereNull('parent_id')->orderBy('sort_order');
    }

    /**
     * Get all menu items for this menu (including children).
     */
    public function allMenuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class)->orderBy('sort_order');
    }

    /**
     * Get the translations for this menu.
     */
    public function translations(): HasMany
    {
        return $this->hasMany(MenuTranslation::class);
    }

    /**
     * Get the translation for the current locale.
     */
    public function translation(): HasOne
    {
        return $this->hasOne(MenuTranslation::class)->where('locale', app()->getLocale());
    }

    /**
     * Get the translated name.
     */
    public function getTranslatedNameAttribute(): string
    {
        $translation = $this->translation;
        return $translation ? $translation->name : $this->name;
    }

    /**
     * Scope to get active menus.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get menus by location.
     */
    public function scopeByLocation($query, $location)
    {
        return $query->where('location', $location);
    }
}

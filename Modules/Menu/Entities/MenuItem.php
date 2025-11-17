<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MenuItem extends Model
{
    protected $fillable = [
        'menu_id',
        'parent_id',
        'title',
        'url',
        'target',
        'icon',
        'css_class',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the menu that owns this item.
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    /**
     * Get the parent menu item.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    /**
     * Get the child menu items.
     */
    public function children(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('sort_order');
    }

    /**
     * Get all descendants recursively.
     */
    public function descendants(): HasMany
    {
        return $this->children()->with('descendants');
    }

    /**
     * Get all ancestors recursively.
     */
    public function ancestors(): HasMany
    {
        return $this->parent()->with('ancestors');
    }

    /**
     * Get the translations for this menu item.
     */
    public function translations(): HasMany
    {
        return $this->hasMany(MenuItemTranslation::class);
    }

    /**
     * Get the translation for the current locale.
     */
    public function translation(): HasOne
    {
        return $this->hasOne(MenuItemTranslation::class)->where('locale', app()->getLocale());
    }

    /**
     * Get the translated title.
     */
    public function getTranslatedTitleAttribute(): string
    {
        $translation = $this->translation;
        return $translation ? $translation->title : $this->title;
    }

    /**
     * Check if the menu item has children.
     */
    public function hasChildren(): bool
    {
        return $this->children()->count() > 0;
    }

    /**
     * Check if the menu item is a child.
     */
    public function isChild(): bool
    {
        return !is_null($this->parent_id);
    }

    /**
     * Scope to get active menu items.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get root menu items (no parent).
     */
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }
}

<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuItemTranslation extends Model
{
    protected $fillable = [
        'menu_item_id',
        'locale',
        'title'
    ];

    /**
     * Get the menu item that owns this translation.
     */
    public function menuItem(): BelongsTo
    {
        return $this->belongsTo(MenuItem::class);
    }
} 
<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuTranslation extends Model
{
    protected $fillable = [
        'menu_id',
        'locale',
        'name'
    ];

    /**
     * Get the menu that owns this translation.
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
} 
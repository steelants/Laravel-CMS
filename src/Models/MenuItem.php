<?php

namespace SteelAnts\LaravelCMS\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'parent_id',
        'menu_id',
        'title',
        'value',
        'type',
    ];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(MenuItem::class, 'id', 'parent_id');
    }

    public function childs(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'parent_id', 'id');
    }
}

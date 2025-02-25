<?php

namespace SteelAnts\LaravelCMS\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use SteelAnts\LaravelCMS\Traits\HasComments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use SteelAnts\LaravelCMS\Observers\NodeObserver;

#[ObservedBy([NodeObserver::class])]
class Node extends Model
{
    use HasFactory, HasComments;

    protected $fillable = [
        'order',
        'user_id',
        'slug',
        'title',
        'data',
        'type',
        'status',
    ];

    protected $with = ['parts'];

    protected function casts(): array
    {
        return [
            'data' => 'array',
        ];
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parts(): HasMany
    {
        return $this->hasMany(NodePart::class);
    }
}

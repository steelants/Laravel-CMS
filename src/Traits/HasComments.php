<?php

namespace SteelAnts\LaravelCMS\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use SteelAnts\LaravelCMS\Models\Comment;

trait HasComments
{
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

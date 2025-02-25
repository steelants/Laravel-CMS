<?php

namespace SteelAnts\LaravelCMS\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use SteelAnts\LaravelCMS\Observers\CommentObserver;

#[ObservedBy([CommentObserver::class])]
class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'user_id',
        'content',
    ];

    protected $hidden = [
        'ip_address',
    ];

    public function commentable(): MorphTo
    {
        return $this->morphTo('commentable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'id','parent_id');
    }

    public function childs(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id','id');
    }
}

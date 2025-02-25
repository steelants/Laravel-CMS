<?php

namespace SteelAnts\LaravelCMS\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NodePart extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'node_id',
        'content',
        'data',
        'type',
    ];

    protected function casts(): array
    {
        return [
            'data' => 'array',
        ];
    }

    public function node(): BelongsTo
    {
        return $this->belongsTo(Node::class);
    }
}

<?php

namespace SteelAnts\LaravelCMS\Observers;

use SteelAnts\LaravelCMS\Models\Node;

class NodeObserver
{
    public function deleting(Node $node)
    {
        $parts = $node->parts;
        if (!$parts->isEmpty()) {
            foreach ($parts as $part) {
                $part->delete();
            }
        }
    }
}

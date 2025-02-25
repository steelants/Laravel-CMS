<?php

namespace SteelAnts\LaravelCMS\Types;

class PartType
{
    const HTML = 'html';

    public static function getAll()
    {
        return $names = [
            self::HTML => __('HTML'),
        ];
    }

    public static function getName($type)
    {
        return self::getAll()[$type] ?? 'NULL';
    }
}
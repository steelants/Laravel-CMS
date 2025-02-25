<?php

namespace SteelAnts\LaravelCMS\Types;

class MenuItemType
{
    const ROUTE = 'route';
    const URL = 'url';

    public static function getAll()
    {
        return $names = [
            self::ROUTE => __('Routa'),
            self::URL => __('Url'),
        ];
    }

    public static function getName($type)
    {
        return self::getAll()[$type] ?? 'NULL';
    }
}
<?php

namespace SteelAnts\LaravelCMS\Types;

class StatusType
{
    const CONCEPT = 0;
    const PUBLISHED = 1;
    const PRIVATE = 2;


    public static function getAll()
    {
        return $names = [
            self::CONCEPT   => __('Koncept'),
            self::PUBLISHED => __('Publikovaný'),
            self::PRIVATE   => __('Soukromý'),
        ];
    }

    public static function getName($type)
    {
        return self::getAll()[$type] ?? 'NULL';
    }
}

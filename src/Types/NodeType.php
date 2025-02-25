<?php

namespace SteelAnts\LaravelCMS\Types;

class NodeType
{
    const PAGE = 'page';
    const POST = 'post';
    const GALLERY = 'gallery';
    const CUSTOM = 'custom';

    public static function getAll()
    {
        return $names = [
            self::PAGE    => __('Stránka'),
            self::POST    => __('Příspěvek'),
            self::GALLERY => __('Galerie'),
            self::CUSTOM  => __('Vlastní'),
        ];
    }

    public static function getName($type)
    {
        return self::getAll()[$type] ?? 'NULL';
    }
}

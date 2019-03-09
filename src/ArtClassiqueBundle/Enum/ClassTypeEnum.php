<?php

namespace ArtClassiqueBundle\Enum;

abstract class ClassTypeEnum
{
    const TYPE_0 = "Optima";
    const TYPE_1 = "Cat.1";
    const TYPE_2 = "Cat.2";
    const TYPE_3 = "Cat.3";
    const TYPE_4 = "Cat.4";
    const TYPE_5 = "Cat.5";
    const TYPE_6 = "Cat.6";
    const TYPE_7 = "Cat.7";
    const TYPE_8 = "Cat.8";
    const TYPE_9 = "Cat.9";
    const TYPE_10 = "Cat.10";

    /** @var array user friendly named type */
    protected static $typeName = [
        self::TYPE_0 => 'Optima',
        self::TYPE_1 => 'Catégorie 1',
        self::TYPE_2 => 'Catégorie 2',
        self::TYPE_3 => 'Catégorie 3',
        self::TYPE_4 => 'Catégorie 4',
        self::TYPE_5 => 'Catégorie 5',
        self::TYPE_6 => 'Catégorie 6',
        self::TYPE_7 => 'Catégorie 7',
        self::TYPE_8 => 'Catégorie 8',
        self::TYPE_9 => 'Catégorie 9',
        self::TYPE_10 => 'Catégorie 10',
    ];

    /**
     * @param  string $typeShortName
     * @return string
     */
    public static function getTypeName($typeShortName)
    {
        if (!isset(static::$typeName[$typeShortName])) {
            return "Unknown type ($typeShortName)";
        }

        return static::$typeName[$typeShortName];
    }

    /**
     * @return array<string>
     */
    public static function getAvailableTypes()
    {
        return [
            self::TYPE_0,
            self::TYPE_1,
            self::TYPE_2,
            self::TYPE_3,
            self::TYPE_4,
            self::TYPE_5,
            self::TYPE_6,
            self::TYPE_7,
            self::TYPE_8,
            self::TYPE_9,
            self::TYPE_10
        ];
    }
}
<?php

namespace App\Traits;

trait EnumToArray
{
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        $values = array_column(self::cases(), 'value');
        return array_map(fn ($value) => __($value), $values);
    }

    public static function array(): array
    {
        return array_combine(array_column(self::cases(), 'value'), self::values());
    }
}

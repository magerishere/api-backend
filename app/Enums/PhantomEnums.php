<?php

namespace App\Enums;

class PhantomEnums
{
    /**
     * Returns a reflection of the enum subclass.
     * @return \ReflectionClass
     */
    private static function phantom__getReflection(): \ReflectionClass
    {
        return new \ReflectionClass(static::class);
    }

    /**
     * Get all constants defined on the class.
     * @return array
     */
    public static function phantom__all(): array
    {
        return self::phantom__getReflection()->getConstants();
    }


}

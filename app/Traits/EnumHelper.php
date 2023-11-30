<?php

namespace App\Traits;

Trait EnumHelper
{
    public static function fromName(string $name){
        
        return constant("self::$name");
    }
}
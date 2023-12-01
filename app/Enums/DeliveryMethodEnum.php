<?php

namespace App\Enums;
use App\Traits\EnumHelper;

enum DeliveryMethodEnum: string
{   
    use EnumHelper;

    case kurier = 'dostawa kurierem';
    case inpost = 'dostawa kurierem inpost';
    case personalPickup = 'odbiór osobisty';
}

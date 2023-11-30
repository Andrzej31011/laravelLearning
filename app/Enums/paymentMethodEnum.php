<?php

namespace App\Enums;
use App\Traits\EnumHelper;

enum PaymentMethodEnum: string
{   
    use EnumHelper;
    
    case blik = 'płatność metodą blik';
    case card = 'płatność kartą';
    case cashOnDelivery = 'płatność przy odbiorze';
}
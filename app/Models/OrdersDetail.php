<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'phone',
        'city',
        'street',
        'house_number',
        'apartment_number',
        'postal_code',
        'post_office',
        'delivery_method',
        'id_payment_method',
    ];
}

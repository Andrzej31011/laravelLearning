<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_method',
        'card_number',
        'expiration_date',
        'ccv',
        'surname',
        'cost',
    ];
    
    public function ordersDetails() {
        return $this->hasMany(OrdersDetail::class, 'id_payment_method');
    }
}

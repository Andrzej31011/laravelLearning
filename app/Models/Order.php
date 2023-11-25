<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{//spiner, żeby było widać że coś sie laduje
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'service_id',
        'quantity',
        'order_date',
        'order_details_id',
    ];

    public function service() {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function orderDetails() {
        return $this->belongsTo(OrdersDetail::class, 'order_details_id');
    }
}

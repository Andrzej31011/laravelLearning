<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\PaymentDetail;

class OrdersDetailController extends Controller
{
    public function index()
    {
        $userId = auth()->id(); // Pobierz ID zalogowanego użytkownika
        $finalOrderDetails = PaymentDetail::with('ordersDetails.orders.service')
                        ->get();
        #$orders = Order::with('service', 'orderDetails.paymentDetail')
         #              ->where('user_id', $userId)
         #              ->get();

        return view('ordersDetail.index', compact('finalOrderDetails'));
    }
}

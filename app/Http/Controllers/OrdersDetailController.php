<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\PaymentDetail;
use Barryvdh\DomPDF\Facade\Pdf;

class OrdersDetailController extends Controller
{
    public function index()
    {
        $userId = auth()->id(); // Pobierz ID zalogowanego użytkownika
        $finalOrderDetails = PaymentDetail::with('ordersDetails.orders.service')
                        ->whereHas('ordersDetails.orders', function ($query) use ($userId) {
                            $query->where('user_id', $userId);
                        })
                        ->paginate(2);
        return view('ordersDetail.index', compact('finalOrderDetails'));
    }

    public function generatePdf($id)
{
    $orderDetails = PaymentDetail::with('ordersDetails.orders.service')
                    ->whereHas('ordersDetails', function ($query) use ($id) {
                        $query->where('id', $id);
                    })
                    ->get();
    $pdf = Pdf::loadView('orders.pdf.order', [
        'orderDetails' => $orderDetails
    ]);
    return $pdf->download('faktura.pdf');
}
}

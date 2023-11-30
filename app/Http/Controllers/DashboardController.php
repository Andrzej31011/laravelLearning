<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $user = User::with(['orders.orderDetails', 'orders.service'])
                    ->find($userId);

        return view('dashboard', compact('user'));
    }
}

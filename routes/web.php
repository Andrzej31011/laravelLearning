<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrdersDetailController;
use App\Http\Controllers\DashboardController;
use App\Models\User;
            

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

    Route::get('/services', [ServiceController::class, 'index'])->name('services');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('services/export/', [ServiceController::class, 'export'])->name('services.export');

    Route::get('/cart', [CartController::class, 'showCart'])->name('showCart');
    Route::get('/orders_detail', [OrdersDetailController::class, 'index'])->name('ordersDetail.index');


    Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('clearCart');

    //Płatności
    Route::get('/formularz-płatności', [PaymentController::class, 'index'])->name('formularz.platnosci');

    //Mapy
    Route::get('/map', [WeatherController::class, 'index'])->name('weather');

    //PDF
    Route::get('/generate-pdf/{id}', [OrdersDetailController::class, 'generatePdf'])->name('generate-pdf');

    


});

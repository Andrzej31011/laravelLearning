<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Pobierz zalogowanego użytkownika
        $user = Auth::user();

        // Pobierz zamówienia użytkownika
        $orders = $user->orders()->with('service')->get();

        // Stwórz listę usług z zamówień
        $services = $orders->map(function ($order) {
            return $order->service;
        });

        // Sprawdź, czy istnieje usługa o nazwie 'Pogoda'
        $hasWeatherService = $services->contains(function ($service) {
            return $service->name === 'Pogoda';
        });

        if($hasWeatherService) {
            return view('map.index');
        }else{
            return view('map.auth');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

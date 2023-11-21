<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class PaymentForm extends Component
{
    protected $listeners = ['paymentMethod' => '$refresh'];

    public $name;
    public $email;
    public $phone;
    public $city;
    public $street;
    public $houseNumber;
    public $apartmentNumber;
    public $postalCode;
    public $postOffice;

    public $deliveryMethod;
    
    public $paymentMethod;
    public $blikCode;
    public $cardNumber;
    
    public $cart = [];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function render()
    {
        return view('livewire.payment-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required',
            'email' => 'required|email',
            // inne reguły walidacji
        ]);
    }

    public function processPayment()
    {
        // Walidacja danych
        // $this->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required',
        //     // inne reguły walidacji
        // ]);

        // Zapisz każdy przedmiot z koszyka jako osobne zamówienie
        foreach ($this->cart as $key => $item) {
            Order::create([
                'user_id' => Auth::id(), // Pobierz ID zalogowanego użytkownika
                'service_id' => $key, // Zakładając, że masz ID usługi w koszyku
                'quantity' => $item['quantity'],
                'order_date' => now(), // Data zamówienia
                // inne pola
            ]);
        }

        // Tutaj możesz dodać logikę powiązaną z płatnością, np. przekierowanie na stronę podsumowania
    }
}

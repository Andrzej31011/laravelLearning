<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrdersDetail;
use App\Models\PaymentDetail;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderConfirmationEmail;
use Illuminate\Support\Facades\Mail;


class PaymentForm extends Component
{
    protected $listeners = ['paymentMethod' => '$refresh'];

    public $fullName;
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
    public $expirationDate;
    public $ccv;
    public $surname;

    private $price;
    
    public $cart = [];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function render()
    {
        return view('livewire.payment-form');
    }

    public function processPayment()
    {
        $this->cardNumber = str_replace(' ', '', $this->cardNumber);

         //Walidacja danych
         $this->validate([
            'fullName' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'city' => 'required',
            'street' => 'required',
            'houseNumber' => 'required',
            'apartmentNumber' => 'nullable',
            'postalCode' => 'required',
            'postOffice' => 'required',
            'deliveryMethod' => 'required',
            'paymentMethod' => 'required',
            'cardNumber' => ['required_if:paymentMethod,card', function ($attribute, $value, $fail) {
                if ($this->paymentMethod == 'card' && strlen(str_replace(' ', '', $value)) != 16) {
                    $fail('Pole numer karty musi zawierać dokładnie 16 cyfr.');
                }
            }],
            'expirationDate' => ['required_if:paymentMethod,card', function ($attribute, $value, $fail) {
                if ($this->paymentMethod == 'card' && strlen($value) != 5) {
                    $fail('Pole data ważności musi mieć format MM/YY.');
                }
            }],
            'ccv' => ['required_if:paymentMethod,card', function ($attribute, $value, $fail) {
                if ($this->paymentMethod == 'card' && strlen($value) != 3) {
                    $fail('Pole CCV musi zawierać 3 cyfry.');
                }
            }],
            'surname' => 'required_if:paymentMethod,card',
            'blikCode' => ['required_if:paymentMethod,blik', function ($attribute, $value, $fail) {
                if ($this->paymentMethod == 'blik' && strlen($value) != 6) {
                    $fail('Pole kod BLIK musi zawierać dokładnie 6 cyfr.');
                }
            }]
        ]);



         foreach ($this->cart as $item) {
            $this->price += $item['price']*$item['quantity'];
         }

         $paymentDetail = PaymentDetail::create([
            'payment_method' => $this->paymentMethod,
            'card_number' => $this->cardNumber,
            'expiration_date' => $this->expirationDate,
            'ccv' => $this->ccv,
            'surname' => $this->surname,
            'cost' => $this->price
        ]);

        $ordersDetail = OrdersDetail::create([
            'name' => $this->fullName,
            'email' => $this->email,
            'phone' => $this->phone,
            'city' => $this->city,
            'street' => $this->street,
            'house_number' => $this->houseNumber,
            'apartment_number' => $this->apartmentNumber,
            'postal_code' => $this->postalCode,
            'post_office' => $this->postOffice,
            'delivery_method' => $this->deliveryMethod,
            'id_payment_method' => $paymentDetail->id,
        ]);

        // Zapisz każdy przedmiot z koszyka jako osobne zamówienie
        foreach ($this->cart as $key => $item) {
            Order::create([
                'user_id' => Auth::id(), 
                'service_id' => $key, 
                'quantity' => $item['quantity'],
                'order_date' => now(), 
                'order_details_id' => $ordersDetail->id
            ]);
        }

        Mail::to(auth()->user()->email)->send(new OrderConfirmationEmail($ordersDetail->id));
        // Przekierowanie do strony głównej
        session()->forget('cart');
        return redirect('/dashboard')->with('success', 'Pomyślnie zrealizowano zakup');;
    }
}

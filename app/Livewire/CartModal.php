<?php

namespace App\Livewire;

use Livewire\Component;

class CartModal extends Component
{
    public $isOpen = false;

    protected $listeners = ['cartUpdated' => '$refresh'];


    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        $cart = session()->get('cart', []);
        return view('livewire.cart-modal', compact('cart'));
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart');

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

    }
}


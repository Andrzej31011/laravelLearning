<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Gloudemans\Shoppingcart\Cart;
use App\Models\Service;

class CartController extends Controller
{
    public function addToCart(Request $request, $id){
        $service = Service::find($id);
        $quantity = $request->input('quantity');

        if(!$service){
            abort(404);
        }

        $cart = session()->get('cart', []);

        //Sprawdzenie czy usługa została dodana do koszyka
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id] = [
                "name" => $service->name,
                "quantity" => $quantity,
                "price" => $service->price
            ];
        }

        session()->put('cart', $cart);
        #dd(session()->get('cart'));
        return redirect()->back()->with('success', 'Usługa została dodana do koszyka');
        
    }

    public function clearCart() {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Koszyk został wyczyszczony.');
    }

    public function showCart() {
        $cart = session()->get('cart');
    
        return view('cart.index', compact('cart'));
    }
    
    
}

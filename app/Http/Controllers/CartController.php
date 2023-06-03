<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart() {
        $user = auth() -> user();

        $cartProducts = session('cart', []);

        return view('customer.cart.view-cart', compact('cartProducts'));
    }

    public function addToCart() {

    }

    public function removeFromCart() {

    }

    public function updateCart() {

    }

    public function checkoutCart() {

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart() {
        $user = auth() -> user();

        $cartProducts = session('cart', []);

        return view('view-cart', compact('cartProducts'));
    }

    public function addToCart(Request $request, $productID) {
        $product = Product::find($productID); // masih belum mengerti cara mendapatkan produkID dari produk yang ditambahkan
        $user = auth() -> user();

        // dari button add to cart di list produk, tambahkan ke cart, auto kasih variabel $productID, $price, $description, $quantity yang bisa dimodifikasi di Update Cart, dan $cartSubtotal yang bisa berubah sesuai $quantity
        $cartProduct = new Cart();
        $cartProduct -> userID = Auth::id();
        $cartProduct -> productID = $product;
        $cartProduct -> quantity = 1; // default 1, nanti bisa dimodifikasi di fitur update cart
        $cartProduct -> save();

        return redirect() -> route('cart.view');
    }

    public function updateCart(Request $request, Cart $cartProduct) {
        $cartQty = $request -> input('quantity');

        if ($cartQty <= 0) {
            return response() -> json(['error' => 'Quantity must be greater than zero.'], 400);
        }

        $cartProduct -> quantity = $cartQty;
        $cartProduct -> save();

        return redirect() -> route('cart.view');
    }

    public function checkoutCart() {
        $user = auth() -> user();
        $cartProducts = $user -> cart;

        foreach($cartProducts as $product) {
            $transaction = new Transaction();
            $transaction -> userID = $user -> userID;
            $transaction -> productID = $product -> productID;
            $transaction -> quantity = $item -> pivot -> quantity;
            $transaction -> save();
        }

        // clear user's cart
        $user -> cart() -> detach();

        return view('checkout-cart');
    }
}

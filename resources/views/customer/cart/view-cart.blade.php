<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><h1>Cart</h1></title>
</head>
<body>
    @extends('layouts.main-cart')

    @section('container')
        <div class="cart">
            @if(count($cartProducts) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartProducts)
                            <tr>
                                <td>{{ $cart -> product -> name }}</td>
                                <td>{{ $cart -> product -> price }}</td>
                                <td>{{ $cart -> product -> description }}</td>
                                <td>{{ $cart -> product -> quantity }}</td>
                                <td>{{ ($cart -> product -> price) * ($cartProducts -> product -> quantity) }}</td>
                            </tr>
                        @endforeach

                    <div class="checkout-button">
                        <a href="{{ route('checkout') }}">Checkout</a>
                    </div>
                </tbody>
            </table>
        @else
            <h2><b>Your Cart is Empty.</b></h2>

            <div class="buy-product-button">
                <a href="{{ route('view-product') }}">Buy Product</a>
            </div>
        @endif
    </div>
    @endsection
</body>
</html>

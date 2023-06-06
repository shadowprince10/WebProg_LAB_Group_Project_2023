<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><h1>Cart</h1></title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link href = "{{ asset('css/style.css') }}" rel = "stylesheet">
</head>
<body>
    @extends('layouts.main-cart')

    @section('container')
        <div class="cart">
            @if($cartProducts -> isEmpty())
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
                        @foreach($cartProducts as $cart)
                            <tr>
                                <td>{{ $cart -> product -> name }}</td>
                                <td>{{ $cart -> product -> price }}</td>
                                <td>{{ $cart -> product -> description }}</td>
                                <td>
                                    <div class = "cart-qty">
                                        {{ $cart -> product -> quantity }}
                                        <button class = "minus-qty-btn">-</button>
                                        <input type = "number" class = "input-cart-qty" value = "1" min = "1">
                                        <button class = "add-qty-button">+</button>
                                    </div>
                                    <script src = "{{ asset('js/spinner.js') }}" ></script>
                                </td>
                                <td>{{ ($cart -> product -> price) * ($cartProducts -> product -> quantity) }}</td>
                            </tr>
                        @endforeach

                    <div class = "btn-green">
                        <a href = "{{ route('cart.checkout') }}">Checkout</a>
                    </div>
                </tbody>
            </table>
        @else
            <h4 style = "color:cyan"><b>Your Cart is Empty.</b></h4>

            <div class = "btn-green">
                <a href = "{{ route('products.view') }}">Buy Product</a>
            </div>
        @endif
    </div>
    @endsection
</body>
</html>

@extends('layouts.main-user')

@section('container')
    <div class = "thanks-msg">
        @include('layouts.thank-msg')
    </div>
    <div class = "container">
        <h4 style = "color:cyan"><b>Your Cart is Empty.</b></h4>
        @include('layouts.buy-product')
    </div>
@endsection






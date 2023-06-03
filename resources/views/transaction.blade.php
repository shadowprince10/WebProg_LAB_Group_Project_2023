@extends('layouts.mainuser')

@section('container')
    @if(auth()->user() && auth()->user()->role === 'admin')
        <div class="container">
            <div class="text-center">
                <h1 style="color: darkcyan;">Transactions History</h1>
            </div>

            @if($transactions->isEmpty())
                <p>No transactions available.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Transaction Date</th>
                            <th>Username</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>{{ $transaction->created_at }}</td>
                                <td>{{ $transaction->user->username }}</td>
                                <td>{{ $transaction->product->name }}</td>
                                <td>{{ $transaction->product->price }}</td>
                                <td>{{ $transaction->quantity }}</td>
                                <td>{{ $transaction->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @elseif(auth()->user() && auth()->user()->role === 'customer')
        <p>You don't have permission to access this page.</p>
    @endif
@endsection

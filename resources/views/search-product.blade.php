@extends('layouts.mainuser')

@section('container')
    <div class="container">
        <div class="text-center">
            <h2 style="color: darkcyan;">Search Result(s) for "{{ $keyword }}"</h2>
        </div>

        <div class="row">
            @if($products->isEmpty())
                <p>No products found.</p>
            @else
                @foreach($products as $product)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/' . $product->image) }}" class="card-img-top img-fluid" alt="Product Image" style="height: 400px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text">{{ $product->price }}</p>

                                @if(auth()->user() && auth()->user()->role === 'admin')
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Update</a>
                                        <form action="{{ route('products.delete', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                @else
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        @if(auth()->user() && auth()->user()->cart && auth()->user()->cart->contains('product_id', $product->id))
                                            <div class="alert alert-warning" role="alert">
                                                This product is already in your cart.
                                            </div>
                                        @else
                                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                                        @endif
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection

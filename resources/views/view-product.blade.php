@extends('layouts.mainuser')

@section('container')
    <div class="container">
        <div class="text-center">
            <h1 style="color: darkcyan;">Our Products</h1>
        </div>

        @if(auth() -> user() && auth() -> user() -> role === 'admin')
            <div class="mb-3">
                <a href="{{ route('products.create') }}" class = "btn-green">Add Product</a>
            </div>
        @endif
    </div>

        <div class = "row">
            @foreach($products as $product)
                <div class = "col-md-3 mb-4">
                    <div class = "card">
                        <img src="{{ asset('images/' . $product -> image) }}" class = "card-img-top img-fluid" style = "height: 400px;">
                        <div class = "card-body">
                            <h5 class = "card-title">{{ $product -> name }}</h5>
                            <p class = "card-text">{{ $product -> description }}</p>
                            <p class = "card-text">Price: Rp. {{ $product -> price }}</p>

                            @if(auth() -> user() && auth() -> user() -> role === 'admin')
                                <div class = "d-flex justify-content-between">
                                    <a href = "{{ route('products.update', $product -> productID) }}" class = "btn btn-primary btn-lg">Update</a>
                                    <form action="{{ route('products.delete', $product -> productID) }}" method = "POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                                    </form>
                                </div>

                            @elseif(auth() -> user() && auth() -> user() -> role === 'customer')
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Add to Cart</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
        </div>
    @endif
@endsection

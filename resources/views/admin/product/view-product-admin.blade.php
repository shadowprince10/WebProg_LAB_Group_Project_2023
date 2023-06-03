<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><h1>Our Products</h1></title>
    <link href = "{{ asset('css/app.css') }}" rel = "stylesheet">
</head>
<body>
    <section class = "content" id = "content">
        <div class="add-to-cart-button">
            <a href="{{ route('add-product-admin') }}" class = "btn-green">Add Product</a>
        </div>
        @foreach($products as $product)
            <div class = "catalog" id = "catalog">
                <img src = "{{ $product -> image }}">
                <p>{{ $product -> name }}</p>
                <p>{{ $product -> price }}</p>
                <p>{{ $product -> description }}</p>
            </div>
            <div class="update-product-button">
                <a href="{{ route('update-product-admin') }}" class = "btn-blue">Update</a>
            </div>
            <div class="delete-product-button">
                <a href="{{ route('home-admin') }}" class = "btn-red">Delete</a>
            </div>
        @endforeach
    </section>
</body>
</html>

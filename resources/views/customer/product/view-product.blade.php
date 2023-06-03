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
        @foreach($products as $product)
            <div class = "catalog" id = "catalog">
                <img src = "{{ $product -> image }}">
                <p>{{ $product -> name }}</p>
                <p>{{ $product -> price }}</p>
                <p>{{ $product -> description }}</p>
            </div>
            <div class="add-to-cart-button">
                <a href="{{ route('add-to-cart') }}" class = "btn-aqua">Add to Cart</a>
            </div>
        @endforeach
    </section>
</body>
</html>

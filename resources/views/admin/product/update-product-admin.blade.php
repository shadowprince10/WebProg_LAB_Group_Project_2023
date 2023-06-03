<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href = "{{ asset('css/app.css') }}" rel = "stylesheet">
    <title><h2><b>Update Product Form</b></h2></title>
</head>
<body>
    <form method = "POST" action = "/admin/product/update">
        @csrf

        <div class = "update-product-form-group">
            <label for = "product-name">Product Name</label>
            <br>
            <input type = "text" class = "update-product-form-control" id = "product-name" name = "product-name" required autofocus>
        </div>

        <div class = "update-product-form-group">
            <label for = "product-price">Product Price</label>
            <br>
            <input type = "number" class = "update-product-form-control" id = "product-price" name = "product-price" required>
        </div>

        <div class = "update-product-form-group">
            <label for = "product-desc">Product Description</label>
            <br>
            <textarea class = "update-product-form-control" id = "product-desc" name = "product-desc" required></textarea>
        </div>

        <div class = "update-product-form-group">
            <label for = "product-type">Product Type</label>
            <input type = "text" class = "update-product-form-control" id = "product-type" name = "product-type" required>
        </div>

        <div class = "update-product-form-group">
            <label for = "img-upload">Upload Product Image</label>
            <input type = "file" name = "product-img" required>
            <button type = "submit">Browse</button>
        </div>

        <div>
            <button type = "submit" class = "btn-green">Update Product</button>
        </div>
    </form>
</body>
</html>

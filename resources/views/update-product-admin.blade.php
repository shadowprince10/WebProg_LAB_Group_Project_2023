{{-- khusus admin --}}
@extends('layouts.mainuser')

@section('container')
    <div class="container">
        <div class="text-center">
            <h1 style="color: darkcyan;">Update Product Form</h1>
        </div>

        @if(auth() -> user() && auth() -> user() -> role === 'admin')
            <form method = "POST" action = "/admin/product/update">
                @csrf

                <div class = "mb-3">
                    <label for = "name" class = "update-product-form-label">Product Name</label>
                    <input type = "text" name = "name" class = "update-product-form-control{{ $errors -> has('name') ? ' is-invalid' : '' }}" required autofocus>
                    @if($errors -> has('name'))
                        <div class = "invalid-feedback">
                            {{ $errors -> first('name') }}
                        </div>
                    @endif
                </div>
                <div class = "mb-3">
                    <label for = "price" class = "update-product-form-label">Product Price</label>
                    <input type = "number" name = "price" class = "update-product-form-control{{ $errors -> has('price') ? ' is-invalid' : '' }}" min = "1000" required>
                    @if ($errors -> has('price'))
                        <div class = "invalid-feedback">
                            {{ $errors -> first('price') }}
                        </div>
                    @endif
                </div>
                <div class = "mb-3">
                    <label for = "description" class = "update-product-form-label">Product Description</label>
                    <textarea name = "description" class = "update-product-form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" required></textarea>
                    @if($errors->has('description'))
                        <div class = "invalid-feedback">
                            {{ $errors -> first('description') }}
                        </div>
                    @endif
                </div>
                <div class = "mb-3">
                    <label for = "type" class = "update-product-form-label">Product Type</label>
                    <select name = "type" class = "update-product-form-control{{ $errors -> has('type') ? ' is-invalid' : '' }}" required>
                        <option value = "book">Book</option>
                        <option value = "stationary">Stationary</option>
                    </select>
                    @if($errors -> has('type'))
                        <div class = "invalid-feedback">
                            {{ $errors -> first('type') }}
                        </div>
                    @endif
                </div>
                <div class = "mb-3">
                    <label for = "image" class = "update-product-form-label">Product Image</label>
                    <input type = "file" name = "image" class = "update-product-form-control{{ $errors -> has('image') ? ' is-invalid' : '' }}" accept = "image/jpeg, image/png, image/jpg" required>
                    @if($errors -> has('image'))
                        <div class = "invalid-feedback">
                            {{ $errors -> first('image') }}
                        </div>
                    @endif
                </div>
                <button type = "submit" class = "btn btn-primary">Add Product</button>
            </form>
        @endif
    </div>
</body>
</html>

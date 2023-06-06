{{-- khusus admin --}}

@extends('layouts.mainuser')

@section('container')
    <div class="container-fluid">
    <div class="text-center">
        <h1 style="color: darkcyan;">Add New Product</h1>
        </div>
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus>
                @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="number" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" min="1000" required>
                @if ($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Product Description</label>
                <textarea name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" required></textarea>
                @if ($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Product Type</label>
                <select name="type" class="form-select{{ $errors->has('type') ? ' is-invalid' : '' }}" required>
                    <option value="book">Book</option>
                    <option value="stationary">Stationary</option>
                </select>
                @if ($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" accept="image/jpeg, image/png, image/jpg" required>
                @if ($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection

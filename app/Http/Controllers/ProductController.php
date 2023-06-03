<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function viewProduct() {
        $products = Product::paginate(3);
        return view('admin.todos.product.view-product-admin', compact('products'));
    }



    public function storeProduct(Request $request) {
        $validatedInput = $request -> validate([
            'name' => 'required|min:5',
            'price' => 'required|numeric|min:1000',
            'description' => 'required|min:5',
            'type' => 'required|in:book,stationary',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:15000'
        ]);

        if ($request -> hasFile('image')) {
            $image = $request -> file('image');
            $imageName = time() . '.' . $request -> image -> extension();
            $imagePath = $request -> file('image') -> store('uploads', 'public');
            $validatedInput['image'] = $imageName;
            // untuk uploadFile, file yang di-submit user di-upload ke direktori storage > app > public
            // direktori storage > app > public terhubung dengan direktori public > storage
        }

        Product::create($validatedInput);

        return redirect() -> route('products.view');
    }

    public function updateProduct(Request $request, Product $product) {
        $validatedInput = $request -> validate([
            'name' => 'required|min:5',
            'price' => 'required|numeric|min:1000',
            'description|min:5' => 'required',
            'type' => 'required|in:book,stationary',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:15000'
        ]);

        // untuk upload image produk
        if ($request -> hasFile('image')) {
            $image = $request -> file('image');
            $imageName = time() . '.' . $request -> image -> extension();
            $imagePath = $request -> file('image') -> store('uploads', 'public');
            $validatedInput['image'] = $imageName;
            // untuk uploadFile, file yang di-submit user di-upload ke direktori storage > app > public
            // direktori storage > app > public terhubung dengan direktori public > storage
        }

        $product -> update($validatedInput);

        return redirect() -> route('home');
    }

    public function deleteProduct(Product $product) {
        $product -> delete();

        return redirect() -> route('home');
    }

    public function searchProduct(Request $request) {
        $query = $request -> query('query');

        // kalau tidak ada query, keluarkan semua produk
        if (empty($query)) {
            $products = Product::paginate(3);
            $keyword = "";
        }

        else {
            $products = Product::where('name', 'like', '%', $request -> query, '%')->paginate(3);
            $keyword = $query;
        }

        return view('search-product', ['products' => $products, 'keyword' => $keyword]);
    }
}

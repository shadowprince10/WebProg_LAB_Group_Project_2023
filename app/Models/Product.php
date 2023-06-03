<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// attribute: productID (primary key), name, description, price, discount, stock, quantity, image (gambar produk), created_at, updated_at, categoryID (foreign key), brandID (foreign key), transactionID (foreign key)
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    public $fillable = ['name', 'description', 'price', 'discount', 'stock', 'quantity', 'image'];
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// attributes: transactionID, transactionDate, username, product name, price (per product), quantity, total (price per product * product quantity)
class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    public $fillable = ['transactionDate', 'transactionTotal'];
}

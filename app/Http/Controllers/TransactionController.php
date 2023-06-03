<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function viewTransactions() {
        $transactions = Transaction::all();

        return view('transaction', compact('transactions'));
    }
}

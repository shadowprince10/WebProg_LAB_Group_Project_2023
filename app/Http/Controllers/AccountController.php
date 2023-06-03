<?php

namespace App\Http\Controllers;
use Illumination\Validation\Rule;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function viewAccounts() {
        $accounts = User::all();
        return view('accounts', compact('accounts'));
    }

    public function updateAccounts(Request $request, User $acc) {
        $validatedInput = $request -> validate([
            'username' => ['required', Rule::unique('users')->ignore($account -> accountID)],
            'email' => ['required', 'email', Rule::unique('users') -> ignore($account -> accountID)],
            'password' => 'required|min:8|max:20',
            'role' => 'required|in:customer,admin'
        ]);

        $account -> update($validatedInput);

        return redirect('/accounts');
    }
}

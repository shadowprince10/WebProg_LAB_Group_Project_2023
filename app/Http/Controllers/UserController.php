<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Models\User;

class UserController extends Controller
{
    public function register(Request $request) {
        $user = new User(['username' => $request -> username, 'email' => $request -> email, 'password' => $request -> password, 'role' => $request -> role]);
        $user -> save();
        return redirect('/');
    }

    public function storeUserData(Request $request) {
        $validatedInput = $request -> validate(['username' => 'required|unique:users', 'email' => 'required|email|unique:users', 'password' => 'required|min:8|max:20', 'role' => 'required|in:customer,admin']);

        $usernameExists = User::where('username', $validatedInput['username'])->exists(); // cek apakah username yang diinput user sudah ada di database
        // kalau username sudah ada,
        if ($usernameExists) {
            return back() -> withErrors([
                'username' => 'The name has already been taken'
            ]) -> withInput();
        }

        $emailExists = User::where('email', $validatedInput['email'])->exists(); // cek apakah email yang diinput user sudah ada di database
        // kalau email sudah ada,
        if ($emailExists) {
            return back() -> withErrors([
                'email' => 'The email has already been taken'
            ]) -> withInput();
        }

        $user = new User();
        $user -> username = $validatedInput['username'];
        $user -> email = $validatedInput['email'];
        $user -> password = $validatedInput['password'];
        $user -> role = $validatedInput['role'];
        $user -> save();

        return redirect('/login')->with('success', 'Congratulations, your account has been succesfully registered. You can now login.');
    }

    public function login (Request $request) {
        // login dengan credentials yang ada
        $credentials = $request -> validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:20',
            'role' => 'required|in:customer,admin'
        ]);

        if ($request -> remember) {
            Cookie::queue('remember', 'yes');
        }

        // untuk login sukses
        if (Auth::attempt($credentials)) {
            session([email => $request -> mail]);
            return redirect('/');
            // kalau login sukses, redirect ke home page
        }
        // kalau gagal login, redirect ke login page
        return redirect() -> back();
    }

    public function auth(Request $request) {
        $request -> validate([
            'email' => 'required',
            'password' => 'required|min:8|max:20'
        ]);

        if (Auth::attempt($credentials, $request -> filled('remember'))) {
            $request -> session() -> regenerate();

            return redirect('/');
        }

        return back() -> withErrors(['email' => 'Invalid Credential']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request -> session() -> invalidate();
        $request -> session() -> regenerateToken();

        return redirect() -> route('/');
    }
}

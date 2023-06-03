<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewHome() {
        return view('home');
    }

    public function viewHomePage() {
        if (Auth::check()) {
            $role = Auth::user() -> role;

            return view('homepage', ['role' => $role]);
        }

        else {
            return redirect('/login');
        }
    }
}

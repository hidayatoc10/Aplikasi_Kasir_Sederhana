<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Auth Login
    public function login()
    {
        return view("login", [
            'title' => 'Login'
        ]);
    }

    public function login_post(Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'min:3', 'max:50'],
            'password' => ['required', 'min:8', 'max:100'],
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            if (auth()->user()->keterangan === 'Administrator') {
                return redirect()->route('dashboard_admin');
            } else {
                return redirect()->route('dashboard_petugas');
            }
        }
        return redirect()->route('login')->with('gagal', 'Gagal Login');
    }

    // Logout
    public function logout_admin()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function logout_petugas()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }

    public function authenticate(Request $request) {
        $credentials =  $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return response()->json(['status' => 'Success', 'message' => 'Login Berhasil!']);
        }
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}

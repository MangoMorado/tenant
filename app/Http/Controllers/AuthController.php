<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Login
    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message'=>'Credenciales inválidas'], 401);
        }

        $request->session()->regenerate();

        return response()->json([
            'user' => Auth::user()
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message'=>'Logged out']);
    }

    // Obtener usuario actual
    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}

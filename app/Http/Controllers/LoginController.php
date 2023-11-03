<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Symfony\Contracts\Service\Attribute\Required;

class LoginController extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            return response()->json([
                'status' => true,
                'message' => "Login Success",
                'user' => $user // Mengirim data pengguna ke frontend jika diperlukan
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Login Failed'
        ], 401); // Gunakan HTTP status code 401 untuk autentikasi gagal
    }
}

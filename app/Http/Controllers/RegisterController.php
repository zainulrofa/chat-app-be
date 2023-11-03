<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();

        if (isset($input['name']) && isset($input['email']) && isset($input['password'])) {
            User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => $input['password'],
            ]);

            return response()->json([
                'status' => true,
                'message' => "Registration Success"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Invalid input data"
            ], 400); // 400 Bad Request
        }
    }
}

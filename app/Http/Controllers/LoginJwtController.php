<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginJwtController extends Controller
{
    public function login(Request $request){
        $credentials = $request->all(['email', 'password']); 

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'token' => $token
        ]);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }
}

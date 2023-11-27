<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthLoginController extends Controller
{
    public function login(Request $request)
    {
        dd($request->all(['email', 'password']));
        $credentials = $request->all(['email', 'password']); 

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if($token) {
            $user = User::where("email", $request->email)->get();                   
        }

        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }
}

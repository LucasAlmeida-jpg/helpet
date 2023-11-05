<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = Session::paginate(10000); // Retorna uma lista paginada de sessões

    return response()->json($sessions, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public static function store(Request $request)
    {
        $data  = $request->all();
        

        try {
            $randomBytes = random_bytes(32); // Gera 32 bytes aleatórios
            $token = bin2hex($randomBytes); // Converte os bytes em uma representação hexadecimal
            
            $session = new Session;
            $session->user_id = $request->user_id;
            $session->ip_address = $request->ip();
            $session->status = 1;
            $session->token = $token;
            $session->save();

            return response()->json([
                'data' => [
                    $session
                ]
            ], 201);

        } catch (\Throwable $th) {
            \Log::error('Erro ao criar session: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

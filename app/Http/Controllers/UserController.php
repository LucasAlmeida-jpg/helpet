<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('pets');
        return response()->json($user->paginate('10'), 200);
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
    public function store(Request $request)
    {
        $data = $request->all();

        try {
            $data['password'] = Hash::make($data['password']); // Criptografa a senha
            $user = User::create($data);

            $user->pets()->attach($request->pet);


            return response()->json([
                'data' => [
                    'message' => $user
                ]
            ], 201);

        } catch (\Throwable $th) {
            \Log::error('Erro ao criar usuário: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = User::with('pets')->find($id);

            return response()->json([
                'data' => $user
            ], 200);

        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            return response()->json(['message' => $th->getMessage()], 401);
        }
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
        $data  = $request->all();
        
        try {
            
            $user = User::findOrFail($id);
            $user->update($data);

            return response()->json([
                'data' => [
                    'message' => 'User atualizado com sucesso!'
                ]
            ], 200);

        } catch (\Throwable $th) {
            \Log::error('Erro ao atualizar User: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete(); // Remova o argumento $data
    
            return response()->json([
                'data' => $user
            ], 200);
    
        } catch (\Throwable $th) {
            \Log::error('Erro ao deletar User: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
    
}
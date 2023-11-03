<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Raca;


class RacaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $raca = new Raca;
        return response()->json($raca->paginate('10000'), 200);
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
        $data  = $request->all();

        try {
            $raca = new Raca;
            $raca = $raca->create($data);

            return response()->json([
                'data' => [
                    $raca
                ]
            ], 201);

        } catch (\Throwable $th) {
            \Log::error('Erro ao criar Raca: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $raca = Raca::find($id);

            return response()->json([
                'data' => $raca
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
            
            $raca = Raca::findOrFail($id);
            $raca->update($data);

            return response()->json([
                'data' => [
                    'message' => 'Raca atualizado com sucesso!'
                ]
            ], 200);

        } catch (\Throwable $th) {
            \Log::error('Erro ao atualizar Raca: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $raca = Raca::findOrFail($id);
            $raca->delete($data);

            return response()->json([
                'data' => [
                    'message' => 'Raca deletado com sucesso!'
                ]
            ], 200);

        } catch (\Throwable $th) {
            \Log::error('Erro ao deletar Raca: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}

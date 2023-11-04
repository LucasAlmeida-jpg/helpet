<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinalVital;

class SinalVitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sinalVital = new SinalVital;
        return response()->json($sinalVital->paginate('1000'), 200);
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
        try {
            $sinalVital = new SinalVital;
            $sinalVital->descricao = $request->input('descricao');
            $sinalVital->pet_name = $request->input('pet_name');
            $sinalVital->save(); 
    
            return response()->json([
                'data' => $sinalVital
            ], 201);
    
        } catch (\Throwable $th) {
            \Log::error('Erro ao criar SinalVital: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $sinalVital = SinalVital::find($id);

            return response()->json([
                'data' => $sinalVital
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
            
            $sinalVital = SinalVital::findOrFail($id);
            $sinalVital->update($data);

            return response()->json([
                'data' => [
                    'message' => 'SinalVital atualizado com sucesso!'
                ]
            ], 200);

        } catch (\Throwable $th) {
            \Log::error('Erro ao atualizar SinalVital: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $sinalVital = SinalVital::findOrFail($id);
            $sinalVital->delete($data);

            return response()->json([
                'data' => [
                    'message' => 'SinalVital deletado com sucesso!'
                ]
            ], 200);

        } catch (\Throwable $th) {
            \Log::error('Erro ao deletar SinalVital: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicamento;


class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicamento = new Medicamento;
        return response()->json($medicamento->paginate('10000'), 200);
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
            $medicamento = new Medicamento;
            $medicamento->nome = $data['nome'];
            $medicamento->dose = $data['dose'];
            $medicamento->hora_de_aplicação = $data['hora_de_aplicação'];
            $medicamento->nome_pet = $data['nome_pet']; 
            $medicamento->tipo_pet = $data['tipo_pet']; 
            $medicamento->save();
    
            return response()->json([
                'data' => $medicamento
            ], 201);
    
        } catch (\Throwable $th) {
            \Log::error('Erro ao criar Medicamento: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $medicamento = Medicamento::find($id);

            return response()->json([
                'data' => $medicamento
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
            
            $medicamento = Medicamento::findOrFail($id);
            $medicamento->update($data);

            return response()->json([
                'data' => [
                    'message' => 'Medicamento atualizado com sucesso!'
                ]
            ], 200);

        } catch (\Throwable $th) {
            \Log::error('Erro ao atualizar Medicamento: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $medicamento = Medicamento::findOrFail($id);
            $medicamento->delete($data);

            return response()->json([
                'data' => [
                    'message' => 'Medicamento deletado com sucesso!'
                ]
            ], 200);

        } catch (\Throwable $th) {
            \Log::error('Erro ao deletar Medicamento: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}

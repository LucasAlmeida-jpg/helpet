<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Session;


class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $pets = Pet::all(); // Recupera todos os pets

    return response()->json([
        'data' => $pets
    ], 200);
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
            $pet = new Pet;
            $pet->nome = $data['nome'];
            $pet->cpf_tutor = $data['cpf_tutor'];
            $pet->nome_tutor = $data['nome_tutor'];
            $pet->raca_pet = $data['raca_pet'];
            $pet->cor = $data['cor'];
            $pet->tipo = $data['tipo'];
            $pet->tamanho = $data['tamanho'];
            $pet->sexo = $data['sexo'];           
            

            $pet->save();

            if ($request->medicamento) {
                $pet->medicamento()->attach($request->medicamento);
            }

            if ($request->operacao) {
                $pet->operacao()->attach($request->operacao);
            }

            if ($request->user) {
                $pet->user()->attach($request->user);
            }

            return response()->json([
                'data' => [
                    $pet
                ]
            ], 201);

        } catch (\Throwable $th) {
            \Log::error('Erro ao criar Pet: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $pet = Pet::with(['user', 'raca', 'medicamento', 'higiene', 'operacao', 'sinalVital'])->find($id);

            return response()->json([
                'data' => $pet
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
            
            $pet = Pet::findOrFail($id);
            $pet->update($data);

            return response()->json([
                'data' => [
                    'message' => 'Pet atualizado com sucesso!'
                ]
            ], 200);

        } catch (\Throwable $th) {
            \Log::error('Erro ao atualizar Pet: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pet = Pet::findOrFail($id);
            $pet->delete($data);

            return response()->json([
                'data' => [
                    'message' => 'Pet deletado com sucesso!'
                ]
            ], 200);

        } catch (\Throwable $th) {
            \Log::error('Erro ao deletar Pet: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}

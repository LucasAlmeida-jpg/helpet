<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Higiene;

class HigieneController extends Controller
{  
    public function index()
    {
        try {
            $higiene = Higiene::select('id', 'ultimar', 'proxr', 'cuidados', 'created_at', 'updated_at', 'type_care', 'type_animal', 'pet_name')->paginate(10000);

            return response()->json(['data' => $higiene], 200);
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
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
            $higiene = new Higiene;
            $higiene->ultimar = $data['ultimar'];
            $higiene->proxr = $data['proxr'];
            $higiene->cuidados = $data['cuidados'];
            $higiene->type_care = $data['type_care'];
            $higiene->type_animal = $data['type_animal'];
            $higiene->pet_name = $data['pet_name'];

            $higiene->save();

            return response()->json([
                'data' => [
                    $higiene
                ]
            ], 201);

        } catch (\Throwable $th) {
            \Log::error('Erro ao criar Higiene: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $higiene = Higiene::find($id);

            return response()->json([
                'data' => $higiene
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
        $data = $request->all();

        try {

            $higiene = Higiene::findOrFail($id);
            $higiene->update($data);

            return response()->json([
                'data' => [
                    'message' => 'Higiene atualizado com sucesso!'
                ]
            ], 200);

        } catch (\Throwable $th) {
            \Log::error('Erro ao atualizar Higiene: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $higiene = Higiene::findOrFail($id);
            $higiene->delete();

            return response()->json([
                'data' => [
                    'message' => 'Higiene deletado com sucesso!'
                ]
            ], 200);

        } catch (\Throwable $th) {
            \Log::error('Erro ao deletar Higiene: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Operacao;


class OperacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operacao = new Operacao;
        return response()->json($operacao->paginate('10000'), 200);
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
    /**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    $data  = $request->all();

    try {
        $operacao = new Operacao;

        if ($request->has('pet_name')) {
            $operacao->pet_name = $data['pet_name'];
        } else {
            return response()->json(['message' => 'Campo "pet_name" não encontrado na requisição.'], 400);
        }

        if ($request->has('name_tutor')) {
            $operacao->name_tutor = $data['name_tutor'];
        } else {
            return response()->json(['message' => 'Campo "name_tutor" não encontrado na requisição.'], 400);
        }

        if ($request->has('status')) {
            $operacao->status = $data['status'];
        } else {
            return response()->json(['message' => 'Campo "status" não encontrado na requisição.'], 400);
        }

        if ($request->has('procedimento')) {
            $operacao->procedimento = $data['procedimento'];
        } else {
            return response()->json(['message' => 'Campo "procedimento" não encontrado na requisição.'], 400);
        }

        $operacao->save();
        
        return response()->json([
            'data' => [
                $operacao
            ]
        ], 201);

    } catch (\Throwable $th) {
        \Log::error('Erro ao criar Operacao: ' . $th->getMessage());
        return response()->json(['message' => $th->getMessage()], 500);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $operacao = Operacao::find($id);

            return response()->json([
                'data' => $operacao
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
            
            $operacao = Operacao::findOrFail($id);
            $operacao->update([
                'pet_name' => $request->input('pet_name'),
                'name_tutor' => $request->input('name_tutor'),
                'status' => $request->input('status'),
                'procedimento' => $request->input('procedimento'),
            ]);

            return response()->json([
                'data' => [
                    'message' => 'Operacao atualizado com sucesso!'
                ]
            ], 200);

        } catch (\Throwable $th) {
            \Log::error('Erro ao atualizar Operacao: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $operacao = Operacao::findOrFail($id);
            $operacao->delete();
    
            return response()->json([
                'data' => [
                    'message' => 'Operacao deletada com sucesso!'
                ]
            ], 200);
    
        } catch (\Throwable $th) {
            \Log::error('Erro ao deletar Operacao: ' . $th->getMessage());
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
    
}

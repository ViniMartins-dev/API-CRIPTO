<?php

namespace App\Http\Controllers;

use App\Models\CriptoMoeda;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CriptoMoedaController extends Controller
{
    public function index()
    {
        $regBook = CriptoMoeda::All();
        $contador = $regBook->count();

        if ($contador > 0) {
            return response()->json([
                'success' => true,
                'message' => 'Criptos encontradas com sucesso',
                'data' => $regBook,
                'total' => $contador
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Nenhuma cripto encontrada',
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sigla' => 'required',
            'nome' => 'required',
            'valor' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Registros inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        $regBook = CriptoMoeda::create($request->all());

        if ($regBook) {
            return response()->json([
                'success' => true,
                'message' => 'Cripto cadastrada com sucesso!',
                'data' => $regBook
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar a cripto moeda'
            ], 500);
        }
    }

    public function show($id)
    {
        $regBook = CriptoMoeda::find($id);

        if ($regBook) {
            return response()->json([
                'success' => true,
                'message' => 'Cripto localizada com sucesso',
                'data' => $regBook
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Cripto não localizada'
            ], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        $regBook = CriptoMoeda::find($id);
        
        if (!$regBook) {
            return response()->json([
                'success' => false,
                'message' => 'Cripto não encontrada'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'sigla' => 'required',
            'nome' => 'required',
            'valor' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Registros inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        $regBook->sigla = $request->sigla;
        $regBook->nome = $request->nome;
        $regBook->valor = $request->valor;

        if ($regBook->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Cripto atualizada com sucesso',
                'data' => $regBook
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao atualizar cripto'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $regBook = CriptoMoeda::find($id);

        if (!$regBook) {
            return response()->json([
                'success' => false,
                'message' => 'Cripto não encontrada'
            ], 404);
        }

        if ($regBook->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Cripto deletada com sucesso'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao deletar cripto'
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\criptoMoeda;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CriptoMoedaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regBook = criptoMoeda::All();
        $contador = $regBook->count();

        return Response()->json($regBook);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sigla' => 'required',
            'nome' => 'required',
            'valor' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'sucess' => false,
                'message' => 'Registros inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        $registros = CriptoMoeda::create($request->all());

        if($registros) {
            return response()->json([
                'sucess' => true,
                'message' => 'Cripto cadastrada com sucesso!',
                'data' => $registros
            ], 201);

        }else {
            return response()->json([
                'sucess' => false,
                'message' => 'Erro ao cadastrar a cripto moeda'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(criptoMoeda $id)
    {
        $regBook = criptoMoeda::find($id);

        if($regBook){
            return "Cripto Moeda localizada: ".$regBook.Response()->json([], Response::HTTP_NO_CONTENT);
        }else{
            return "Cripto moeda não localizada ".Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, criptoMoeda $criptoMoeda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $regBook = criptoMoeda::find($id);

        if(!$regBook) {
            return response()->json([
                'succes' => false,
                'message' => 'cripto não encontrada'
            ], 404);
        }
        
        if($regBook->delete()) {
            return response()->json([
                'succes' => true,
                'message' => 'cripto deletada com sucesso'
            ], 200);
        }

        return response()->json([
            'succes' => false,
            'message' => 'Erro ao deletar a criptomoeda'
        ], 500);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\criptoMoeda;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CriptoMoedaController extends Controller
{
    public function index(){
        $regBook = criptoMoeda::All();
        $contador = $regBook->count();


        if($contador > 0) {
            return response()->json([
                'succes' => true,
                'message' => 'Cripto encontradas com sucesso',
                'data' => $regBook,
                'total' => $contador
            ], 200);
        } else {
            return respons()->json([
                'succes' => false,
                'message' => 'Nenhuma cripto encontrada',
            ], 404);
        }
    }

    public function store(Request $request){
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

    public function show($id){
        $regBook = criptoMoeda::find($id);

        if($regBook){
            return response()->json([
                'succes' => true,
                'message' => 'Cripto localizada com sucesso',
                'data' => $regBook
            ], 200);
        }else{
            return response()->json([
                'succes' => false,
                'message' => 'Cripto não localizada'
            ], 404);
        }
    }

    public function update(Request $request, criptoMoeda $criptoMoeda){
        //
    }

    public function destroy($id){
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

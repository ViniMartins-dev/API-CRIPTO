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

        $regBook = CriptoMoeda::create($request->all());

        if($regBook) {
            return response()->json([
                'sucess' => true,
                'message' => 'Cripto cadastrada com sucesso!',
                'data' => $regBook
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

    public function update(Request $request, string $id){
        $validator = Validator::make($request->all(), [
            'sigla' => 'required',
            'nome' => 'required',
            'valor' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'succes' => false,
                'message' => 'Registros inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        $regBook->sigla = $request->sigla;
        $regBook->nome = $request->nome;
        $regBook->valor = $request->valor;

        if($regBook->save()){
            return response()->json([
                'succes' => true,
                'message' => 'Cripto atualizada com sucesso',
                'data' => $regBook
            ], 200);
        } else {
            return response()->json([
                'succes' => false,
                'message' => 'Erro ao atualizar cripto'
            ], 500);
        }
        
    }

    public function destroy($id){
        $regBook = criptoMoeda::find($id);

        if(!$regBook) {
            return response()->json([
                'success' => false,
                'message' => 'cripto não encontrada'
            ], 404);

            if($regBook->delete()) {
                return response()->json([
                    'success' => true,
                    'message' => 'cripto deletada'
                ], 200);
            }

            return response()->json([
                'success' => true,
                'message' => 'Erro ao deletar cripto'
            ], 500);
        }
    }
}

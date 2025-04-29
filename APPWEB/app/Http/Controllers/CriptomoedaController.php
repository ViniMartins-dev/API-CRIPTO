<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CriptomoedaController extends Controller
{
    //endpoint api
    
    private $urlAPI = "http://127.0.0.1:8001/api/cripto";

    //função pra retornar a view com os dados entregues da api

    public function index() {
        $response = Http::get($this->urlAPI);
        $data = $response->json();

        return view('criptomoeda.index', ['criptos' => $data['data'] ?? [], 'message' => $data['message'] ?? '']);

    }

    public function store(Request $request) {
        
        Http::post($this->urlAPI, $request->only('sigla', 'nome', 'valor'));

        return redirect()->route('criptomoeda.index');
    }

    public function create() {

        return view('criptomoeda.create');
    }

    public function edit($id) {
        $response = Http::get("$this->urlAPI/$id");
        $cripto = $response->json() ['data'] ?? null;
        return view('criptomoeda.edit', compact('cripto'));

    }

    public function update(Request $request, $id) {
        Http::put("$this->urlAPI/$id", $request->only('sigla', 'nome', 'valor'));
        return redirect()->route('criptomoeda.index');
    }

    public function destroy($id) {
        Http::delete("$this->urlAPI/$id");
        return redirect()->route('criptomoeda.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CriptomoedaController extends Controller
{
    //endpoint api
    
    private $urlAPI = "http://localhost:8001/api/cripto/";

    //função pra retornar a view com os dados entregues da api

    public function index() {
        $response = Http::get($this->urlAPI);
        $data = $response->json();

        return view('criptomoeda.index', ['criptos' => $data['data'] ?? [], 'message' => $data['message'] ?? '']);

    }
}

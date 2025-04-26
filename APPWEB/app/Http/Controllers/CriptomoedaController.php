<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CriptomoedaController extends Controller
{
    //endpoint api
    
    private $urlAPI = "http://localhost:8001/api/cripto/";

    public function index() {
        $response = Http::get($this->urlAPI);
        $data = $response->json();

        return view('criptomoeda.index', ['criptos' => $data['data'] ?? [], 'message' => $data['message'] ?? '']);

    }
}

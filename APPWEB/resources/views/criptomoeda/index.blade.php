@extends('layouts.app')
@section('content')

    <h1>Lista de cripto moedas</h1>
    
    <a href="{{ route('criptomoeda.create') }}" class="btn btn-primary" >Cadastrar</a>

    @if(count($criptos)) 
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sigla</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($criptos as $cripto) 
                    <tr>
                        <th scope="row">{{ $cripto['sigla'] }}</th>
                        <td>{{ $cripto['nome'] }}</td>
                        <td>{{ number_format($cripto['valor'], 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('criptomoeda.edit', $cripto['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                            <a href="{{ route('criptomoeda.destroy', $cripto['id']) }}" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja exluir?')">Excluir</a>
                        </td>
                    </tr>
                @endforeach  
            </tbody>
        </table>
    @else
        <p>Nenhuma Cripto encontrada.</p>
    @endif
    
@endsection

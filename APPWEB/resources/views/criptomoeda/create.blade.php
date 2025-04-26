@extends('layouts.app')

@section('content')
    <h1>Cadastrar nova cripto</h1>

    <form method="post" action="{{route('criptomoeda.store')}}">

        @csrf

            <div class="mb-3">

                <label for="sigla">Sigla</label>
                <input type="text" name="sigla" class="form-control" required>
            
            </div>

            <div class="mb-3">

                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" required>

            </div>

            <div class="mb-3">
            
                <label for="valor">Valor</label>
                <input type="text" name="valor" class="form-control" required>

            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="{{route('criptomoeda.index')}}" class="btn btn-secundary">Cancelar</a>


    </form>

@endsection
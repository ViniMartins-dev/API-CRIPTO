@extends('layouts.app')

@section('content')
    <h1>Editar Cripto</h1>
    <form method="POST" action="{{ route('criptomoeda.update', $cripto['id']) }}">
        @csrf
        <div class="mb-3">
            <label>Sigla</label>
            <input type="text" name="sigla" class="form-control" value="{{ $cripto['sigla'] }}" required>
        </div>

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $cripto['nome'] }}" required>
        </div>

        <div class="mb-3">
            <label>Valor</label>
            <input type="number" name="valor" step="0.01" class="form-control" value="{{ $cripto['valor'] }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('criptomoeda.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
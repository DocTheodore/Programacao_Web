@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Editar Jogo</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ops!</strong> Há algo errado com os dados inseridos.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('jogos.update', $jogo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control" value="{{ $jogo->nome }}" placeholder="Nome">
            </div>
            <div class="form-group mb-3">
                <label for="data_lancamento">Data de Lançamento:</label>
                <input type="date" name="data_lancamento" class="form-control" value="{{ $jogo->data_lancamento }}" placeholder="Data de Lançamento">
            </div>
            <div class="form-group mb-3">
                <label for="preco">Preço:</label>
                <input type="text" name="preco" class="form-control" value="{{ $jogo->preco }}" placeholder="Preço">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection

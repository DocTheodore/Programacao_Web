@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Adicionar Jogo</h2>
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
        <form action="{{ route('jogos.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group mb-3">
                <label for="data_lancamento">Data de Lançamento:</label>
                <input type="date" name="data_lancamento" class="form-control" placeholder="Data de Lançamento">
            </div>
            <div class="form-group mb-3">
                <label for="preco">Preço:</label>
                <input type="text" name="preco" class="form-control" placeholder="Preço">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection

@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Mostrar Jogo</h2>
        <div class="card">
            <div class="card-header">
                {{ $jogo->nome }}
            </div>
            <div class="card-body">
                <p>Data de Lançamento: {{ $jogo->data_lancamento }}</p>
                <p>Preço: {{ $jogo->preco }}</p>
                <a class="btn btn-primary" href="{{ route('jogos.index') }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection

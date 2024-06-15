@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Lista de Jogos</h2>
            <a class="btn btn-success" href="{{ route('jogos.create') }}">Adicionar Jogo</a>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Lançamento</th>
                <th>Preço</th>
                <th width="280px">Ações</th>
            </tr>
            @foreach ($jogos as $jogo)
                <tr>
                    <td>{{ $jogo->id }}</td>
                    <td>{{ $jogo->nome }}</td>
                    <td>{{ $jogo->data_lancamento }}</td>
                    <td>{{ $jogo->preco }}</td>
                    <td>
                        <form action="{{ route('jogos.destroy', $jogo->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('jogos.show', $jogo->id) }}">Mostrar</a>
                            <a class="btn btn-primary" href="{{ route('jogos.edit', $jogo->id) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

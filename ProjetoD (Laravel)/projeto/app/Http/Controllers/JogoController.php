<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use Illuminate\Http\Request;

class JogoController extends Controller
{
    public function index()
    {
        $jogos = Jogo::all();
        return view('index', compact('jogos'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'data_lancamento' => 'required|date',
            'preco' => 'required|numeric',
        ]);

        Jogo::create($request->all());
        return redirect()->route('index')->with('success', 'Jogo criado com sucesso.');
    }

    public function show(Jogo $jogo)
    {
        return view('show', compact('jogo'));
    }

    public function edit(Jogo $jogo)
    {
        return view('edit', compact('jogo'));
    }

    public function update(Request $request, Jogo $jogo)
    {
        $request->validate([
            'nome' => 'required',
            'data_lancamento' => 'required|date',
            'preco' => 'required|numeric',
        ]);

        $jogo->update($request->all());
        return redirect()->route('index')->with('success', 'Jogo atualizado com sucesso.');
    }

    public function destroy(Jogo $jogo)
    {
        $jogo->delete();
        return redirect()->route('index')->with('success', 'Jogo deletado com sucesso.');
    }
}

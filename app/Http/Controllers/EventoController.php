<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->query('busca');

        $eventos = Evento::when($busca, function ($query) use ($busca) {
            $query->where('titulo', 'like', '%' . $busca . '%');
        })
        ->orderBy('titulo')
        ->get();

        return view('eventos.index', compact('eventos', 'busca'));
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'titulo' => 'required|string|min:3',
            'local' => 'required|string|min:2',
            'vagas' => 'required|integer|min:1',
            'preco_inscricao' => 'required|numeric|min:0'
        ]);

        Evento::create($dados);

        return redirect('/eventos')->with('success', 'Evento cadastrado com sucesso!');
    }
}
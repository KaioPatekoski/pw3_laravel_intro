<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::orderBy('titulo')->get();

        return view('livros.index', compact('livros'));
    }

    public function store(Request $request)
    {
        $anoAtual = date('Y');

        $dados = $request->validate([
            'titulo' => 'required|string|min:3|max:20',

            'autor' => 'required|string|min:3|max:20',

            'ano_publicacao' => "required|integer|min:1|max:$anoAtual",
        ]);

        Livro::create($dados);

        return redirect('/livros');
    }
}
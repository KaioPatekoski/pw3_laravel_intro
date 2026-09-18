<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Exibe a listagem de usuários com  suporte a filtro de busca
    public function index(Request $request)
    {
        
        // Captura o termo de busca enviado pelo GET
        $busca = $request->input('busca');

        if ($busca) {
            $usuarios = User::where('name', 'like', "%{$busca}%", 'and')
                ->orderBy('name', 'ASC')
                ->get();

        } else {
            $usuarios = User::orderBy('name', 'ASC')->get();
        }
        return view('admin.dashboard', compact('usuarios', 'busca'));
    }
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $dadosValidados = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        //Persistencia no banco usando o Eloquent ORM
        user::create($dadosValidados);

        // Redirecionamento para a página de sucesso
        return redirect('/admin')->with('successo', 'Usuário cadastrado com sucesso!');
    }
}

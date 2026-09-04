<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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

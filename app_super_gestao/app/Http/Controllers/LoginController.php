<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';

        if ($request->get('erro') == 1){
            $erro = 'Usuario ou senha inexistentes';
        } 
        if ($request->get('') == 2){
            $erro = 'Usuario sem permissao de acesso';
        }

        return view('site.login', ['titulo' => 'login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){
        $regras = [
            'usuario' => 'email',
            'senha'   => 'required'
        ];

        $feedback = [
            'usuario.email' => 'Por favor, digite um email valido!',
            'senha.required' => 'Por favor, insira uma senha!'
        ];
        
        $validate = $request->validate($regras, $feedback);

        $email    = $request->get('usuario');
        $password = $request->get('senha');

        //Iniciar model user
        $existe = User::where('email', $email)->where('password', $password)->get()->first();

        if($existe){
            session_start();
            $_SESSION['nome']  = $existe->name;
            $_SESSION['email'] = $existe->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => '1']);
        }
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}

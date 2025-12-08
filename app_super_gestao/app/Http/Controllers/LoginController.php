<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('site.login', ['titulo' => 'login']);
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

        echo "Usuario: $email | Senha: $password";
        echo '<br>';

        //Iniciar model user
        $existe = User::where('email', $email)->where('password', $password)->get()->first();

        if($existe){
            echo 'Usuario existe';
        }else{
            echo 'Usuario inexistente';
        }
    }
}

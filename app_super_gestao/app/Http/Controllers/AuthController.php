<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(){
        return view('teste.login');
    }

    public function login(Request $request){
        $credenciais = $request->validate([
            'cpf' => ['required', 'email'],
            'senha' => ['required']
        ]);

        if(Auth::attempt(['cpf' => $request->cpf, 'password' => $request->senha])){
            $request->session()->regenerate();
            return redirect()->route('site.contato')->with('success', 'Login realizado com sucesso!');
        }

        return back()->withErrors([
            'email' => 'Email ou senha incorretos.'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}

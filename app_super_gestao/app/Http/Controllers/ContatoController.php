<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\SiteContato;
use \App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function Contato(){
        $titulo = 'Contato';
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', compact('titulo', 'motivo_contatos'));
    }

    public function Salvar(Request $request){
        //Primeiro jeito de pegar a informacao do formulario e salvar no banco.
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // $contato->save();

        //Antes de salvar é necessario validar.
        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:500',
        ]);

        //Segundo jeito -> necessario $fillable
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }

    // public function contatoParam($nome, $categoria, $assunto, $mensagem = null){
    //     return view('site.contato_param', compact('nome', 'categoria', 'assunto', 'mensagem'));
    // }

    // public function contatoParam(){
    //     return view('site.contato');
    // }
}

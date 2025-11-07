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
            //Unique torna o campo unico, se tiver um nome no banco de Joao e outra pessoa tentar fazer o envio do formulario como Joao dara erro por conta do unique.
            //Acho melhor usar isso no banco de dados, para garantir a persistencia no BD
            'nome' => 'required|min:3|max:50|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:500',
        ],
        [
            'nome.required'=>'O campo nome precisa ser preenchido',
            'nome.unique'=>'Nome já cadastrado',
            'telefone.required'=>'O telefone precisa ser preenchido',
            'email.email'=>'Digite um email válido',
            'motivo_contatos_id.required'=>'Selecione um motivo de contato',
            'mensagem.required'=>'A mensagem precisa ser preenchida',

            //Esse é o default para o required
            'required'=>'O campo :attribute precisa ser preenchido',
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

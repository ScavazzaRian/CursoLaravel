<?php

namespace App\Http\Controllers;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index(){
       return view('app.fornecedor.index');
    }

    public function listar(Request $request){
        return view('app.fornecedor.listar');
    }

    public function cadastrarFornecedor(){
        return view('app.fornecedor.cadastro');
    }

    public function adicionar(Request $request){
        $mensagem = '';
        
        $regras = [
            'nome' => 'required|min:3|max:40',
            'uf' => 'required|min:2|max:2',
            'email' => 'email',
        ];

        $feedback = [
            'required'=> 'O campo :attribute deve ser preenchido',
            'nome.min'=> 'O campo nome deve ter no minimo 2 caracteres',
            'nome.max'=> 'O campo nome deve ter no maximo 40 caracteres',
            'uf.min'=> 'O campo nome deve ter no minimo 2 caracteres',
            'uf.max'=> 'O campo nome deve ter no maximo 2 caracteres',
            'email' => 'Informe um email valido',
        ];

        $validate = $request->validate($regras, $feedback);

        Fornecedor::create($validate);

        $mensagem = 'Fornecedor cadastrado com sucesso';

        return view('app.fornecedor.cadastro', ['mensagem' => $mensagem]);
    }
}

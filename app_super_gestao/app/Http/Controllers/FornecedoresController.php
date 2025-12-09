<?php

namespace App\Http\Controllers;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->get();

        return view('app.fornecedor.listar', compact('fornecedores'));
    }

    public function cadastrarFornecedor()
    {
        return view('app.fornecedor.cadastro');
    }

    public function adicionar(Request $request)
    {
        $mensagem = '';

        $regras = [
            'nome' => 'required|min:3|max:40',
            'uf' => 'required|min:2|max:2',
            'email' => 'email',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no minimo 2 caracteres',
            'nome.max' => 'O campo nome deve ter no maximo 40 caracteres',
            'uf.min' => 'O campo nome deve ter no minimo 2 caracteres',
            'uf.max' => 'O campo nome deve ter no maximo 2 caracteres',
            'email' => 'Informe um email valido',
        ];

        $validate = $request->validate($regras, $feedback);

        Fornecedor::create($validate);

        $mensagem = 'Fornecedor cadastrado com sucesso';

        return view('app.fornecedor.cadastro', ['mensagem' => $mensagem]);
    }

    public function editar(Fornecedor $fornecedor){
        return view('app.fornecedor.atualizar', compact('fornecedor'));
    }

    public function update(Request $request, Fornecedor $fornecedor){
        $validate = $request->validate([
            'nome' => 'required|min:3|max:40',
            'uf' => 'required|min:2|max:2',
            'email' => 'required|email',
        ]);

        $fornecedor->update($validate);

        return redirect()->route('app.fornecedor');
    }

    public function excluir($id){
        Fornecedor::destroy($id);
        return redirect()->route('app.fornecedor')->with('success','');
    }
}

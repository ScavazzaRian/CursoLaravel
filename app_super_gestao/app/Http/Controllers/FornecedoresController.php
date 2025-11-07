<?php

namespace App\Http\Controllers;

class FornecedoresController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1', 
                'status' => 'N', 
                'CNPJ' => null,
                'DDD' => '11',
                'telefone' => '1999999999',
            ],
            1 => [
                'nome' => 'Fornecedor 2', 
                'status' => 'S',
                'CNPJ' => null,
                'DDD' => '85',
                'telefone' => '1999999999',
            ],
            2 => [
                'nome' => 'Fornecedor 3', 
                'status' => 'S',
                'CNPJ' => null,
                'DDD' => '32',
                'telefone' => '1999999999',
            ],
        ];

        // condicao ? <true> : <false>
        // condicao ? <true> : (condicao ? <true> : <false>);

        // OPERADOR TERNARIO
        /*
        $msg = isset($fornecedores[1]['CNPJ']) ? 'CNPJ informado' : 'CNPJ nao informado';
        echo $msg;
        */

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}

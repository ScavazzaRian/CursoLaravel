<?php

namespace App\Http\Controllers;

use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo 'Cadastro realizado com sucesso';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();
        
        return view('app.produto_detalhe.create', compact('unidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'produto_id' => 'required',
            'comprimento'=> 'required',
            'largura'=> 'required',
            'altura'=> 'required',
            'unidade_id' => 'required',
        ]);

        ProdutoDetalhe::create($validate);

        return redirect()->route('produto-detalhes.index')->with('success','');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdutoDetalhe $produto_detalhe)
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', ['produto_detalhe' => $produto_detalhe,'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdutoDetalhe $produto_detalhe)
    {
        $validate = $request->validate([
            'produto_id' => 'required',
            'comprimento'=> 'required',
            'largura'=> 'required',
            'altura'=> 'required',
            'unidade_id' => 'required',
        ]);

        $produto_detalhe->update($validate);
        return redirect()->route('produto-detalhes.create')->with('success','');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

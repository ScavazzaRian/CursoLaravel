<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);

        // foreach ($produtos as $key => $produto) {
        //     print_r($produto->getAttributes());

        //     $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();
        //     //Sem o first estariamos pegando uma Collection(array de produtos) de ProdutoDetalhe
        //     //Aqui pegamos de fato o ProdutoDetalhe
        //     if ($produtoDetalhe) {
        //         $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
        //         $produtos[$key]['largura'] = $produtoDetalhe->largura;
        //         $produtos[$key]['altura'] = $produtoDetalhe->altura;
        //     }
        // }

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();

        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'nome'=>'required',
            'descricao'=>'required',
            'peso'=>'required',
            'unidade_id'=>'required',
        ]);

        Produto::create($validate);

        return redirect()->route('produtos.index')->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit', compact('produto', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $validate=$request->validate([
            'nome'=>'required',
            'descricao'=>'required',
            'peso'=>'required',
            'unidade_id'=>'required',
        ]);

        $produto->update($validate);
        return redirect()->route('produtos.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produto::destroy($id);
        return redirect()->route('produtos.index')->with('success');
    }
}

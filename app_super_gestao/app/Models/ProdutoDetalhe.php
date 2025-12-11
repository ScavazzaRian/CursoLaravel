<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    protected $table = 'produtos_detalhes';

    protected $fillable = [
        'produto_id',
        'comprimento',
        'largura',
        'altura',
        'unidade_id'
    ];

    public function produto(){
        return $this->belongsTo(Produto::class, 'produto_id', 'id');
    }

    //Caso a tabela tenha nomes diferentes da padronizcao que o Eloquent busca devemos:
        // protected $table = '';
        // return $this->belongsTo(Produto::class, 'nome_fk');
    //Cada registro de ProdutoDetalhe pertence a 1 produto
    //Ele ira procurar o seu pai em produto
}

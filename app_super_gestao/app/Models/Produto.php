<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'peso',
        'unidade_id',
    ];

    public function produtoDetalhe(){
        return $this->hasOne(ProdutoDetalhe::class, 'produto_id', 'id');
        //Caso a tabela tenha nomes diferentes da padronizcao que o Eloquent busca devemos:
        // protected $table = '';
        // return $this->belongsTo(Produto::class, 'nome_fk');
        //Produto tem produto detalhe
        //Deve procurar 1 registro relacionado em ProdutoDetalhes com base na FK (produto_id)
    }
}

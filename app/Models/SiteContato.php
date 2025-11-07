<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//Para achar o nome da tabela no banco procura o formato camel case
//Site_Contato
//É colocado em caixa baixa
//site_contato
//É colocado um s no final
//site_contatos

class SiteContato extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contato', 'mensagem'];
}

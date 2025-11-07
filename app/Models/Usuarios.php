<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuarios extends Authenticatable
{
    use HasFactory;
    protected $table = 'usuario';

    protected $fillable = [
        'cpf',
        'senha'
    ];

    protected $hidden = [
        'senha'
    ];
}

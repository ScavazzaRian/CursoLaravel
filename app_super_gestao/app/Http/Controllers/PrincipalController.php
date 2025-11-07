<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;

class PrincipalController extends Controller
{
    public function Principal() {
        $motivo_contatos = MotivoContato::all();
        return view('site.principal', compact('motivo_contatos'));
    }
}

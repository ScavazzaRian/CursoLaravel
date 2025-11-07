<?php

namespace App\Http\Controllers;
use App\Http\Middleware\LogAcessoMiddleware;

class SobreNosController extends Controller
{
    public function SobreNos() {
        return view('site.sobrenos');
    }
}

<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

// Ao passar um string o laravel entende que estamos indicando um controlador e sua acao
Route::middleware(LogAcessoMiddleware::class)
    ->get('/', [PrincipalController::class, 'Principal'])
    ->name('site.index');
Route::get('/sobrenos', [SobreNosController::class, 'SobreNos'])->name('site.sobrenos')->middleware(LogAcessoMiddleware::class);
Route::get('/contato', [ContatoController::class, 'Contato'])->name('site.contato'); 
Route::post('/contato', [ContatoController::class, 'Salvar'])->name('site.contato'); 
Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

//Divisao de rotas, para depois que o login for feito. Uma sendo pública a outra privada.
Route::prefix('/app')->middleware('log.acesso', 'autenticacao')->group(function(){
    Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('app.fornecedores.index');
    Route::get('/cliente', [ClienteController::class, 'cliente'])->name('app.clientes');
    Route::get('/produtos', [ProdutosController::class, 'produtos'])->name('app.produtos');
});

//Criando uma rota de fallback
Route::fallback([FallbackController::class, 'fallback']);

Route::get('/teste', [TesteController::class, 'teste'])->name('site.teste');

//TESTE LOGIN
// Route::get('/login2', [AuthController::class, 'showLogin'])->name('teste.login');
// Route::post('/login2', [AuthController::class, 'login'])->name('teste.login.post');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::post('/contato', [ContatoController::class, 'Salvar'])->name('site.contato')->middleware('auth'); 

# TESTES 01 #
// UTILIZANDO PARAMETROS E REGEX PARA TRATAR ROTAS
/* nome, categoria, assunto, mensagem
Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem?}', [ContatoController::class, 'contatoParam']);

Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem}', function(string $nome, string $categoria, string $assunto, string $mensagem){
    echo 'Estamos aqui: '.$nome. ' - '.$categoria.' - '.$assunto.' - '.$mensagem;
});

Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem?}', function(string $nome, string $categoria, string $assunto, string $mensagem = 'Mensagem não informada'){
    echo 'Estamos aqui: '.$nome. ' - '.$categoria.' - '.$assunto.' - '.$mensagem;
});

Route::get('contato/{nome}/{categoria_id}',
    function (
        string $nome = 'Desconheciado',
        int $categoria_id = 1 // Representa categoria informação
    ) {
        echo "Estamos aqui: $nome - $categoria_id";
    })->where('categoria_id', '[0-9]+');

Route::get('contato/{nome}/{categoria_id}', [ContatoController::class, 'contatoParam'])->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');
*/


# TESTES 02 #
// REDIRECIONANDO ROTAS
/*
Route::get('/rota01', function(){
    echo 'Rota 1';
})->name('site.rota01');

Route::get('/rota02', function(){
    return redirect()->route('site.rota01');
})->name('site.rota02');
*/

// public function rota02()
// {
//     return redirect()->route('site.rota01');
// }

// use App\Http\Controllers\SiteController;
// Route::get('/rota02', [SiteController::class, 'rota02'])->name('site.rota02');


// Route::redirect('/rota02', '/rota01', 301);
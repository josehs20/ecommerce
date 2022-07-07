<?php

use App\Http\Admin\Controllers\ProdutoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);

//controller loja
Route::get('/loja', [App\Http\Controllers\LojaController::class, 'index'])->name('viewloja');
Route::get('/loja/show/{id}', [App\Http\Controllers\LojaController::class, 'show'])->name('viewlojashow');
Route::get('/loja/carregaProduto/{data}', [App\Http\Controllers\LojaController::class, 'carregaProduto']);

//controller carrinho
Route::get('/carrinho', [App\Http\Controllers\CarrinhoController::class, 'index'])->name('viewcarrinho');

// minha conta do usuario comum com todas as configurações
Route::get('/minhaconta', [App\Http\Controllers\UsuarioController::class, 'index']);
Route::get('/minhaconta/meusdados', [App\Http\Controllers\Usuario\MeusdadosController::class, 'index'])->name('meusdados');
Route::get('/minhaconta/enderecos', [App\Http\Controllers\Usuario\EnderecosController::class, 'index'])->name('enderecos');
Route::get('/minhaconta/seguranca', [App\Http\Controllers\UsuarioController::class, 'menu'])->name('seguranca');
Route::get('/minhaconta/cartoes', [App\Http\Controllers\UsuarioController::class, 'menu'])->name('cartoes');

Auth::routes();

//grupo de rotas para admin
Route::middleware('admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //produtos
    Route::resource('/produto', App\Http\Controllers\Admin\ProdutoController::class);
    Route::delete('/delete-image/{id}', [App\Http\Controllers\Admin\ProdutoController::class, 'deleteImage'])->name('deleteImage');
    
    //categoria
    Route::resource('/categorias', App\Http\Controllers\Admin\CategoriaController::class);

    //cor
    Route::resource('/cor', App\Http\Controllers\Admin\CorController::class);

    //tamanho
    Route::resource('/tamanho', App\Http\Controllers\Admin\TamanhoController::class);

    //estoque
    Route::resource('/estoque', App\Http\Controllers\Admin\EstoqueController::class);

    //promocao
    Route::resource('/promocao', App\Http\Controllers\Admin\PromocaoController::class);
});



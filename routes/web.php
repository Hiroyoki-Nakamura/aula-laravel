<?php

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

Route::get('/', function () {
         return view('welcome');
});

// Route::get('/contato' , function(){
//     return 'Contato';
// });

// Route::get('/contato/{id?}' , 'ContatoController@index');


// Route::post('/contato', 'ContatoController@criar');


// Route::put('/contato', function(){
//     return 'Contato PUT';
// });

Route::get('/produtos', 'ProdutoController@index')->name('produto');

Route::get('/produtos/adicionar', 'ProdutoController@adicionar')->name('adicionar');

Route::post('/produtos/salvar', 'ProdutoController@salvar')->name('salvar');

Route::get('/produtos/editar/{id}', 'ProdutoController@editar')->name('editar');

Route::put('/produtos/atualizar/{id}', 'ProdutoController@atualizar')->name('atualizar');

Route::delete('/produtos/deletar/{id}', 'ProdutoController@deletar')->name('deletar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('/produto', 'ProdutoController@index');

Route::post('/produto', 'ProdutoController@criar');

Route::put('/produto', 'ProdutoController@editar');


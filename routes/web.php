<?php

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

Auth::routes();

/**
 * Criação de Rotas
 * Route::get('posfixo', 'controler')->name('pagina a apresentar')
 * 
 * Route::get('/teste', 'Contato@index')->name('index');
 * quando digitar localhost/teste ele vai buscar o controle do contato e exibir a index
 * que esta dentro da pasta telas
 */

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('contatos')->as('contatos.')->group(function(){
    Route::get('/', 'Contato@index')->name('index');
    Route::get('/add', function(){return view('contatos.add_edit');});// Apenas para redirecionar
    Route::post('/', 'Contato@add')->name('add');
    Route::get('/edit/{id}', 'Contato@viewEdit')->name('edit');
    Route::put('/', 'Contato@edit')->name('edit');
    Route::get('/exclude/{id}', 'Contato@exclude')->name('edit');
});
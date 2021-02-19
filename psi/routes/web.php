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

Route::get('/','App\Http\Controllers\FormController@entrada')
->name('index')->middleware('auth');

Route::get('/produtos', 'App\Http\Controllers\ProdutosController@index')
->name('produtos.index')->middleware('auth');

Route::get('/encomendas', 'App\Http\Controllers\EncomendasController@index')
->name('encomendas.index')->middleware('auth');

Route::get('/vendedores', 'App\Http\Controllers\VendedoresController@index')
->name('vendedores.index')->middleware('auth');

Route::get('/fornecedores', 'App\Http\Controllers\FornecedoresController@index')
->name('fornecedores.index')->middleware('auth');

Route::get('/categorias', 'App\Http\Controllers\CategoriasController@index')
->name('categorias.index')->middleware('auth');




Route::get('/produtos/{id}/show', 'App\Http\Controllers\ProdutosController@show')
->name('produtos.show')->middleware('auth');

Route::get('/encomendas/{id}/show', 'App\Http\Controllers\EncomendasController@show')
->name('encomendas.show')->middleware('auth');

Route::get('/vendedores/{id}/show', 'App\Http\Controllers\VendedoresController@show')
->name('vendedores.show')->middleware('auth');

Route::get('/fornecedores/{id}/show', 'App\Http\Controllers\FornecedoresController@show')
->name('fornecedores.show')->middleware('auth');

Route::get('/categorias/{id}/show', 'App\Http\Controllers\CategoriasController@show')
->name('categorias.show')->middleware('auth');



Route::get('/produtos/create','App\Http\Controllers\ProdutosController@create')
	->name('produtos.create')->middleware('auth');

Route::post('/produtos','App\Http\Controllers\ProdutosController@store')
	->name('produtos.store')->middleware('auth');

Route::get('/produtos/{id}/edit','App\Http\Controllers\ProdutosController@edit')
	->name('produtos.edit')->middleware('auth');

Route::patch('/produtos','App\Http\Controllers\ProdutosController@update')
	->name('produtos.update')->middleware('auth');

Route::get('/produtos/{id}/delete', 'App\Http\Controllers\ProdutosController@delete')
	->name('produtos.delete')->middleware('auth');

Route::delete('/produtos', 'App\Http\Controllers\ProdutosController@destroy')
	->name('produtos.destroy')->middleware('auth');



Route::get('/encomendas/create','App\Http\Controllers\EncomendasController@create')
	->name('encomendas.create')->middleware('auth');

Route::post('/encomendas','App\Http\Controllers\EncomendasController@store')
	->name('encomendas.store')->middleware('auth');

Route::get('/encomendas/{id}/edit','App\Http\Controllers\EncomendasController@edit')
	->name('encomendas.edit')->middleware('auth');

Route::patch('/encomendas','App\Http\Controllers\EncomendasController@update')
	->name('encomendas.update')->middleware('auth');

Route::get('/encomendas/{id}/delete', 'App\Http\Controllers\EncomendasController@delete')
	->name('encomendas.delete')->middleware('auth');

Route::delete('/encomendas', 'App\Http\Controllers\EncomendasController@destroy')
	->name('encomendas.destroy')->middleware('auth');




Route::get('/fornecedores/create','App\Http\Controllers\FornecedoresController@create')
	->name('fornecedores.create')->middleware('auth');

Route::post('/fornecedores','App\Http\Controllers\FornecedoresController@store')
	->name('fornecedores.store')->middleware('auth');

Route::get('/fornecedores/{id}/edit','App\Http\Controllers\FornecedoresController@edit')
	->name('fornecedores.edit')->middleware('auth');

Route::patch('/fornecedores','App\Http\Controllers\FornecedoresController@update')
	->name('fornecedores.update')->middleware('auth');

Route::get('/fornecedores/{id}/delete', 'App\Http\Controllers\FornecedoresController@delete')
	->name('fornecedores.delete')->middleware('auth');

Route::delete('/fornecedores', 'App\Http\Controllers\FornecedoresController@destroy')
	->name('fornecedores.destroy')->middleware('auth');





Route::get('/categorias/create','App\Http\Controllers\CategoriasController@create')
	->name('categorias.create')->middleware('auth');

Route::post('/categorias','App\Http\Controllers\CategoriasController@store')
	->name('categorias.store')->middleware('auth');

Route::get('/categorias/{id}/edit','App\Http\Controllers\CategoriasController@edit')
	->name('categorias.edit')->middleware('auth');

Route::patch('/categorias','App\Http\Controllers\CategoriasController@update')
	->name('categorias.update')->middleware('auth');

Route::get('/categorias/{id}/delete', 'App\Http\Controllers\CategoriasController@delete')
	->name('categorias.delete')->middleware('auth');

Route::delete('/categorias', 'App\Http\Controllers\CategoriasController@destroy')
	->name('categorias.destroy')->middleware('auth');




Route::get('/vendedores/create','App\Http\Controllers\VendedoresController@create')
	->name('vendedores.create')->middleware('auth');

Route::post('/vendedores','App\Http\Controllers\VendedoresController@store')
	->name('vendedores.store')->middleware('auth');

Route::get('/vendedores/{id}/edit','App\Http\Controllers\VendedoresController@edit')
	->name('vendedores.edit')->middleware('auth');

Route::patch('/vendedores','App\Http\Controllers\VendedoresController@update')
	->name('vendedores.update')->middleware('auth');

Route::get('/vendedores/{id}/delete', 'App\Http\Controllers\VendedoresController@delete')
	->name('vendedores.delete')->middleware('auth');

Route::delete('/vendedores', 'App\Http\Controllers\VendedoresController@destroy')
	->name('vendedores.destroy')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

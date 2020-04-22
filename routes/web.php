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

// Rota da página Home
Route::get('/', 'SiteController@home')->name('site.home');

Route::get('/loja', 'SiteController@loja')->name('site.loja');

Route::get('/promocoes', 'SiteController@promocao')->name('site.promocoes');

Route::get('/contato', 'SiteController@contato')->name('site.contato');

Route::get('/comentarios', 'SiteController@comentarios')->name('site.comentario');


Route::get('/presentes', function () {
    return view('index');
})->name('site.presentes');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'web']], function () {

    // Rota do Profile
    Route::get('admin/form-profile/{id}', 'ProfileController@edit')->name('admin.form-profile');

    // Rotas do catálogo de produtos
    Route::get('admin/lista-produtos', 'ProdutosController@index')->name('admin.lista-produtos');
    Route::get('admin/form-produtos', 'ProdutosController@create')->name('admin.form-produtos');
    Route::post('produtos/store', 'ProdutosController@store')->name('produtos.store');
    Route::get('admin/form-edit-produtos/{id}', 'ProdutosController@edit')->name('admin.form-edit-produtos');
    Route::put('produtos/update/{id}', 'ProdutosController@update')->name('produtos.update');
    Route::delete('produtos/destroy/{id}', 'ProdutosController@destroy')->name('produtos.destroy');

    // Rotas das Assinaturas
    Route::get('admin/lista-assinaturas', 'AssinaturasController@index')->name('admin.lista-assinaturas');
    Route::get('admin/form-assinaturas', 'AssinaturasController@create')->name('admin.form-assinaturas');
    Route::post('assinaturas/store', 'AssinaturasController@store')->name('assinaturas.store');
    Route::get('admin/form-edit-assinaturas/{id}', 'AssinaturasController@edit')->name('admin.form-edit-assinaturas');
    Route::put('assinaturas/update/{id}', 'AssinaturasController@update')->name('assinaturas.update');
    Route::delete('assinaturas/destroy/{id}', 'AssinaturasController@destroy')->name('assinaturas.destroy');

    // Rotas dos Banners
    Route::get('admin/lista-banners', 'BannersController@index')->name('admin.lista-banners');
    Route::get('admin/form-banners', 'BannersController@create')->name('admin.form-banners');
    Route::post('banners/store', 'BannersController@store')->name('banners.store');
    Route::get('admin/form-edit-banners/{id}', 'BannersController@edit')->name('admin.form-edit-banners');
    Route::put('banners/update/{id}', 'BannersController@update')->name('banners.update');
    Route::delete('banners/destroy/{id}', 'BannersController@destroy')->name('banners.destroy');

    // Rotas das Redes Sociais
    Route::get('admin/lista-redesociais', 'RedeSociaisController@index')->name('admin.lista-redesociais');
    Route::get('admin/form-redesociais', 'RedeSociaisController@create')->name('admin.form-redesociais');
    Route::post('redesociais/store', 'RedeSociaisController@store')->name('redesociais.store');
    Route::get('admin/form-edit-redesociais/{id}', 'RedeSociaisController@edit')->name('admin.form-edit-redesociais');
    Route::put('redesociais/update/{id}', 'RedeSociaisController@update')->name('redesociais.update');
    Route::delete('redesociais/destroy/{id}', 'RedeSociaisController@destroy')->name('redesociais.destroy');

});

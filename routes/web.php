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

Route::get('/', function () {
    return view('site.home');
})->name('site.home');

Route::get('/loja', function () {
    return view('site.loja');
})->name('site.loja');

Route::get('/promocoes', function () {
    return view('site.promo');
})->name('site.promocoes');

Route::get('/contato', function () {
    return view('site.contato');
})->name('site.contato');

Route::get('/comentarios', function () {
    return view('site.comentario');
})->name('site.comentario');

Route::get('/presentes', function () {
    return view('index');
})->name('site.presentes');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'web']], function () {

    Route::get('admin/lista-produtos', function () {
        return view('admin.lista-produtos');
    })->name('admin.lista-produtos');

    Route::get('admin/form-produtos', function () {
        return view('admin.form-produtos');
    })->name('admin.form-produtos');

    Route::get('admin/lista-assinaturas', function () {
        return view('admin.lista-assinaturas');
    })->name('admin.lista-assinaturas');

    Route::get('admin/form-assinaturas', function () {
        return view('admin.form-assinaturas');
    })->name('admin.form-assinaturas');

    Route::get('admin/lista-banners', function () {
        return view('admin.lista-banners');
    })->name('admin.lista-banners');

    Route::get('admin/form-banners', function () {
        return view('admin.form-banners');
    })->name('admin.form-banners');

    Route::get('admin/lista-redesociais', function () {
        return view('admin.lista-redesociais');
    })->name('admin.lista-redesociais');

    Route::get('admin/form-redesociais', function () {
        return view('admin.form-redesociais');
    })->name('admin.form-redesociais');

    // Route::get('admin/listar', 'AdminController@produtos')->name('admin.construtora.produtos');
    // Route::get('construtora/criar', 'ConstrutoraController@create')->name('admin.construtora.create');
    // Route::post('construtora/store', 'ConstrutoraController@store')->name('admin.construtora.store');
    // Route::get('construtora/fotos/{id}', 'ConstrutoraController@show')->name('admin.construtora.fotos');


    // Route::get('construtora/dados/{id}', 'ConstrutoraController@dados')->name('admin.construtora.dados');
    // Route::post('construtora/dados/{id}', 'ConstrutoraController@storeDados')->name('admin.construtora.storeDados');
});

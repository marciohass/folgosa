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
Route::get('envio-email', function(){
    return new \App\Mail\SendMailUser();
});

// Rota da página Home
Route::get('/', 'SiteController@home')->name('site.home');
Route::get('/loja', 'SiteController@loja')->name('site.loja');
Route::get('/promocoes', 'SiteController@promocao')->name('site.promocoes');
Route::get('/contato', 'SiteController@contato')->name('site.contato');
Route::post('site/storeContato', 'SiteController@storeContato')->name('site.contato_store');
Route::get('/comentarios', 'SiteController@comentarios')->name('site.comentario');
Route::post('site/storeComentario', 'SiteController@storeComentario')->name('site.comentario_store');
Route::get('/gifts', 'SiteController@gifts')->name('site.gifts');

// Rotas de pagamento
Route::post('paymentmethod', 'SiteController@paymentmethod')->name('site.paymentmethod');
Route::post('redirectcheckout', 'SiteController@redirectcheckout')->name('site.redirectcheckout');
Route::post('/checkoutcard', 'SiteController@checkoutcard')->name('site.checkoutcard');
Route::post('/startsession','SiteController@startSession')->name('startsession');
Route::post('/checkoutboleto', 'SiteController@checkoutboleto')->name('site.checkoutboleto');
Route::post('/pedido', 'SiteController@pedido')->name('site.pedido');
Route::post('/boleto', 'SiteController@boleto')->name('site.boleto');

Route::get('/finalizado', 'SiteController@finalizado')->name('site.finalizado');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'web']], function () {

    Route::get('admin/lista-comentarios', 'ComentariosController@index')->name('admin.lista-comentarios');

    // Rota do Profile
    Route::get('admin/form-profile/{id}', 'ProfileController@edit')->name('admin.form-profile');
    Route::put('profile/update/{id}', 'ProfileController@update')->name('profile.update');
    Route::post('uploadlogo/{id}', 'ProfileController@upload_logo')->name('uploadlogo');

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
    Route::post('uploadassinatura/{id}', 'AssinaturasController@upload_assinatura')->name('uploadassinatura');

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

    // Rotas de Vendas
    Route::get('admin/lista-vendas', 'VendasController@index')->name('admin.lista-vendas');
    Route::get('admin/form-show-venda/{id}', 'VendasController@show')->name('admin.form-show-venda');
    Route::get('admin/lista-venda-produtos', 'VendasController@showProducts')->name('admin.lista-venda-produtos');
    Route::get('admin/lista-venda-assinaturas', 'VendasController@showSubscritions')->name('admin.lista-venda-assinaturas');
    Route::get('admin/lista-venda-presentes', 'VendasController@showGifts')->name('admin.lista-venda-presentes');

});

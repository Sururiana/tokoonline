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
    return view('auth.login');
    // $code = Transaction::getCOde();
    // dd($code);
})->middleware('guest');

Auth::routes([ 'register' => false ]);

Route::get('/user', function () {
    return view('user');
    // $code = Transaction::getCOde();
    // dd($code);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('users','Web\UsersController@index')->name('data.users');
    Route::get('kas','Web\KasController@index')->name('kas.index');

    Route::get('keuangan','Web\KeuanganController@index')->name('keuangan.index');
    Route::post('keuangan','Web\KeuanganController@index')->name('keuangan.index');

    Route::get('cetak_excel','Web\KasController@cetak_excel')->name('kas.cetak_excel');
    Route::resource('product', 'Web\ProductsController');
    Route::resource('transaction', 'Web\TransactionWebController', [
        'only' => ['index', 'show', 'edit', 'update'],
    ]);

    Route::get('update-status/{id}','Web\TransactionWebController@updateProcess')
    ->name('transaction.status');
    //dokumentasi awal alur route
    // Route::get('product','Web\ProductsController@index')->name('product.index');
    // Route::get('product/create','Web\ProductsController@create')->name('product.create');
    // Route::post('product','Web\ProductsController@store')->name('product.store');
    // Route::get('product/{idproduct}','Web\ProductsController@show')->name('product.show');
    // Route::get('product/{idproduct}/edit','Web\ProductsController@edit')->name('product.edit');
    // Route::put('product/{idproduct}','Web\ProductsController@update')->name('product.update');
    // Route::delete('product/{idproduct}','Web\ProductsController@destroy')->name('product.destroy');
});
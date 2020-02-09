<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('halo', function(){

//     $biodata = [
//         'nama' => 'Zainul',
//         'email' => 'zainul@sururiana.com',
//         'gender' => 'laki-laki',
//     ];

//     return \Response::json($biodata);

// });

//Route user
Route::get('users','Api\UsersApiController@index');
Route::get('user/{iduser}','Api\UsersApiController@user');
Route::post('auth/login','Api\UsersApiController@login');
Route::get('logout/{iduser}','Api\UsersApiController@logout');
Route::post('auth/register','Api\UsersApiController@register');
Route::post('auth/update/{iduser}','Api\UsersApiController@update');

//Route product
Route::get('products','Api\ProductController@products');
Route::get('product/{idproduct}','Api\ProductController@product');

//transaction
Route::get('transaction', 'Api\TransactionApiController@index');
Route::post('transaction', 'Api\TransactionApiController@store');
Route::get('transaction/{code}', 'Api\TransactionApiController@detail');
Route::get('transaction-user/{iduser}/{status?}', 'Api\TransactionApiController@byUser');
Route::post('upload/{codetra}','Api\TransactionApiController@upload');
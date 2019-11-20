<?php

use Illuminate\Http\Request;

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\AuthController@login')->name('login');
    Route::post('register', 'Auth\AuthController@register');
    //Route::get('products/{UserID}', 'CrudOperations@getProducts');
    //Route::get('products/{UserID}', 'CrudOperations@getProducts');
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'Auth\AuthController@logout');
        Route::get('user', 'Auth\AuthController@user');
       // Route::get('products/{UserID}', 'CrudOperations@getProducts');
    });

    
    
});
Route::get('getproducts', 'CrudOperations@getProducts');
Route::post('addProduct', 'CrudOperations@addProduct');
Route::get('getItem/{id}', 'CrudOperations@getItem');
Route::put('updateproduct/{id}', 'CrudOperations@updateproduct');
Route::delete('deleteproduct/{id}', 'CrudOperations@deleteproduct');

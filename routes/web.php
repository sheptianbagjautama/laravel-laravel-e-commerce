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

Route::get('/','BerandaController@index')->name('home');
Route::get('/add-to-cart/{id}','BerandaController@addTocart');
Route::get('/product/category/{slug}','BerandaController@category');
//Route::get('/product/detail/{id}','BerandaController@detail');
Route::get('/product/detail/{id}','BerandaController@detail');

Route::get('/shopping-cart','CartController@index');
Route::get('/shopping-cart/update/{id}', 'CartController@update');
Route::get('/shopping-cart/kurangi/{id}', 'CartController@kurangi');
Route::get('/shopping-cart/destroy', 'CartController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('tes',function(){
   return view('layouts.master');
});


Route::group(['middleware' => 'auth'], function (){
    Route::get('/shopping-cart/checkout','CartController@checkout');
    Route::post('/shopping-cart/bayar','CartController@bayar');
    Route::get('/invoice','InvoiceController@index');
    Route::get('/invoice/list','InvoiceController@list');
    Route::get('/invoice/detail/{id}','InvoiceController@detail')->name('invoice.detail');

    Route::get('/confirm/{id}', 'ConfirmController@index')->name('confirm.index');
    Route::post('/confirm/store','ConfirmController@store')->name('confirm.store');

    Route::get('/confirmAdmin','ConfirmAdminController@index')->name('confirmAdmin');
    Route::get('/confirmAdmin/detail/{id}','ConfirmAdminController@detail');
    Route::get('/confirmAdmin/terima/{order_id}','ConfirmAdminController@terima')->name('confirmAdmin.terima');
    Route::get('/confirmAdmin/total/{order_id}','ConfirmAdminController@tolak')->name('confirmAdmin.tolak');

    Route::get('/order','OrderController@index');
    Route::get('/order/detail/{id}','OrderController@detail');
    Route::get('/order/pdf','OrderController@exportPDFALL')->name('order.pdf');
    Route::get('/order_lunas/pdf','OrderController@exportPDF')->name('order_lunas.pdf');
    Route::get('/order/excel','OrderController@exportExcel')->name('order.excel');
    Route::get('/order_lunas/excel','OrderController@exportExcelPaid')->name('order_lunas.excel');

    Route::resource('product','ProductController');
    Route::get('productAdmin/detail/{id}','ProductController@detail')->name('product.detail');
    Route::resource('category','CategoryController');
});



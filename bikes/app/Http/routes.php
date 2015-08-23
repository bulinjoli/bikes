<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
    return Redirect::to("/invoices");
});

Route::resource('/invoices', "InvoiceController");

Route::get('/invoices/items/create_item/{id}', "ItemController@create_item");

Route::resource('/invoices/items', "ItemController");



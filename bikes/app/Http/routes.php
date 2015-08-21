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

Route::get('/', function () {
    //return view('welcome');
    $invoices = App\Invoice::all();
    $items = App\Item::all();

    return view("index", compact("items"), compact("invoices"));
});

//Route::get('/invoices', array("uses"=>"Project$index"));


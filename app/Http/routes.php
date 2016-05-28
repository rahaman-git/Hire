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

Route::get('/hire', 'FreelancersController@index');
Route::get('freelancers/{freelancers}', 'FreelancersController@show');
Route::get('fields/{fields}', 'FieldsController@show');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/', function () {
    return view('welcome');
});

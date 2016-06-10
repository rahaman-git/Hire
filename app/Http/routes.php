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

Route::auth();

Route::get('/freelancers', 'FreelancersController@index');
Route::get('/freelancer-details/{id}', 'FreelancersController@freelancerDetails');
Route::get('/freelancers/{freelancers}', 'FreelancersController@fetch');
Route::post('/freelancers/{freelancers}', 'FreelancersController@edit');
Route::post('/upload', 'FreelancersController@upload');
Route::get('fields/{fields}', 'FieldsController@show');
Route::get('/{freelancer}/{experience}', 'FreelancersController@fetchExp');
Route::put('/{freelancer}/{experience}', 'FreelancersController@editExp');
Route::post('/exp-delete/{freelancer}/{experience}', 'FreelancersController@expDelete');

Route::post('/doRegister', 'FreelancersController@doRegister');
Route::get('/doLogin', 'FreelancersController@login');
Route::post('/doLogin', 'FreelancersController@doLogin');
Route::get('/doLogout', 'FreelancersController@doLogout');


Route::get('/home', 'HomeController@index');
Route::get('/', function () {
    return view('welcome');
});

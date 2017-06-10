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
    return view('main');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contacts', 'HomeController@contacts');
Route::post('/contacts', 'HomeController@sand');

// Profile
Route::get('profile/view/{user}', ['middleware' => 'auth', 'uses' => 'Profile\ProfileControllers@view']);
Route::get('profile/edit/{user}', ['middleware' => 'auth', 'uses' => 'Profile\ProfileControllers@edit']);
Route::post('profile/update', ['middleware' => 'auth', 'uses' => 'Profile\ProfileControllers@update']);

//Dashboard
Route::get('/dashboard', 'DashboardController@show');

//Group
Route::get('/groups', 'GroupController@viewAll');
Route::get('/groups/create', 'GroupController@create');
Route::post('/groups/create', 'GroupController@save');

Route::get('/group/{group}', 'GroupController@view');
Route::post('/group/{group}', 'GroupController@update');
Route::delete('/group/{group}', 'GroupController@delete');


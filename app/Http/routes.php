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

//Hometask
Route::get('hometasks', 'HomeTaskController@viewAll');
Route::get('/hometasks/hometaskscreate', 'HomeTaskController@create');
Route::post('/hometasks/hometaskscreate', 'HomeTaskController@save');

Route::get('/hometasks/{id}', 'HomeTaskController@view');
Route::post('/hometasks/{id}', 'HomeTaskController@update');
Route::delete('/hometasks/{id}', 'HomeTaskController@delete');

//Article
Route::get('articles', 'ArticleController@viewAll');
Route::get('/articles/articlescreate', 'ArticleController@create');
Route::post('/articles/articlescreate', 'ArticleController@save');

Route::get('/articles/{id}', 'ArticleController@view');
Route::post('/articles/{id}', 'ArticleController@update');
Route::delete('/articles/{id}', 'ArticleController@delete');
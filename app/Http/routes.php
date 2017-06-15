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

//Chat
Route::get('/groups/chat', 'ChatController@viewAll');
Route::get('/groups/chat/create', 'ChatController@create');
Route::post('/groups/chat/create', 'ChatController@save');

Route::get('/group/chat/{id}', 'ChatController@view');
Route::post('/group/chat/{id}', 'ChatController@update');
Route::delete('/group/chat/{id}', 'ChatController@delete');


Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

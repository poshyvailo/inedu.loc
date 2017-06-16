<?php

use Illuminate\Http\Request;

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

//Отправка email для обратной связи
Route::post('/contacts', 'HomeController@send');

// Profile
Route::get('profile/view/{user}', ['middleware' => 'auth', 'uses' => 'Profile\ProfileControllers@view']);
Route::get('profile/edit/{user}', ['middleware' => 'auth', 'uses' => 'Profile\ProfileControllers@edit']);
Route::post('profile/update', ['middleware' => 'auth', 'uses' => 'Profile\ProfileControllers@update']);

/**
 * Groups
 **/
Route::get('/groups', 'GroupController@viewAll'); // Отображение всех групп пользователя
//Create
Route::get('/groups/create', 'GroupController@create'); // Форма создания группы
Route::post('/groups/create', 'GroupController@save'); // Добавление новой группы в БД
//View
Route::get('/groups/{group}', 'GroupController@view')->middleware('group'); // Отображение группы
//Edit
Route::get('/groups/{group}/edit', 'GroupController@updateView')->middleware(['group', 'groupOwner']); // Форма редактирования группы
Route::post('/groups/{group}/edit', 'GroupController@updateSave')->middleware(['group', 'groupOwner']); // Обновление группы в БД
//Invite
Route::get('/groups/{group}/invite', 'GroupController@inviteForm')->middleware(['group', 'groupOwner']); // Пригласить в группу
Route::post('/groups/{group}/invite', 'GroupController@sendInvite')->middleware(['group', 'groupOwner']); // Отправить приглашение
//Delete
Route::get('/groups/{group}/delete', 'GroupController@delete')->middleware('group'); // Удаление группы
Route::get('/group/{group}/logout', 'GroupController@logout')->middleware('group');

//Invites
Route::get('/invites', 'InviteController@show'); // Отображение приглашений
Route::get('/invite/{group}/join', 'InviteController@join'); // Вступить в группу
Route::get('/invite/{group}/reject', 'InviteController@reject'); // Отклонить приглашение

//classmates
Route::get('/classmates', 'HomeController@classmates');

//Members
Route::get('/group/{group}/members', 'GroupController@members')->middleware('group');

//Hometask
Route::get('/group/{group}/hometasks', 'HomeTaskController@viewAll')->middleware('group');
Route::get('/group/{group}/hometasks/create', 'HomeTaskController@create')->middleware(['group', 'groupOwner']);
Route::post('/group/{group}/hometasks/create', 'HomeTaskController@save')->middleware(['group', 'groupOwner']);

Route::get('/group/{group}/hometask/{hometask}', 'HomeTaskController@view')->middleware('group');
Route::get('/group/{group}/hometask/{hometask}/edit', 'HomeTaskController@edit')->middleware(['group', 'groupOwner']);
Route::post('/group/{group}/hometask/{hometask}/edit', 'HomeTaskController@update')->middleware(['group', 'groupOwner']);
Route::get('/group/{group}/hometask/{hometask}/delete', 'HomeTaskController@delete')->middleware(['group', 'groupOwner']);

//Article
Route::get('/group/{group}/articles', 'ArticleController@viewAll')->middleware('group');
Route::get('/group/{group}/articles/create', 'ArticleController@create')->middleware(['group', 'groupOwner']);
Route::post('/group/{group}/articles/create', 'ArticleController@save')->middleware(['group', 'groupOwner']);

Route::get('/group/{group}/article/{article}', 'ArticleController@view')->middleware('group');
Route::get('/group/{group}/article/{article}/edit', 'ArticleController@edit')->middleware(['group', 'groupOwner']);
Route::post('/group/{group}/article/{article}/edit', 'ArticleController@update')->middleware(['group', 'groupOwner']);
Route::get('/group/{group}/article/{article}/delete', 'ArticleController@delete')->middleware(['group', 'groupOwner']);
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

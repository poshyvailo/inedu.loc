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
Route::delete('/groups/{group}', 'GroupController@delete')->middleware('group'); // Удаление группы

//Invites
Route::get('/invites', 'InviteController@show'); // Отображение приглашений
Route::get('/invite/{group}/join', 'InviteController@join'); // Вступить в группу
Route::get('/invite/{group}/reject', 'InviteController@reject'); // Отклонить приглашение

//classmates
Route::get('/classmates', 'HomeController@classmates');

//Hometask
Route::get('/group/{group}/hometasks', 'HomeTaskController@viewAll')->middleware('group');
Route::get('/group/{group}/hometasks/create', 'HomeTaskController@create')->middleware(['group', 'groupOwner']);
Route::post('/group/{group}/hometasks/create', 'HomeTaskController@save')->middleware(['group', 'groupOwner']);

Route::get('/group/{group}/hometask/{hometask}', 'HomeTaskController@view')->middleware('group');
Route::get('/group/{group}/hometask/{hometask}/edit', 'HomeTaskController@edit')->middleware(['group', 'groupOwner']);
Route::post('/group/{group}/hometask/{hometask}/edit', 'HomeTaskController@update')->middleware(['group', 'groupOwner']);
Route::get('/group/{group}/hometask/{hometask}/delete', 'HomeTaskController@delete')->middleware(['group', 'groupOwner']);

//Article
Route::get('articles', 'ArticleController@viewAll');
Route::get('/articles/articlescreate', 'ArticleController@create');
Route::post('/articles/articlescreate', 'ArticleController@save');

Route::get('/articles/{id}', 'ArticleController@view');
Route::post('/articles/{id}', 'ArticleController@update');
Route::delete('/articles/{id}', 'ArticleController@delete');
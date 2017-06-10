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

//Dashboard
//Route::get('/dashboard', 'DashboardController@show');

//Groups
Route::get('/groups', 'GroupController@viewAll'); // Отображение всех групп пользователя
Route::get('/groups/create', 'GroupController@create'); // Форма создания группы
Route::post('/groups/create', 'GroupController@save'); // Добавление новой группы в БД
Route::get('/groups/{group}', 'GroupController@view'); // Отображение группы
Route::get('/groups/{group}/edit', 'GroupController@updateView'); // Форма редактирования группы
Route::post('/groups/{group}/edit', 'GroupController@updateSave'); // Обновление группы в БД
Route::delete('/groups/{group}', 'GroupController@delete'); // Удаление группы


//Route::get('/testmail', function (Request $request) {
//        $status = $request->session()->has('status') ? $request->session()->get('status') : false;
//
//    return view('testmail', ['status' => $status]);
//});
//Route::post('/testmail', function (Request $request) {
//    $email = $request->email;
//    $subject = $request->subject;
//    $text = $request->text;
//
//    Mail::send('emails.test', ['subject' => $subject, 'text' => $text], function ($message) use ($email, $subject) {
//        $message->from('inedu.notice@gmail.com', 'Laravel');
//        $message->subject($subject);
//        $message->to($email);
//    });
//    $request->session()->flash('status', 'Задание выполнено успешно!');
//    return redirect('/testmail');
//});
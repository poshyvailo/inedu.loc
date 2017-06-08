<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 02.06.2017
 * Time: 21:49
 */

namespace App\Http\Controllers\Profile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;

class ProfileControllers extends Controller
{
    /**
     * Функция отображения профиля пользователя
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(Request $request, User $user)
    {
        return view('auth.profile.view', ['user' => $user]);
    }

    /**
     * Функция изменения данных профиля пользователя
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit(Request $request, User $user)
    {
        // Если id вошедшего пользователя совпадает с id изменяемого
        // пользователя, то отображаем страницу редактирования данных.
        // Если id не совпадают делаем редирект на нужного пользователя.
        if (($loginUserId = $request->user()->id) === $user->id) {
            return view('auth.profile.edit', ['user' => $user]);
        }

        return redirect('/profile/edit/' . $loginUserId);
    }

    public function update(Request $request)
    {
        if ($user = $request->user()){
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'surname' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'avatar' => 'image'
            ]);

            if ($validator->fails()) {
                return redirect('/profile/edit/' . $user->id)
                    ->withInput()
                    ->withErrors($validator);
            }

            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            if ($request->avatar) {
                $avatarPath = 'images'. DIRECTORY_SEPARATOR .'avatar';
                $avatarType = explode('/', $request->avatar->getMimeType())[1];
                $avatarName = uniqid() . '.' . $avatarType;
                $avatar = $request->avatar->move($avatarPath, $avatarName);
                $user->avatar = DIRECTORY_SEPARATOR . $avatar->getPathName();
            }

            $user->save();

            return redirect('/profile/view/' . $user->id);
        }
    }
}
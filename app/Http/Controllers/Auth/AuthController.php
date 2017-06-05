<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
	$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
	return Validator::make($data, [
		    'name' => 'required|max:255',
		    'surname' => 'required|max:255',
		    'email' => 'required|email|max:255|unique:users',
		    'password' => 'required|min:6|confirmed',
		    'avatar' => 'image'
	]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $defaultAvatar = DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'static' . DIRECTORY_SEPARATOR . 'avatar.png';
        $avatarPath = 'images'. DIRECTORY_SEPARATOR .'avatar';
        $avatar = null;

	    if (isset($data['avatar'])) {
	        $avatarType = explode('/', $data['avatar']->getMimeType())[1];
	        $avatarName = uniqid() . '.' . $avatarType;
	        $avatar = $data['avatar']->move($avatarPath, $avatarName);
	    }
	
	    return User::create([
		    'name' => $data['name'],
		    'surname' => $data['surname'],
		    'email' => $data['email'],
		    'password' => bcrypt($data['password']),
		    'avatar' => $avatar ? DIRECTORY_SEPARATOR . $avatar->getPathName() : $defaultAvatar,
	    ]);
    }
}

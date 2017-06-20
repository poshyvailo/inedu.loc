<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $news = null;

        if (Auth::check()) {
            $groups = $request->user()->member()->get();
            foreach ($groups as $group) {
                $news['article'][] = $group->article()->limit(5)->get();
                $news['hometask'][] = $group->hometask()->limit(5)->get();
                $news['events'][] = $group->event()->limit(5)->get();
            }
        }

        return view('main', [
            'news' => $news,
        ]);
    }

    public function about()
    {
	    return view('about');
    }

    public function contacts()
    {
	    return view('contacts');
    }

    public function send(Request $request)
    {
	    $email = $request->email;
	    $name = $request->name;
	    $comments = $request->comments;

	    Mail::send('emails.callback', [
		'name' => $name, 
		'comments' => $comments
	    ], function ($message) use ($email, $name) {
	        $message->from($email);
	        $message->to('inedu.notice@gmail.com', 'Laravel');
	        $message->subject('Вопрос от пользователя');
	        $message->replyTo($email);
	    });

	    $request->session()->flash(
	        'message_success',
		'Сообещение отправлено успешно!'
        );
	    return redirect($request->path());
    }

}

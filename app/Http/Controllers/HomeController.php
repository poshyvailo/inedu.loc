<?php

namespace App\Http\Controllers;

use Mail;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    public function about() {
         return view('about');
    }
    
    public function contacts() {
         return view('contacts');
    }
    
    public function send(Request $request){
        $email=$request->email;
        $name=$request->name;
        $comments=$request->comments;
        
        Mail::send('/contacts', 
        ['name'=>$name,
         'comments'=>$comments],
        
            function ($message) use ($email, $name){
            $message->from($email);
            $message->name($name);
            $message->to('inedu.notice@gmail.com', 'Laravel');
            });
            
        $request->session()->flash('status', 'Сообещение отправлено успешно!');
        return redirect('/testmail');
        }

}

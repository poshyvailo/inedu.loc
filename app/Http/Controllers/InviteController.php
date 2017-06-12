<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 12.06.2017
 * Time: 23:07
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invite;

class InviteController extends Controller
{
    public function show(Request $request)
    {
        $userEmail = $request->user()->email;
        $invites = Invite::where('email', $userEmail)->get();
        return view('invites.show', ['invites' => $invites]);
    }

    public function join()
    {

    }

    public function reject()
    {

    }
}
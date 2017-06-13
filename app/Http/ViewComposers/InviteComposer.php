<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 12.06.2017
 * Time: 21:37
 */

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Invite;

class InviteComposer
{
    protected $invites;

    function __construct()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->email;
            $this->invites = Invite::where([['email', $user_id], ['active', true]])->count();
        } else {
            $this->invites = null;
        }

    }

    public function compose(View $view)
    {
        $view->with('inviteCount', $this->invites);
    }
}
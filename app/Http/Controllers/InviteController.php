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
use App\Group;
use App\Member;

class InviteController extends Controller
{
    public function show(Request $request)
    {
        $userEmail = $request->user()->email;
        $invites = Invite::where([['email', $userEmail], ['active', true]])->get();
        return view('invites.show', ['invites' => $invites]);
    }

    public function join(Request $request, Group $group)
    {
	$userEmail = $request->user()->email;
	$userId = $request->user()->id;

	$member = new Member();
	$member->group_id = $group->id;
	$member->user_id = $userId;
	$member->save();

	$inv = Invite::where([['email', $userEmail],['group_id', $group->id]])->first();
	$inv->active = false;
	$inv->save();

	return redirect('/groups/' . $group->id);
    }

    public function reject(Request $request, Group $group)
    {
        $email = $request->user()->email;

        Invite::where([['email', $email],['group_id', $group->id]])->delete();
        $request->session()->flash(
            'message_success',
            'Вы отклонили приглашение в группу ' . $group->title
        );
        return redirect('/invites');
    }
}
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
	$user = $request->user()->id;
	
	$member = new Member();
	$member->group_id = $group->id;
	$member->user_id = $user;
	$member->save();
	
	$invs = Invite::where([['user_id', $user],['group_id', $group->id]])->get();
	foreach ($invs as $inv) {
	    $inv->active = false;
	    $inv->save();
	}
	var_dump($invs);
	return redirect('/groups/' . $group->id);
    }

    public function reject()
    {

    }
}
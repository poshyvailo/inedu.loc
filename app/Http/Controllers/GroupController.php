<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 05.06.2017
 * Time: 13:10
 */

namespace App\Http\Controllers;

use App\Group;
use App\Invite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    public function viewAll(Request $request)
    {
        $user = $request->user();
        $groups = Group::where('creator_id', $user->id)->get();

        return view('group.groups', [
            'groups' => $groups,
        ]);
    }

    public function create()
    {
        return view('group.create');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required|string',
        ]);

        $request->user()->group()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('/groups');
    }

    public function view(Request $request, Group $group)
    {
        $owner = $request->user()->id == $group->creator_id ? true : false;
        return view('group.view', [
            'group' => $group,
            'owner' => $owner,
        ]);
    }

    public function updateView(Group $group)
    {
        return view('group.update-view', [
            'group' => $group
        ]);
    }

    public function updateSave(Request $request, Group $group)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect($request->path())
                ->withInput()
                ->withErrors($validator);
        }

        $group->title = $request->title;
        $group->description = $request->description;
        $group->save();

        $request->session()->flash(
            'message_success',
            'Группа <strong>' . $group->title . '</strong> успешно обновлена!'
        );

        return redirect($request->path());
    }

    public function delete(Request $request, Group $group)
    {

    }

    public function inviteForm(Group $group)
    {
        return view('group.invite', [
            'group' => $group,
        ]);
    }

    public function sendInvite(Request $request, Group $group)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $check = Invite::where([
            ['email', $request->email],
            ['group_id', $group->id],
        ])->get();

        if ($request->email == $request->user()->email)
        {
            $request->session()->flash(
                'message_warning',
                'Вы не можете отправить приглашение себе!'
            );
        }

        if (count($check) == 0) {

            $invite = new Invite();
            $invite->email = $request->email;
            $invite->group_id = $group->id;
            $invite->user_id = $request->user()->id;
            $invite->active = true;
            $invite->save();

            Mail::send('emails.invite', ['group' => $group, 'user' => $request->user()], function ($message) use ($request, $group) {
                $message->from('inedu.notice@gmail.com', 'Laravel');
                $message->subject('Приглашение в группу "' . $group->title . '"');
                $message->to($request->email);
            });

            $request->session()->flash(
                'message_success', 'Приглашение успешно отправлено!'
            );
        } else {
            $request->session()->flash(
                'message_warning',
                'На этот email приглашение уже было отправленно!'
            );
        }

        return redirect($request->path());
    }
}
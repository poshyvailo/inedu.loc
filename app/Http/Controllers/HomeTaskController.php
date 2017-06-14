<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 05.06.2017
 * Time: 13:10
 */

namespace App\Http\Controllers;

use App\Group;
use App\Home_task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeTaskController extends Controller
{

    function __construct()
    {
//        $this->middleware('group');
    }

    public function viewAll(Request $request, Group $group)
    {
        if ($request->user()->id == $group->creator_id) $owner = true;
        $hometasks = $group->hometask()->get();

        return view('hometasks.hometasks', [
            'hometasks' => $hometasks,
            'group' => $group,
            'owner' => isset($owner) ? $owner : false,
        ]);
    }

    public function create(Request $request, Group $group)
    {
        return view('hometasks.hometaskscreate', ['group' => $group]);
    }

    public function save(Request $request, Group $group)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required|string',
        ]);
        $group->hometask()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $request->session()->flash(
            'message_success',
            'Домашнее задание <strong>' . $request->title . '</strong> успешно добавлено!'
        );

        return redirect('/group/' . $group->id . '/hometasks');
    }

    public function edit(Request $request, Group $group, Home_task $hometask)
    {
        return view('hometasks.edit', [
            'hometask' => $hometask,
            'group' => $group,
        ]);
    }
    public function update(Request $request, Group $group, Home_task $hometask)
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

        $hometask->title = $request->title;
        $hometask->description = $request->description;
        $hometask->save();

        $request->session()->flash(
            'message_success',
            'Группа <strong>' . $hometask->title . '</strong> успешно обновлена!'
        );

        return redirect($request->path());
    }
    public function delete(Request $request, Group $group)
    {

    }
}
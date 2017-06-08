<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 05.06.2017
 * Time: 13:10
 */

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

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

    public function delete(Request $request, Group $group)
    {
	
    }
}
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

    public function create()
    {
        return view('hometasks.hometaskscreate');
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

        return redirect('/hometasks');
    }
    
//    public function update(Request $request){
//        $hometasks->update();
//        $hometasks->save();
//        return back()->with('massage','ДЗ обновлены');
//    }
    
    public function update(Home_task $hometasks)
    {
        return view('hometasks.update-view', [
            'hometasks' => $hometasks
        ]);
    }
    public function updateSave(Request $request, Home_task $hometasks)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required|string',
        ]);  
    }
    public function delete(Request $request, Group $group)
    {

    }
}
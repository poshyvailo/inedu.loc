<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 18.06.2017
 * Time: 11:38
 */

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Calendar;
use MaddHatter\LaravelFullcalendar\Facades\Calendar as FCalendar;
use App\Group;

class EventController extends Controller
{
     public function view(Request $request, Group $group)
     {

         $events = $group->event()->get();

         $calendar = FCalendar::addEvents($events)->setOptions([
             'firstDay' => 1,
             'height' => 500
         ]);

         return view('event.index', [
             'group' => $group,
             'calendar' => $calendar,
             'owner' => $request->user()->id == $group->creator_id ? true : false
         ]);
     }

     public function viewList(Request $request, Group $group)
     {
         $events = $group->event()->get();
         return view('event.list', [
             'group' => $group,
             'events' => $events,
             'owner' => $request->user()->id == $group->creator_id ? true : false
         ]);
     }

     public function create(Request $request, Group $group)
     {
         return view('event.create', [
             'group' => $group,
             'owner' => $request->user()->id == $group->creator_id ? true : false
         ]);
     }

     public function save(Request $request, Group $group)
     {
         $this->validate($request, [
             'title' => 'required|max:255',
             'start' => 'date',
             'end' => 'date',
         ]);

         $group->event()->create([
             'title' => $request->title,
             'start' => date('Y-m-d H:i:s', strtotime($request->start)),
             'end' => date('Y-m-d H:i:s', strtotime($request->end)),
             'all_day' => isset($request->all_day) ? true : false,
         ]);

         $request->session()->flash(
             'message_success',
             'Событие успешно создано!'
         );

         return redirect('/group/' . $group->id . '/events/list');
     }

     public function edit(Request $request, Group $group, Event $event)
     {
         return view('event.update', [
             'group' => $group,
             'event' => $event,
             'owner' => $request->user()->id == $group->creator_id ? true : false
         ]);
     }

     public function update(Request $request, Group $group, Event $event)
     {
         $this->validate($request, [
             'title' => 'required|max:255',
             'start' => 'date',
             'end' => 'date',
         ]);

         $event->title = $request->title;
         $event->start = date('Y-m-d H:i:s', strtotime($request->start));
         $event->end = date('Y-m-d H:i:s', strtotime($request->end));
         $event->all_day = isset($request->all_day) ? true : false;
         $event->save();

         $request->session()->flash(
             'message_success',
             'Событие успешно обновленно!'
         );

         return redirect('group/' . $group->id . '/events/list');
     }

     public function delete(Request $request, Group $group, Event $event)
     {
         $event->delete();

         $request->session()->flash(
             'message_success',
             'Событие успешно удалено!'
         );

         return redirect('group/' . $group->id . '/events/list');
     }
}
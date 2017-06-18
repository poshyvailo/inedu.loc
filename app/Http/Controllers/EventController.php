<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 18.06.2017
 * Time: 11:38
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Calendar;
use MaddHatter\LaravelFullcalendar\Facades\Calendar as FCalendar;
use App\Group;

class EventController extends Controller
{
     public function view(Request $request, Group $group)
     {

         $events = [];

         $events[] = Calendar::event(
             'Event One',
             false,
             '2017-06-11T0800',
             '2017-06-12T0800',
             0,
             [
                 'backgroundColor' => 'red'
             ]
         );

         $events[] = Calendar::event(
             "Valentine's Day",
             true,
             new \DateTime('2017-06-14'),
             new \DateTime('2017-06-14'),
             'stringEventId'
         );

         $calendar = FCalendar::addEvents($events)->setOptions([
             'firstDay' => 1,
         ]);

         return view('event.index', [
             'group' => $group,
             'calendar' => $calendar,
         ]);
     }

     public function viewList(Request $request, Group $group)
     {
         return view('event.list', [
             'group' => $group,
         ]);
     }

}
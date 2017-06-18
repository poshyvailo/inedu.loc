<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use MaddHatter\LaravelFullcalendar\Event as IEvent;

class Event extends Model implements IEvent
{
    protected $fillable = [
        'title', 'group_id', 'start', 'end', 'all_day'
    ];

    protected $dates = ['start', 'end'];

    public function group()
    {
        $this->belongsTo(Group::class);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function isAllDay()
    {
        return (bool)$this->all_day;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'group_id', 'start', 'end', 'all_day'
    ];

    public function group()
    {
        $this->belongsTo(Group::class);
    }
}

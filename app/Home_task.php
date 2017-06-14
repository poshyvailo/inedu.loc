<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home_task extends Model
{
    protected $fillable = ['title', 'description'];

    protected $table = 'home_tasks';

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}

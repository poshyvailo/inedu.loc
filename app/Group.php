<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'title', 'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function member()
    {
        return $this->hasMany(Member::class);
    }

    public function article()
    {
        return $this->hasOne(Article::class);
    }

    public function hometask()
    {
        return $this->hasOne(Home_task::class, 'group_id');
    }
}

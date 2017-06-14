<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
     protected $fillable = ['title', 'description'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}

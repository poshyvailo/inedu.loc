<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = ['group_id', 'user_id', 'active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function group(){
	return $this->belongsTo(Group::class);
    }
}

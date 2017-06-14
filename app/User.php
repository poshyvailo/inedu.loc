<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Member;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'avatar', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function group()
    {
        return $this->hasOne(Group::class, 'creator_id');
    }

    public function member()
    {
        return $this->belongsToMany(Group::class, 'members');
    }

    public function memberIn()
    {

        $createdGroups = $this->group()->get();
        $memberGroups = $this->member()->get();

        if (count($createdGroups) > 0 || count($memberGroups) > 0) {
            return true;
        }
        return false;
    }
}

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
    
    public function group(){
	    return $this->hasOne(Group::class, 'creator_id');
    }
    
    public function memberIn(){
	$groups = Member::where('user_id', $this->id)->get();
	if (count($groups) > 0) {
	    return true;
	} 
	return false;
    }
}

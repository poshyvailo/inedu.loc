<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 16.06.2017
 * Time: 22:21
 */

namespace App;

use Cmgmyr\Messenger\Models\Thread as Model;
use App\Group;

class Thread extends Model
{
    protected $fillable = ['group_id', 'subject'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
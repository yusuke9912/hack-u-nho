<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomUser extends Model
{
    protected $fillable = [
        'room_id',
        'user_id',
    ];

    protected $table = 'room_user';
}

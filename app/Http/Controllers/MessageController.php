<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Room;
use App\User;
use App\RoomUser;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function getRoomId($user){
        $room=RoomUser::where('user_id', $user)->get();
        if(isset($room[0])){
            $room_id = $room[0]->room_id;
            return $room_id;
        }else{
            $new_room = Room::create(['name' => 'test']);
            RoomUser::create(['room_id'=>$new_room->id,'user_id'=>$user]);
            return;
        }
    }

    public function getMessage($user)
    {
        $room=RoomUser::where('user_id', $user)->get();
        if(isset($room[0])){
            $room_id = $room[0]->room_id;
            $messages = \DB::table('messages')->where('room_id',$room_id )->join('users','messages.user_id','=','users.id')->get();
            return $messages;
        }else{
            $new_room = Room::create(['name' => 'test']);
            RoomUser::create(['room_id'=>$new_room->id,'user_id'=>$user]);
            return;
        }
    }
    
    public function store(Request $request)
    {
        Log::Debug($request->all());
        return Message::create($request->all());
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Room;
use App\User;
use App\RoomUser;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function getRoomId($user){
        $room=RoomUser::where('user_id', $user)->get();
        if(isset($room[0])){
            $room_id = $room[0]->room_id;
            return $room_id;
        }else{
            Log::Debug("Roomが存在しません");
            return;
        }
    }

    public function getMessage($user)
    {
        $room=RoomUser::where('user_id', $user)->get();
        $my_room=RoomUser::where('user_id', Auth::id())->get();
        if(isset($room[0])){
            Log::Debug("Roomが見つかりました");
            $room_id = $room[0]->room_id;
            $messages = \DB::table('messages')->where('room_id',$room_id )->join('users','messages.user_id','=','users.id')->get();
            return $messages;
        }else{
            Log::Debug("Roomが見つかりません");
            $new_room = Room::create(['name' => 'test']);
            RoomUser::create(['room_id'=>$new_room->id,'user_id'=>$user]);
            RoomUser::create(['room_id'=>$new_room->id,'user_id'=>Auth::id()]);
            return;
        }
    }
    
    public function store(Request $request)
    {
        Log::Debug($request->all());
        $user=User::find(Auth::id());
        return Message::create(['user_id'=>$user->id,'room_id'=>$request->room_id,'body'=>$request->body]);
    }
}

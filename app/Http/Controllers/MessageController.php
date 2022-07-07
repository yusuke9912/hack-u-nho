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
    public function getMessage(Request $request)
    {
        Log::Debug("getMessage");
        $room_id = $request->room_id;
        $messages = \DB::table('messages')->where('room_id',$room_id )->join('users','messages.user_id','=','users.id')->get();
        return $messages;
    }

    public function getRoom($user_id)
    {
        Log::Debug("getRoom");
        $room_user_rocords = RoomUser::where('user_id', Auth::id())->get();
        // $room_user_rocordsが存在するかどうか
            if(isset($room_user_rocords[0])) {
            // 自分のidが含まれているレコードをforeachで回す
            foreach($room_user_rocords as $room_user) {
                // $room_userのroom_idと一致するレコードを取得。
                $records = RoomUser::where('room_id', $room_user->room_id)->get();
                // Log::Debug("自分のuser_idと入っているroom_idが一致しているレコード");
                // Log::Debug($records);
                // $recordsをforeachで回す
                    foreach($records as $record) {
                    // Log::Debug("foreach-------------");
                    // Log::Debug(isset($record));
                    // Log::Debug($record->user_id);
                    // Log::Debug($user_id);
                    // Log::Debug("foreach-------------");
                    // $recordが存在するか且つ、そのレコードに$user_idが含まれているものがあるかどうか
                    if(isset($record) && $record->user_id == $user_id) {
                        // 存在する場合はtrue
                        $messages = \DB::table('messages')->where('room_id',$record->room_id )->join('users','messages.user_id','=','users.id')->get();
                        return $record;
                    }
                }
                Log::Debug("111");
                $new_room = Room::create(['name' => 'test']);
                Log::Debug($new_room);
                RoomUser::create(['room_id'=>$new_room->id,'user_id'=>$user_id]);
                RoomUser::create(['room_id'=>$new_room->id,'user_id'=>Auth::id()]);
                return;
            }
        } else {
            Log::Debug("222");
            $new_room = Room::create(['name' => 'test']);
            RoomUser::create(['room_id'=>$new_room->id,'user_id'=>$user_id]);
            RoomUser::create(['room_id'=>$new_room->id,'user_id'=>Auth::id()]);
            return;
        }
    }
 
    
    public function store(Request $request)
    {
        // Log::Debug($request);
        return Message::create(['user_id'=>Auth::id(),'room_id'=>$request->room_id,'body'=>$request->body]);
    }
}

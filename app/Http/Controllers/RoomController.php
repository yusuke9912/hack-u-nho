<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Room;
use App\RoomUser;
use App\Message;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index()
    {
        $result = [];
        $room_user_rocords = RoomUser::where('user_id', Auth::id())->get();
        // $room_user_rocordsが存在するかどうか
        if(isset($room_user_rocords[0])) {
            // 自分のidが含まれているレコードをforeachで回す
            foreach($room_user_rocords as $room_user) {
                $records = RoomUser::where('room_id', $room_user->room_id)->get();
                // $recordsをforeachで回す
                foreach($records as $record) {
                    // $recordが存在するか且つ、そのレコードに$user_idが含まれているものがあるかどうか
                    if(isset($record) && $record->user_id != Auth::id()) {
                        // 存在する場合はtrue
                        $user = User::find($record->user_id);
                        Log::Debug($user);   

                        $json= json_encode($record);
                        $record = json_decode($json, true);

                        $json= json_encode($user);
                        $user = json_decode($json, true);

                        $record = array_merge($record,array('user' => $user));
                        Log::Debug("aaaaa");   
                        Log::Debug($record);   
                        array_push($result,$record);
                    }
            }
        }

        return $result;
    }
}
}

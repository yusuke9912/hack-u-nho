<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Room;
use App\RoomUser;
use App\Message;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function send($user)
    {

    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
    
        return $user;
    }

}

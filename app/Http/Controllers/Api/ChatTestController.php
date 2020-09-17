<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Events\MessageSent;

class ChatTestController extends Controller
{
    public function chat(Request $request)
    {
        $user = User::find(1);
        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]) ;

        event(new MessageSent($user, $message));

        return response()->json([
            'status' => 'Message Sent !',
            'data' => $user,
            'message' => $message
        ]);
    }

    
}

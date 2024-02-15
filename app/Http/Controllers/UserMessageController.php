<?php

namespace App\Http\Controllers;

use App\Models\UserMessage;
use Illuminate\Http\Request;

class UserMessageController extends Controller
{
    public function userMessage(Request $request){
        $order = UserMessage::create([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_message' => $request->user_message,

        ]);
        flashy()->success('User Message Sent Successfully. ✅');
         return redirect()->route('contact.us');


    }
}
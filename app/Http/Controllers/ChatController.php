<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index()
    {
        $chat = Chat::latest()->take(10)->get()->reverse();
        $lastMsgId = Chat::latest()->first()->id;

        return view('chat.index', compact('chat', 'lastMsgId'));
    }

    public function push(Request $request)
    {
        $user = Auth::user();

        $msg = Chat::create([
            'user_id' => $user->id,
            'text' => $request->text
        ]);

        $date = \Carbon\Carbon::parse($msg->created_at)->locale('ru');
        $formatted = $date->isoFormat('H:mm');

        return [
            'avatar' => $user->avatar,
            'name' => $user->name,
            'msgId' => $msg->id,
            'date' => $formatted
        ];
    }

    public function update(Request $request)
    {

        $msgs = DB::table('chats')
                    ->where('chats.id', '>', $request->id)
                    ->join('users', 'chats.user_id', '=', 'users.id')
                    ->select('chats.id', 'chats.text', 'chats.created_at', 'users.name', 'users.avatar')
                    ->oldest()
                    ->get();

        if(count($msgs))
            $lastMsgId = $msgs->last()->id;
        else
            $lastMsgId = Chat::latest()->first()->id;

        return [
            'msgs' => $msgs,
            'lastMsgId' => $lastMsgId
        ];
    }


    public function store_visibility(Request $request)
    {   
        session([
            'chat' => $request->visibility
        ]);

        return 'success';
    }

}

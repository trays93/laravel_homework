<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Message::with('sender')
            ->with('to')
            ->where('to_id', '=', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('messages.index', [
            'messages' => $messages
        ]);
    }

    public function writeMessage()
    {
        return view('messages.write', []);
    }
}

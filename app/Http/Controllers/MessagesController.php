<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
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

    public function writeMessage(Request $request)
    {
        $success = $request->get('success');

        $users = User::where('id', '!=', Auth::user()->id)
            ->get();

        return view('messages.write', [
            'users' => $users,
            'success' => $success,
        ]);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'to' => ['required'],
            'title' => ['required'],
            'body' => ['required'],
        ]);

        $to = User::find($request->get('to'));
        if ($to === null) {
            return redirect()->route('write-message');
        }

        $message = new Message();
        $message->title = $request->get('title');
        $message->body = $request->get('body');
        $message->to()->associate($to);
        $message->sender()->associate(Auth::user());
        $message->save();

        return redirect()->route('write-message', [
            'success' => 'Message sent successfully!',
        ]);
    }
}

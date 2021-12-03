<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        return view('messages.index', []);
    }

    public function writeMessage()
    {
        return view('messages.write', []);
    }
}

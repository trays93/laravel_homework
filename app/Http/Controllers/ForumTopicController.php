<?php

namespace App\Http\Controllers;

use App\Models\ForumTopic;
use Illuminate\Http\Request;

class ForumTopicController extends Controller
{
    public function index(Request $request)
    {
        $topics = ForumTopic::with('creator')->get();
        return view('forum.index', [
            'topics' => $topics,
        ]);
    }

    public function getTopic(int $topicId)
    {
        $topic = ForumTopic::with('creator')->find($topicId);
        return view('forum.topic', [
            'topic' => $topic,
        ]);
    }
}

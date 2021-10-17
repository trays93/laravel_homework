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
        $topic = ForumTopic::with(['creator', 'comments', 'comments.user'])->find($topicId);
        return view('forum.topic', [
            'topic' => $topic,
        ]);
    }

    public function addComment(int $topicId, Request $request)
    {
        $topic = ForumTopic::with(['creator', 'comments', 'comments.user'])->find($topicId);
        $comment = $request->get('comment');

        if ($comment === null) {
            return view('forum.topic', [
                'topic' => $topic,
                'error' => 'Comment cannot be empty!'
            ]);
        }

        return view('forum.topic', [
            'topic' => $topic,
        ]);
    }
}

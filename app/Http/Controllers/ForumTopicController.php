<?php

namespace App\Http\Controllers;

use App\Models\ForumTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function addTopic(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);
        
        $t = new ForumTopic();
        $t->title = $request->get('title');
        $t->description = $request->get('description');
        $t->creator()->associate(Auth::user());
        $t->save();

        return redirect()->route('forum');
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

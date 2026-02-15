<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\ForumReply;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $posts = Forum::with(['user','replies.user'])
            ->latest()
            ->paginate(10);

        return view('forum.index', compact('posts'));
    }


    public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        Forum::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content
        ]);

        return back()->with('success', 'Post created successfully!');
    }

    public function storeReply(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
            'forum_id' => 'required',
            'content' => 'required'
        ]);

        ForumReply::create([
            'post_id' => $request->post_id,
            'forum_id' => $request->forum_id,
            'user_id' => auth()->id(),
            'content' => $request->content
        ]);

        return back();
    }

}

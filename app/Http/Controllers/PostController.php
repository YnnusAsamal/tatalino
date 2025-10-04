<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = new Post();

        $posts->title = $request->Input('title');
        $posts->content = $request->Input('content');
        $posts->author = Auth::id();
        $posts->image = $request->Input('image');
        $posts->category = $request->Input('category');
        $posts->save();

        return redirect()->back()->with('status', 'Post Created Successfully');
    }


    public function published($id)
    {
        $post = Post::findOrFail($id);
        $post->status = 'Published';
        $post->published_at = Carbon::now();
        $post->save();

        Alert::success('Published successfully');
        return redirect()->back();
    }

    public function unpublished($id)
    {
        $post = Post::findOrFail($id);
        $post->status = 'Unpublished';
        $post->unpublished_at = Carbon::now();
        $post->save();

        Alert::success('Published successfully');
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}

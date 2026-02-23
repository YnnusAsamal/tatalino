<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExploreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Post::with(['users.profile', 'category', 'likes','comments'])
                ->where('status', 'Published');

        if ($request->filled('search')) {
        $search = $request->search;

        $query->whereHas('users', function ($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%");
        });
        }


        $sort = $request->get('sort', 'newest');

        if ($sort == 'oldest') {
            $query->orderBy('created_at', 'asc');
        } elseif ($sort == 'popular') {

            $query->withCount('likes')->orderBy('likes_count', 'desc');
        } else {

            $query->orderBy('created_at', 'desc');
        }
        $posts = $query->get();

        return view('explores.index', compact('posts'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

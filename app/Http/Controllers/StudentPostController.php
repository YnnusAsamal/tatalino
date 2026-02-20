<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class StudentPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $featuredPosts = Post::where('status', 'Published')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        

        $essays = Post::where('category_id', 9)->where('status', 'Published')->get();
        $writer = User::where('featured', 'Featured')->get();
        
        return view('studentposts.index', compact('posts', 'writer', 'featuredPosts', 'essays'));
    }

    public function allposts(Request $request)
    {

        $query = Post::with(['users.profile', 'category', 'likes'])
                ->where('status', 'Published');

        $sort = $request->get('sort', 'newest');

        if ($sort == 'oldest') {
            $query->orderBy('created_at', 'asc');
        } elseif ($sort == 'popular') {

            $query->withCount('likes')->orderBy('likes_count', 'desc');
        } else {

            $query->orderBy('created_at', 'desc');
        }

        $posts = $query->get();

        return view('publish.index', compact('posts'));
    }

    public function collections()
    {
        // Fetch all categories with count of published posts
        $categories = Category::withCount(['posts' => function($query) {
            $query->where('status', 'Published');
        }])->get();

        return view('collections.index', compact('categories'));
    }

    public function showCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $posts = $category->posts()->where('status', 'Published')->get();

        return view('collections.show', compact('category', 'posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('studentposts.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $destinationPath = public_path('assets/posts');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move($destinationPath, $imageName);
        }

        Post::create([
            'author' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'image' => $imageName,
            'status' => 'Unpublished',
        ]);

        Alert::success('Your work has been submitted for review');
        return redirect()->back()->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $myfeeds = Post::where('author', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('studentposts.show', compact('myfeeds'));
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

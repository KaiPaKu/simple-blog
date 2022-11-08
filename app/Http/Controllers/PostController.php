<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        //dd($posts[5]);
    
        return view('home',
            [ 'posts' => $posts ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
	    $post->title   = $request->input('title');
	    $post->lead    = $request->input('lead');
	    $post->content = $request->input('content');
        $post->user_id = auth()->user()->id;
        //$post->image   = "https://via.placeholder.com/900x400.png/001166?text=eum";   

        $path = $request->file('image')->store('images', 'public');
        $post->image = 'storage/'. $path;

	    $post->save();

	    return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //dd($post);
        return view('post', ['post' => $post ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('editPost', ['post' => $post ]);

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
	    $post->title   = $request->input('title');
	    $post->lead    = $request->input('lead');
	    $post->content = $request->input('content');
        $post->user_id = auth()->user()->id;

        if($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $post->image = 'storage/'. $path;
        }

	    $post->save();

	    return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}

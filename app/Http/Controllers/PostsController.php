<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
        // $this->middleware('manutenzione')->only('show');
    }

    public function index()
    {
        $posts = Post::with('user', 'category', 'tags')->latest()->paginate(15);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load('user', 'category', 'tags', 'comments');
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $post = new Post;

        return view('posts.create', compact('post'));
    }

    public function store(PostRequest $request)
    {
        $post = auth()->user()->posts()->create($request->validated());

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.show', $post)->with('type', 'success')->with('status', 'Post was created');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $post->load('tags');

        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->update($request->validated());

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.show', $post)->with('type', 'warning')->with('status', 'Post was updated');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect('/')->with('type', 'danger')->with('status', 'Post was deleted');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Category;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth')->except('index', 'show');
    }

    public function index()
    {
        $posts = Post::with('user', 'category', 'tags')->latest();
        return $posts->get();
    }

    public function show(Post $post)
    {
        $post->load('user', 'category', 'tags', 'comments');

        return $post;
    }

    public function store(PostRequest $request)
    {
        $post = auth()->user()->posts()->create($request->validated());

        $post->tags()->sync($request->tags);

        return $post;
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->update($request->validated());

        $post->tags()->sync($request->tags);

        return $post;
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return $post;
    }
}

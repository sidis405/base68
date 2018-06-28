<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use App\Http\Requests\PostRequest;
use App\Events\PostWasUpdatedEvent;

class PostsController extends Controller
{
    public function __construct()
    {
        // tutto eccetto index e show
        // $this->middleware('auth')->only('create', 'store', 'edit', 'update', 'destroy');

        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        $posts = Post::with('user', 'category', 'tags')->with(['comments' => function ($query) {
            return $query->latest();
            // return $query->oldest();
            // return $query->orderBy('created_at', 'DESC');
        }])->latest()->paginate(15);
        // }])->latest()->simplePaginate(15);

        // return $posts;

        // compact('posts') :  ['posts' => $posts]

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        // $post = Post::where('id', $id)->with('user', 'category', 'tags')->first();
        $post->load('user', 'category', 'tags');

        // return $post;

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(PostRequest $request)
    {
        $post = auth()->user()->posts()->create($request->validated());


        // $post->cover = Storage::disk('public_vero')->putFile('covers', $file);
        // $post->cover = $request->file('cover');
        // $post->save();

        $post->tags()->sync($request->tags);

        // foreach ($request->tag as $tag) {
        //     $post->tags()->attach($tag);
        // }

        return redirect()->route('posts.show', $post);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $categories = Category::all();
        $tags = Tag::all();

        $post->load('tags');

        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->update($request->validated());

        $post->tags()->sync($request->tags);

        event(new PostWasUpdatedEvent($post));

        return redirect()->route('posts.show', $post);
    }
}

<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
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
        // return $request->all();
        // return $request->only('title', 'preview', 'category_id', 'body');

        // return \Auth::user()->id;
        // return auth()->user()->id;
        // return auth()->id();
        // return request()->all();
        // return $request->all();
        // return $request->get('preview');
        // return $request->preview;

        // title
        // slug
        // preview
        // category_id
        // body
        // user_id

        // $post = new Post;
        // $post->title = $request->title;
        // $post->preview = $request->preview;
        // $post->category_id = $request->category_id;
        // $post->body = $request->body;

        // $post->save();

        // $post = Post::create([
        //     'title' => $request->title,
        //     'preview' => $request->preview,
        //     'category_id' => $request->category_id,
        //     'body' => $request->body,
        // ]);

        // $post = Post::create($request->only('title', 'preview', 'category_id', 'body'));

        // $request->validate([
        //     'title' => 'required|min:3|max:125',
        //     'preview' => 'required|min:3|max:125',
        //     'body' => 'required|min:3',
        //     'category_id' => 'required|exists:categories,id',
        //     'tags' => 'required|array',
        // ]);

        $post = auth()->user()->posts()->create($request->validated());

        $post->tags()->sync($request->tags);

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

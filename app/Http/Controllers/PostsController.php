<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;

class PostsController extends Controller
{
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
}

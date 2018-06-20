<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        return Post::with('user', 'category', 'tags', 'comments.replies')->get();
    }
}

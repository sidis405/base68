<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->paginate(15);
        // $posts = $category->posts->load('user', 'category', 'tags');

        return view('posts.index', compact('posts'));
    }
}

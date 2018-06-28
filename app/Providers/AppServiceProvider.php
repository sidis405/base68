<?php

namespace App\Providers;

use App\Tag;
use App\Post;
use App\Category;
use App\Observers\PostObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);

        \View::composer('layouts.app', function ($view) {
            // \View::composer(['sidebar._categories', 'posts.create', 'posts.edit'], function ($view) {
            $categories = Category::all();
            $tags = Tag::all();

            return $view->with('categories', $categories)->with('tags', $tags);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

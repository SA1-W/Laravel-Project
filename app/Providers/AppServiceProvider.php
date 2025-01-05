<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Ad;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('layout.master', function ($view) {
            $categories = \App\Models\Category::all();
            $popularPosts = Post::orderBy('views', 'DESC')->take(3)->get();
            $tags = Tag::all();
            $view->with(compact('categories', 'popularPosts', 'tags'));
        });

        view()->composer('sections.popularPosts', function ($view) {
            $popularPosts = Post::orderBy('views', 'DESC')->take(10)->get();

            $tags = Tag::all();
            $ads = Ad::all();

            $rightRecentPosts = Post::latest()->limit(7)->get();
            $rightPopularPosts = Post::orderBy('views', 'DESC')->take(7)->get();
            $rightAds_posts = Post::where('ads', 1)->latest()->limit(6)->get();
            $view->with(compact('popularPosts', 'tags', 'ads', 'rightRecentPosts', 'rightPopularPosts', 'rightAds_posts'));
        });

        view()->composer('sections.recentPosts', function ($view) {
            $recentPosts = Post::latest()->limit(3)->get();
            $ads = Ad::all();
            $view->with(compact('recentPosts', 'ads'));
        });
    }
}

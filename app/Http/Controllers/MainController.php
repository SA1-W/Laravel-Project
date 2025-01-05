<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ad;
use App\Models\Tag;
use Mail;
use App\Mail\Message;
use App\Models\User;

class MainController extends Controller
{
    public function index()
    {

        $categories = Category::all();

        foreach ($categories as $category) {
            if ($category->id == 1) { // Первая категория
                $category->posts = Post::where('category_id', $category->id)->latest()->limit(4)->get();
            } elseif ($category->id == 2) { // Вторая категория
                $category->posts = Post::where('category_id', $category->id)->latest()->limit(2)->get();
            } elseif ($category->id == 3 || $category->id == 4) { // Третья и четвертая категории
                $category->posts = Post::where('category_id', $category->id)->latest()->limit(5)->get();
            } elseif ($category->id == 5) { // Пятая категория
                $category->posts = Post::where('category_id', $category->id)->latest()->limit(6)->get();
            } else {
                $category->posts = Post::where('category_id', $category->id)->latest()->limit(10)->get(); // По умолчанию
            }
        }

        $latestPosts = Post::latest()->limit(4)->get();
        $ads_posts = Post::where('ads', 1)->latest()->limit(6)->get();
        return view('index', compact('categories', 'latestPosts', 'ads_posts'));
    }

    public function categoryPosts($slug)
    {

        $category = Category::where('slug', $slug)->first();
        return view('categoryPosts', compact('category'));
    }

    public function postDetail($slug)
    {

        $post = Post::where('slug', $slug)->firstOrFail();

        $categoryId = $post->category->id;

        $relatedPosts = Post::where('category_id', $categoryId)
            ->where('id', '!=', $post->id) // исключаем текущий пост
            ->take(3) // ограничиваем количество похожих постов
            ->get();

        $post->increment('views');

        $category = $post->category;

        $users = User::all();

        return view('postDetail', compact('post', 'relatedPosts', 'category', 'users'));
    }

    public function tagPosts($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->get();
        return view('tagPosts', compact('tag', 'posts'));
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        // dd($request->all());

        $data = $request->all();

        Mail::to("yiyixe1675@modotso.com")->send(new Message($data));

        return redirect()->back()->with('send', 'Data sended successfully!');
    }

    public function search(Request $request)
    {
        // dd($request->q);

        $q = $request->q;

        $posts = Post::where(function ($query) use ($q) {
            $query->where('body_en', 'like', '%' . $q . '%')
                ->orWhere('body_uz', 'like', '%' . $q . '%')
                ->orWhere('body_ru', 'like', '%' . $q . '%');
        })->get();

        $noResults = $posts->isEmpty();

        return view('searchPosts', compact('posts', 'noResults'));
    }
}

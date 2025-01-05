<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.post.index', ['posts' => Post::paginate(4)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'title_en' => 'required',
            'title_ru' => 'required',
            'title_uz' => 'required',
            'body_en' => 'required',
            'body_ru' => 'required',
            'body_uz' => 'required',
            'category_id' => 'required'

        ]);

        // dd($request->all());

        $requestData = $request->all();

        $requestData['slug'] = Str::slug($request->title_en);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $image_name = rand() . "." . $file->getClientOriginalExtension();

            $file->move('temp/img', $image_name);

            $requestData['image'] = $image_name;
        }

        $post = Post::create($requestData);

        $post->tags()->attach($request->tags);

        return redirect()->route('admin.posts.index')->with('success', 'Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        return view('admin.post.detail', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {


        $requestData = $request->all();

        if (empty($request->ads)) {
            $requestData['ads'] = 0;
        }

        if ($request->hasFile('image')) {
            if ($post->image) {
                unlink(public_path('temp/img/' . $post->image));
            }

            $file = $request->file('image');

            $image_name = rand() . "." . $file->getClientOriginalExtension();

            $file->move('temp/img', $image_name);

            $requestData['image'] = $image_name;
        }

        $requestData['slug'] = Str::slug($request->title_en);

        $post->update($requestData);

        $post->tags()->sync($request->tags);

        return redirect()->route('admin.posts.index')->with('success', 'Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        if ($post->image) {
            unlink(public_path('temp/img/' . $post->image));
        }

        $post->delete();

        return redirect()->back()->with('success', 'Successfully');
    }
}

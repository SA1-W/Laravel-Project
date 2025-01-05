<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tag;
use App\Rules\noNumbers;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.tag.index', ['tags' => Tag::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tag_en' => ['required', new NoNumbers],
            'tag_ru' => ['required', new NoNumbers],
            'tag_uz' => ['required', new NoNumbers]
        ]);

        // dd($request->all());

        $request['slug'] = Str::slug($request['tag_en']);

        Tag::create($request->all());

        return redirect()->route('admin.tags.index')->with('success', 'Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {

        $request->validate([
            'tag_en' => ['required', new NoNumbers],
            'tag_ru' => ['required', new NoNumbers],
            'tag_uz' => ['required', new NoNumbers]
        ]);

        $request['slug'] = Str::slug($request['tag_en']);

        $tag->update($request->all());

        return redirect()->route('admin.tags.index')->with('success', 'Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->back()->with('success', 'Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Rules\noNumbers;

use  Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index', ['categories' => Category::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_en' => ['required', new NoNumbers],
            'category_ru' => ['required', new NoNumbers],
            'category_uz' => ['required', new NoNumbers]
        ]);

        // dd($request->all());

        $request['slug'] = Str::slug($request->category_en);

        Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Successfully');
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
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_en' => ['required', new NoNumbers],
            'category_ru' => ['required', new NoNumbers],
            'category_uz' => ['required', new NoNumbers]
        ]);

        $request['slug'] = Str::slug($request->category_en);

        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Successfully');
    }
}

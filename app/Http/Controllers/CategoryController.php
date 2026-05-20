<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $rows = Category::latest()->get();
        return view('category.index', compact('rows'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->only([
            'name',
            'description'
        ]);

        if ($request->hasFile('image')) {
            $filename = time().'_'.$request->file('image')->getClientOriginalName();
            $data['image'] = $request->file('image')->storeAs('categories', $filename, 'public');
        }

        Category::create($data);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('category.edit', ['row' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id,
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->only([
            'name',
            'description'
        ]);

        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }

            $filename = time().'_'.$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('categories', $filename, 'public');
            $data['image'] = $path;
        }

        $category->update($data);

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Article;
use Illuminate\Http\Request;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Article::all();
        return view('articles.index',compact('rows'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:articles,title|max:50',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|max:200',
        ]);

            $data = $request->only(['title','content','description','category_id']);

            Article::create($data);

            return redirect()->route('articles.index')->with('success','Article created successfully.');

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
    public function edit(string $id)
    {
        $row = Article::findOrFail($id);
        $categories = \App\Models\Category::all();
        return view('articles.edit', compact('row', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $row = Article::findOrFail($id);

    $request->validate([
        'title' => 'required|max:50',
        'category_id' => 'required|exists:categories,id',
        'description' => 'required|max:200',
    ]);

    $data = $request->only('title','content','description','category_id');

    $row->update($data);

    return redirect()->route('articles.index')->with('success','Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Article::findOrFail($id);
        if ($row->image && file_exists($row->image)){
               unlink($row->image);
        }
        $row->delete();
        return redirect()->route('articles.index')->with('success','Article deleted successfully.');
    }
}

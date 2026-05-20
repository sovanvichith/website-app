<?php

namespace App\Http\Controllers;

use App\Models\ArticleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleImageController extends Controller
{
    /**
     * Display a listing of the ArticleImages.
     */
    public function index()
    {
        $rows = ArticleImage::with('article')->latest()->get();
        return view('articles_images.index', compact('rows'));
    }

    /**
     * Show the form for creating a new ArticleImage.
     */
    public function create()
    {
        $articles = \App\Models\Article::all();
        return view('articles_images.create', compact('articles'));
    }

    /**
     * Store a newly created ArticleImage in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'image_path' => 'nullable|image|max:2048',
            'description' => 'nullable',
        ]);

        $data = $request->only(['article_id', 'description']);

        if ($request->hasFile('image_path')) {
            $filename = time().'_'.$request->file('image_path')->getClientOriginalName();
            $data['image_path'] = $request->file('image_path')->storeAs('article_images', $filename, 'public');
        }

        ArticleImage::create($data);

        return redirect()->route('article_images.index')
            ->with('success', 'Article Image created successfully.');
    }

    /**
     * Show the form for editing the specified ArticleImage.
     */
    public function edit(ArticleImage $article_image)
    {
        $articles = \App\Models\Article::all();
        return view('articles_images.edit', ['row' => $article_image, 'articles' => $articles]);
    }

    /**
     * Update the specified ArticleImage in storage.
     */
    public function update(Request $request, ArticleImage $article_image)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'image_path' => 'nullable|image|max:2048',
            'description' => 'nullable',
        ]);

        $data = $request->only(['article_id', 'description']);

        if ($request->hasFile('image_path')) {
            if ($article_image->image_path) {
                Storage::disk('public')->delete($article_image->image_path);
            }

            $filename = time().'_'.$request->file('image_path')->getClientOriginalName();
            $data['image_path'] = $request->file('image_path')->storeAs('article_images', $filename, 'public');
        }

        $article_image->update($data);

        return redirect()->route('article_images.index')
            ->with('success', 'Article Image updated successfully.');
    }

    /**
     * Remove the specified ArticleImage from storage.
     */
    public function destroy(ArticleImage $article_image)
    {
        if ($article_image->image_path) {
            Storage::disk('public')->delete($article_image->image_path);
        }

        $article_image->delete();

        return redirect()->route('article_images.index')
            ->with('success', 'Article Image deleted successfully.');
    }
}

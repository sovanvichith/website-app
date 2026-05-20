<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleImage extends Model
{
    use SoftDeletes;
    // Allow mass assignment
    protected $fillable = [
        'article_id',
        'image_path',
        'description'
    ];

    protected $appends = ['image_url'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function getImageUrlAttribute()
    {
        if (! $this->image_path) {
            return null;
        }

        if (preg_match('/^https?:\/\//', $this->image_path)) {
            return $this->image_path;
        }

        if (Storage::disk('public')->exists($this->image_path)) {
            return Storage::disk('public')->url($this->image_path);
        }

        if (file_exists(public_path($this->image_path))) {
            return asset($this->image_path);
        }

        if (file_exists(public_path('storage/'.$this->image_path))) {
            return asset('storage/'.$this->image_path);
        }

        return asset($this->image_path);
    }
}

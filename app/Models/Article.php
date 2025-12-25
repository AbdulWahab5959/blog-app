<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'category',
        'read_time',
        'is_published',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = \Illuminate\Support\Str::slug($article->title);
            }
        });

        static::updating(function ($article) {
            if ($article->isDirty('title')) {
                $article->slug = \Illuminate\Support\Str::slug($article->title);
            }
        });
    }
}
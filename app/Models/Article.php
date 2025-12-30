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
    public function relatedArticles($limit = 3)
    {
        return self::where('category', $this->category)
            ->where('id', '!=', $this->id)
            ->where('is_published', true)
            ->limit($limit)
            ->get();
    }

    /**
     * Get related articles with fallback
     * If no articles in same category, get recent articles
     */
    public function getRelatedArticles($limit = 3)
    {
        $related = $this->relatedArticles($limit);
        
        // If not enough related articles in same category, get recent articles
        if ($related->count() < $limit) {
            $additional = self::where('id', '!=', $this->id)
                ->where('is_published', true)
                ->whereNotIn('id', $related->pluck('id')->toArray())
                ->latest()
                ->limit($limit - $related->count())
                ->get();
            
            $related = $related->merge($additional);
        }
        
        return $related;
    }
}
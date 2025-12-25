<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')
            ->where('is_published', true)
            ->latest()
            ->paginate(6);
        return view('blog', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable', // Changed: accept both
        'category' => 'nullable|string|max:100',
        'read_time' => 'nullable|integer|min:1',
    ]);

    $article = new Article();
    $article->title = $request->title;
    $article->slug = Str::slug($request->title);
    $article->content = $request->content;
    $article->category = $request->category ?? 'General';
    $article->read_time = $request->read_time ?? 5;
    $article->is_published = $request->has('is_published');
    $article->user_id = auth()->id();

    // Handle image - can be file upload OR URL
    if ($request->hasFile('image')) {
        // User uploaded a file
        $article->image = $request->file('image')->store('articles', 'public');
    } elseif ($request->filled('image') && filter_var($request->image, FILTER_VALIDATE_URL)) {
        // User provided a URL
        $article->image = $request->image;
    } else {
        // No image provided, use a default from your URLs
        $defaultImages = [
            'https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
        ];
        $article->image = $defaultImages[array_rand($defaultImages)];
    }

    $article->save();

    return redirect()->route('articles.my')->with('success', 'Article created successfully!');
}

    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->where('is_published', true)
            ->with('user')
            ->firstOrFail();

        return view('articles.show', compact('article'));
    }

    public function myArticles(Request $request)
    {
        $query = Article::where('user_id', auth()->id())
            ->with('user');

        // Filter by status
        if ($request->has('status')) {
            if ($request->status == 'published') {
                $query->where('is_published', true);
            } elseif ($request->status == 'draft') {
                $query->where('is_published', false);
            }
        }

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            });
        }

        $articles = $query->latest()->paginate(10);

        // Get stats (FIXED: Remove views calculation for now)
        $publishedCount = Article::where('user_id', auth()->id())
            ->where('is_published', true)
            ->count();

        $draftCount = Article::where('user_id', auth()->id())
            ->where('is_published', false)
            ->count();

        // Temporary fix - set totalViews to 0 until we add views column
        $totalViews = 0;

        return view('articles.my-articles', compact(
            'articles',
            'publishedCount',
            'draftCount',
            'totalViews'
        ));
    }

    public function toggleStatus(Article $article)
    {
        // Check if user owns the article
        if ($article->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $article->is_published = !$article->is_published;
        $article->save();

        $status = $article->is_published ? 'published' : 'unpublished';
        return back()->with('success', "Article {$status} successfully!");
    }

    public function edit(Article $article)
    {
        // Check if user owns the article
        if ($article->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        // Check if user owns the article
        if ($article->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'category' => 'nullable|string|max:100',
            'read_time' => 'nullable|integer|min:1',
        ]);

        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->content = $request->content;
        $article->category = $request->category ?? 'General';
        $article->read_time = $request->read_time ?? 5;
        $article->is_published = $request->has('is_published');

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $article->image = $request->file('image')->store('articles', 'public');
        }

        $article->save();

        return redirect()->route('articles.my', $article->slug)->with('success', 'Article updated successfully!');
    }

    public function destroy(Article $article)
    {
        // Check if user owns the article
        if ($article->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();
        return redirect()->route('articles.my')->with('success', 'Article deleted successfully!');
    }
}
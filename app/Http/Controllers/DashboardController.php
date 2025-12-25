<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Get authenticated user
        $user = Auth::user();
        
        // Get user's stats
        $publishedCount = Article::where('user_id', $user->id)
            ->where('is_published', true)
            ->count();
        
        $draftCount = Article::where('user_id', $user->id)
            ->where('is_published', false)
            ->count();
        
        // Get user's recent articles
        $myArticles = Article::where('user_id', $user->id)
            ->latest()
            ->take(6)
            ->get();
        
        // Get all published articles for blog section (with pagination)
        $articles = Article::where('is_published', true)
            ->with('user')
            ->latest()
            ->paginate(6);
        
        // Calculate total views (if you have views column later)
        $totalViews = 0;
        
        return view('dashboard', compact(
            'publishedCount',
            'draftCount',
            'myArticles',
            'articles',
            'totalViews'
        ));
    }
}
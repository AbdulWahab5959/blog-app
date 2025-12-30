<x-layouts.app
    title="Blog Posts | Premium Blog Platform"
    description="Explore premium blog posts from our community of writers. Discover insights, tutorials, and inspiration.">
    
    <!-- Premium Blog Header -->
    <div class="premium-blog-header">
        <div class="container-fluid">
            <div class="premium-header-content">
                <h1 class="premium-title">Premium Blog Hub</h1>
                <p class="premium-subtitle">
                    Discover amazing content from our community of writers. {{ $articles->total() }} articles and counting!
                </p>
            </div>
        </div>
    </div>
    
    <div class="container-fluid py-5">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-9">
                <!-- Filters -->
                <div class="premium-section mb-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div class="filter-tabs">
                            <button class="filter-tab active">All Posts</button>
                            <button class="filter-tab">Trending</button>
                            <button class="filter-tab">Latest</button>
                            <button class="filter-tab">Popular</button>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <select class="category-select">
                                <option value="">All Categories</option>
                                <option value="technology">Technology</option>
                                <option value="design">Design</option>
                                <option value="business">Business</option>
                                <option value="lifestyle">Lifestyle</option>
                            </select>
                            <button class="btn-sort">
                                <i class="fas fa-sort-amount-down"></i> Sort
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Blog Grid -->
                <div class="row g-4">
                    @foreach($articles as $article)
                        <div class="col-md-6 col-lg-4">
                            <div class="blog-card premium-card">
                                <div class="blog-card-image">
                                    @if($article->image)
                                        @if(filter_var($article->image, FILTER_VALIDATE_URL))
                                            <img src="{{ $article->image }}" 
                                                 alt="{{ $article->title }}">
                                        @else
                                            <img src="{{ asset('storage/' . $article->image) }}" 
                                                 alt="{{ $article->title }}">
                                        @endif
                                    @else
                                        <div class="no-image-placeholder">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                    <span class="blog-category">{{ $article->category }}</span>
                                    <button class="blog-bookmark">
                                        <i class="far fa-bookmark"></i>
                                    </button>
                                </div>
                                <div class="blog-card-content">
                                    <div class="blog-meta">
                                        <span class="blog-author">
                                            <i class="fas fa-user-circle"></i> {{ $article->user->name }}
                                        </span>
                                        <span class="blog-date">
                                            <i class="far fa-calendar"></i> {{ $article->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <h3 class="blog-title">
                                        <a href="{{ route('articles.show', $article->slug) }}">
                                            {{ Str::limit($article->title, 60) }}
                                        </a>
                                    </h3>
                                    <p class="blog-excerpt">
                                        {{ Str::limit(strip_tags($article->content), 120) }}
                                    </p>
                                    <div class="blog-stats">
                                        <span class="blog-stat">
                                            <i class="fas fa-eye"></i> 0
                                        </span>
                                        <span class="blog-stat">
                                            <i class="far fa-comment"></i> 0
                                        </span>
                                        <span class="blog-stat">
                                            <i class="far fa-heart"></i> 0
                                        </span>
                                        <span class="read-time">{{ $article->read_time }} min read</span>
                                    </div>
                                    <a href="{{ route('articles.show', $article->slug) }}" class="blog-read-more">
                                        Read Article <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="premium-section mt-4">
                    <div class="d-flex flex-wrap justify-content-center align-items-center">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-3">
                <!-- Popular Authors -->
                <div class="premium-section mb-4">
                    <h3 class="sidebar-title">
                        <i class="fas fa-crown"></i> Top Authors
                    </h3>
                    <div class="popular-authors">
                        @php
                            $topAuthors = App\Models\User::withCount(['articles' => function($query) {
                                $query->where('is_published', true);
                            }])
                            ->orderBy('articles_count', 'desc')
                            ->limit(3)
                            ->get();
                        @endphp
                        
                        @foreach($topAuthors as $author)
                            <div class="author-item">
                                <div class="author-avatar">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <div class="author-info">
                                    <div class="author-name">{{ $author->name }}</div>
                                    <div class="author-stats">{{ $author->articles_count }} articles</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Trending Categories -->
                <div class="premium-section mb-4">
                    <h3 class="sidebar-title">
                        <i class="fas fa-fire"></i> Popular Categories
                    </h3>
                    <div class="trending-tags">
                        @php
                            $categories = App\Models\Article::where('is_published', true)
                                ->select('category')
                                ->selectRaw('COUNT(*) as count')
                                ->groupBy('category')
                                ->orderBy('count', 'desc')
                                ->limit(8)
                                ->get();
                        @endphp
                        
                        @foreach($categories as $category)
                            <a href="#" class="trending-tag">#{{ $category->category }}</a>
                        @endforeach
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="premium-section newsletter-card">
                    <div class="newsletter-icon">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <h4>Stay Updated</h4>
                    <p>Get the latest articles directly in your inbox</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Your email address" class="newsletter-input">
                        <button type="submit" class="newsletter-btn">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
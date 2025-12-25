<x-layouts.app 
    title="Dashboard | Premium Blog Platform"
    description="Create, share, and inspire with LaravelBlog - the premium platform for writers and content creators."
>
    <div class="dashboard-container">
        <!-- Dashboard Header -->
        <header class="dashboard-header">
            <div class="dashboard-welcome">
                <h1>Welcome back, {{ Auth::user()->name }}! 👋</h1>
                <p>Here's what's happening with your blog today</p>
                <div class="hero-actions">
                    <a href="{{ route('articles.create') }}" class="btn-primary btn-large">
                        <i class="fas fa-plus"></i> New Post
                    </a>
                    <a href="{{ route('articles.my') }}" class="btn-secondary btn-large">
                        <i class="fas fa-file-alt"></i> My Articles
                    </a>
                </div>
            </div>
        </header>

        <!-- Stats Cards -->
        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="stat-number">{{ number_format($totalViews) }}</div>
                <div class="stat-label">Total Views</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-number">{{ $publishedCount }}</div>
                <div class="stat-label">Published Posts</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="stat-number">{{ $draftCount }}</div>
                <div class="stat-label">Drafts</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="stat-number">0</div>
                <div class="stat-label">Total Likes</div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="dashboard-content">
            <div class="dashboard-grid">
                <!-- My Articles Section -->
                <div class="dashboard-main">
                    <!-- My Recent Articles -->
                    <div class="content-section">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2>My Recent Articles</h2>
                            <a href="{{ route('articles.my') }}" class="btn btn-outline-primary btn-sm">
                                View All <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                        
                        @if($myArticles->count() > 0)
                            <div class="row g-3">
                                @foreach($myArticles as $article)
                                    <div class="col-md-6">
                                        <div class="my-article-card">
                                            <div class="my-article-header">
                                                <h5 class="my-article-title">
                                                    <a href="{{ route('articles.show', $article->slug) }}">
                                                        {{ Str::limit($article->title, 50) }}
                                                    </a>
                                                </h5>
                                                <span class="badge {{ $article->is_published ? 'bg-success' : 'bg-warning' }}">
                                                    {{ $article->is_published ? 'Published' : 'Draft' }}
                                                </span>
                                            </div>
                                            <div class="my-article-meta">
                                                <span class="text-muted">
                                                    <i class="far fa-calendar"></i> 
                                                    {{ $article->created_at->format('M d, Y') }}
                                                </span>
                                                <span class="text-muted ms-3">
                                                    <i class="far fa-clock"></i> 
                                                    {{ $article->read_time }} min read
                                                </span>
                                            </div>
                                            <p class="my-article-excerpt">
                                                {{ Str::limit(strip_tags($article->content), 100) }}
                                            </p>
                                            <div class="my-article-actions">
                                                <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-outline-secondary">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-sm btn-outline-primary ms-2">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                                <h5>No articles yet</h5>
                                <p class="text-muted">Start writing your first article!</p>
                                <a href="{{ route('articles.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Create Your First Article
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- All Blog Posts Section (Same as blog page) -->
                </div>
                
                <!-- Sidebar -->
                <div class="dashboard-sidebar">
                    <!-- Profile Card -->
                    <div class="profile-card">
                        <div class="profile-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="profile-name">{{ Auth::user()->name }}</div>
                        <div class="profile-email">{{ Auth::user()->email }}</div>
                        <a href="{{ route('profile.edit') }}" class="btn-secondary" style="width: 100%;">
                            <i class="fas fa-user-edit"></i> Edit Profile
                        </a>
                        <div class="profile-stats">
                            <div class="profile-stat">
                                <div class="profile-stat-number">{{ $publishedCount + $draftCount }}</div>
                                <div class="profile-stat-label">Total Posts</div>
                            </div>
                            <div class="profile-stat">
                                <div class="profile-stat-number">0</div>
                                <div class="profile-stat-label">Followers</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-section mt-4">
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <h2>Latest Blog Posts</h2>
                    <a href="{{ route('blog') }}" class="btn btn-outline-primary">
                        View Full Blog <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
                
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
                                                 alt="{{ $article->title }}"
                                                 class="img-fluid">
                                        @else
                                            <img src="{{ asset('storage/' . $article->image) }}" 
                                                 alt="{{ $article->title }}"
                                                 class="img-fluid">
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
                <div class="premium-section-pagination mt-4">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
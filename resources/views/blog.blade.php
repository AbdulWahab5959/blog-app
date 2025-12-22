<x-layouts.app 
    title="Blog Posts | Premium Blog Platform"
    description="Explore premium blog posts from our community of writers. Discover insights, tutorials, and inspiration."
>
    <!-- Premium Blog Header -->
    <div class="premium-blog-header">
        <div class="container-fluid">
            <div class="premium-header-content">
                <h1 class="premium-title">Premium Blog Hub</h1>
                <p class="premium-subtitle">
                    Discover amazing content from our community of writers. {{ $totalPosts ?? 'Thousands' }} articles and counting!
                </p>
                <div class="hero-search">
                    <form action="{{ route('blog.search') }}" method="GET" class="search-form">
                        <div class="search-input-group">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" 
                                   name="q" 
                                   placeholder="Search articles, topics, or authors..." 
                                   class="search-input"
                                   value="{{ request('q') }}">
                            <button type="submit" class="search-btn">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
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
                    <!-- Blog Post 1 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card premium-card">
                            <div class="blog-card-image">
                                <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                                     alt="Laravel Best Practices">
                                <span class="blog-category">Technology</span>
                                <button class="blog-bookmark">
                                    <i class="far fa-bookmark"></i>
                                </button>
                            </div>
                            <div class="blog-card-content">
                                <div class="blog-meta">
                                    <span class="blog-author">
                                        <i class="fas fa-user-circle"></i> Sarah Johnson
                                    </span>
                                    <span class="blog-date">
                                        <i class="far fa-calendar"></i> 2 days ago
                                    </span>
                                </div>
                                <h3 class="blog-title">Advanced Laravel Patterns You Should Know</h3>
                                <p class="blog-excerpt">
                                    Discover powerful Laravel design patterns and architecture tips to build scalable applications.
                                </p>
                                <div class="blog-stats">
                                    <span class="blog-stat">
                                        <i class="fas fa-eye"></i> 2.4K
                                    </span>
                                    <span class="blog-stat">
                                        <i class="far fa-comment"></i> 42
                                    </span>
                                    <span class="blog-stat">
                                        <i class="far fa-heart"></i> 156
                                    </span>
                                    <span class="read-time">8 min read</span>
                                </div>
                                <a href="#" class="blog-read-more">
                                    Read Article <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Post 2 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card premium-card">
                            <div class="blog-card-image">
                                <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                                     alt="React Performance">
                                <span class="blog-category">Web Development</span>
                                <button class="blog-bookmark">
                                    <i class="far fa-bookmark"></i>
                                </button>
                            </div>
                            <div class="blog-card-content">
                                <div class="blog-meta">
                                    <span class="blog-author">
                                        <i class="fas fa-user-circle"></i> Michael Chen
                                    </span>
                                    <span class="blog-date">
                                        <i class="far fa-calendar"></i> 1 week ago
                                    </span>
                                </div>
                                <h3 class="blog-title">Optimizing React Performance in 2024</h3>
                                <p class="blog-excerpt">
                                    Learn the latest techniques to make your React applications faster and more efficient.
                                </p>
                                <div class="blog-stats">
                                    <span class="blog-stat">
                                        <i class="fas fa-eye"></i> 3.1K
                                    </span>
                                    <span class="blog-stat">
                                        <i class="far fa-comment"></i> 67
                                    </span>
                                    <span class="blog-stat">
                                        <i class="far fa-heart"></i> 289
                                    </span>
                                    <span class="read-time">12 min read</span>
                                </div>
                                <a href="#" class="blog-read-more">
                                    Read Article <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Post 3 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card premium-card">
                            <div class="blog-card-image">
                                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                                     alt="Data Visualization">
                                <span class="blog-category">Data Science</span>
                                <button class="blog-bookmark">
                                    <i class="far fa-bookmark"></i>
                                </button>
                            </div>
                            <div class="blog-card-content">
                                <div class="blog-meta">
                                    <span class="blog-author">
                                        <i class="fas fa-user-circle"></i> Emma Davis
                                    </span>
                                    <span class="blog-date">
                                        <i class="far fa-calendar"></i> 3 days ago
                                    </span>
                                </div>
                                <h3 class="blog-title">Mastering Data Visualization with D3.js</h3>
                                <p class="blog-excerpt">
                                    Create stunning, interactive data visualizations that tell compelling stories.
                                </p>
                                <div class="blog-stats">
                                    <span class="blog-stat">
                                        <i class="fas fa-eye"></i> 1.8K
                                    </span>
                                    <span class="blog-stat">
                                        <i class="far fa-comment"></i> 31
                                    </span>
                                    <span class="blog-stat">
                                        <i class="far fa-heart"></i> 124
                                    </span>
                                    <span class="read-time">15 min read</span>
                                </div>
                                <a href="#" class="blog-read-more">
                                    Read Article <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Post 4 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card premium-card">
                            <div class="blog-card-image">
                                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                                     alt="UI/UX Design">
                                <span class="blog-category">Design</span>
                                <button class="blog-bookmark">
                                    <i class="far fa-bookmark"></i>
                                </button>
                            </div>
                            <div class="blog-card-content">
                                <div class="blog-meta">
                                    <span class="blog-author">
                                        <i class="fas fa-user-circle"></i> Alex Rodriguez
                                    </span>
                                    <span class="blog-date">
                                        <i class="far fa-calendar"></i> 5 days ago
                                    </span>
                                </div>
                                <h3 class="blog-title">Modern UI/UX Trends for 2024</h3>
                                <p class="blog-excerpt">
                                    Stay ahead with the latest design trends that are shaping user experiences this year.
                                </p>
                                <div class="blog-stats">
                                    <span class="blog-stat">
                                        <i class="fas fa-eye"></i> 4.2K
                                    </span>
                                    <span class="blog-stat">
                                        <i class="far fa-comment"></i> 89
                                    </span>
                                    <span class="blog-stat">
                                        <i class="far fa-heart"></i> 345
                                    </span>
                                    <span class="read-time">10 min read</span>
                                </div>
                                <a href="#" class="blog-read-more">
                                    Read Article <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Post 5 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card premium-card">
                            <div class="blog-card-image">
                                <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                                     alt="Startup Growth">
                                <span class="blog-category">Business</span>
                                <button class="blog-bookmark">
                                    <i class="far fa-bookmark"></i>
                                </button>
                            </div>
                            <div class="blog-card-content">
                                <div class="blog-meta">
                                    <span class="blog-author">
                                        <i class="fas fa-user-circle"></i> James Wilson
                                    </span>
                                    <span class="blog-date">
                                        <i class="far fa-calendar"></i> 2 weeks ago
                                    </span>
                                </div>
                                <h3 class="blog-title">Scaling Your Startup: Lessons Learned</h3>
                                <p class="blog-excerpt">
                                    Real-world advice from founders who successfully scaled their startups to millions.
                                </p>
                                <div class="blog-stats">
                                    <span class="blog-stat">
                                        <i class="fas fa-eye"></i> 5.7K
                                    </span>
                                    <span class="blog-stat">
                                        <i class="far fa-comment"></i> 124
                                    </span>
                                    <span class="blog-stat">
                                        <i class="far fa-heart"></i> 478
                                    </span>
                                    <span class="read-time">18 min read</span>
                                </div>
                                <a href="#" class="blog-read-more">
                                    Read Article <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Post 6 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card premium-card">
                            <div class="blog-card-image">
                                <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                                     alt="Remote Work">
                                <span class="blog-category">Lifestyle</span>
                                <button class="blog-bookmark">
                                    <i class="far fa-bookmark"></i>
                                </button>
                            </div>
                            <div class="blog-card-content">
                                <div class="blog-meta">
                                    <span class="blog-author">
                                        <i class="fas fa-user-circle"></i> Sophia Miller
                                    </span>
                                    <span class="blog-date">
                                        <i class="far fa-calendar"></i> 1 month ago
                                    </span>
                                </div>
                                <h3 class="blog-title">The Ultimate Guide to Remote Work Productivity</h3>
                                <p class="blog-excerpt">
                                    Boost your productivity while working remotely with these proven strategies and tools.
                                </p>
                                <div class="blog-stats">
                                    <span class="blog-stat">
                                        <i class="fas fa-eye"></i> 6.3K
                                    </span>
                                    <span class="blog-stat">
                                        <i class="far fa-comment"></i> 156
                                    </span>
                                    <span class="blog-stat">
                                        <i class="far fa-heart"></i> 512
                                    </span>
                                    <span class="read-time">14 min read</span>
                                </div>
                                <a href="#" class="blog-read-more">
                                    Read Article <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="premium-section mt-4">
                    <nav class="blog-pagination">
                        <ul class="pagination-list">
                            <li class="page-item disabled">
                                <a href="#" class="page-link">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">3</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">4</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">5</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
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
                        <div class="author-item">
                            <div class="author-avatar">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <div class="author-info">
                                <div class="author-name">Sarah Johnson</div>
                                <div class="author-stats">24 articles • 12K followers</div>
                            </div>
                        </div>
                        <div class="author-item">
                            <div class="author-avatar">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <div class="author-info">
                                <div class="author-name">Michael Chen</div>
                                <div class="author-stats">18 articles • 8.5K followers</div>
                            </div>
                        </div>
                        <div class="author-item">
                            <div class="author-avatar">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <div class="author-info">
                                <div class="author-name">Emma Davis</div>
                                <div class="author-stats">15 articles • 7.2K followers</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trending Categories -->
                <div class="premium-section mb-4">
                    <h3 class="sidebar-title">
                        <i class="fas fa-fire"></i> Trending Topics
                    </h3>
                    <div class="trending-tags">
                        <a href="#" class="trending-tag">#Laravel</a>
                        <a href="#" class="trending-tag">#React</a>
                        <a href="#" class="trending-tag">#JavaScript</a>
                        <a href="#" class="trending-tag">#WebDev</a>
                        <a href="#" class="trending-tag">#Startup</a>
                        <a href="#" class="trending-tag">#Design</a>
                        <a href="#" class="trending-tag">#AI</a>
                        <a href="#" class="trending-tag">#Productivity</a>
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
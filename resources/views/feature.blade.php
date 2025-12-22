<x-layouts.app 
    title="Blogs | LaravelBlog"
    description="Read the latest articles from LaravelBlog authors"
>
    <div class="dashboard-container">

        <!-- Page Header -->
        <header class="dashboard-header">
            <div class="dashboard-welcome">
                <h1>Latest Blog Posts ✍️</h1>
                <p>Discover articles from our community of writers</p>
            </div>
        </header>

        <!-- Blog List -->
        <div class="dashboard-content">
            <div class="dashboard-grid">
                
                <!-- Blog Feed -->
                <div class="dashboard-main">
                    
                    <div class="content-section">
                        <h2>All Posts</h2>

                        <div class="recent-posts">

                            <!-- Blog Item -->
                            <div class="post-item">
                                <div class="post-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>

                                <div class="post-content">
                                    <div class="post-title">
                                        Getting Started with Laravel
                                    </div>

                                    <div class="post-meta">
                                        By John Doe • 2 days ago • 1.2K views
                                    </div>

                                    <p style="color:#6B7280; margin-top:6px;">
                                        Learn the fundamentals of Laravel and how to build modern web applications...
                                    </p>
                                </div>

                                <a href="#" style="color:#6366F1; font-weight:600;">
                                    Read →
                                </a>
                            </div>

                            <!-- Blog Item -->
                            <div class="post-item">
                                <div class="post-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>

                                <div class="post-content">
                                    <div class="post-title">
                                        Advanced PHP Tips for Clean Code
                                    </div>

                                    <div class="post-meta">
                                        By Sarah Khan • 1 week ago • 860 views
                                    </div>

                                    <p style="color:#6B7280; margin-top:6px;">
                                        Improve your PHP code quality using best practices and real-world techniques...
                                    </p>
                                </div>

                                <a href="#" style="color:#6366F1; font-weight:600;">
                                    Read →
                                </a>
                            </div>

                            <!-- Blog Item -->
                            <div class="post-item">
                                <div class="post-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>

                                <div class="post-content">
                                    <div class="post-title">
                                        Building Scalable Web Apps
                                    </div>

                                    <div class="post-meta">
                                        By Ahmed Ali • 2 weeks ago • 2.3K views
                                    </div>

                                    <p style="color:#6B7280; margin-top:6px;">
                                        A complete guide to building scalable and maintainable web applications...
                                    </p>
                                </div>

                                <a href="#" style="color:#6366F1; font-weight:600;">
                                    Read →
                                </a>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="dashboard-sidebar">

                    <!-- Call to Action -->
                    <div class="content-section">
                        <h2>Want to Write?</h2>
                        <p style="color:#6B7280; margin-bottom:1rem;">
                            Share your knowledge with the community.
                        </p>

                        @auth
                            <a href="#" class="btn-primary" style="width:100%;">
                                <i class="fas fa-plus"></i> Write a Post
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn-primary" style="width:100%;">
                                <i class="fas fa-sign-in-alt"></i> Login to Write
                            </a>
                        @endauth
                    </div>

                    <!-- Popular Tags (Dummy) -->
                    <div class="content-section">
                        <h2>Popular Topics</h2>

                        <div style="display:flex; flex-wrap:wrap; gap:8px;">
                            <span class="badge">Laravel</span>
                            <span class="badge">PHP</span>
                            <span class="badge">Web Dev</span>
                            <span class="badge">Backend</span>
                            <span class="badge">APIs</span>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</x-layouts.app>

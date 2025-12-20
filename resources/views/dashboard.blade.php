<x-layouts.app 
    title="Dashboard | Premium Blog Platform"
    description="Create, share, and inspire with LaravelBlog - the premium platform for writers and content creators."
>
    <div class="dashboard-container">
        <!-- Premium Header -->

        <!-- Dashboard Header -->
        <header class="dashboard-header">
            <div class="dashboard-welcome">
                <h1>Welcome back, {{ Auth::user()->name }}! 👋</h1>
                <p>Here's what's happening with your blog today</p>
                <div class="hero-actions">
                    <a href="#" class="btn-primary btn-large">
                        <i class="fas fa-plus"></i> New Post
                    </a>
                    <a href="#" class="btn-secondary btn-large">
                        <i class="fas fa-chart-line"></i> Analytics
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
                <div class="stat-number">12.5K</div>
                <div class="stat-label">Total Views</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-number">24</div>
                <div class="stat-label">Published Posts</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number">1.2K</div>
                <div class="stat-label">Followers</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="stat-number">856</div>
                <div class="stat-label">Likes This Month</div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="dashboard-content">
            <div class="dashboard-grid">
                <!-- Main Content Area -->
                <div class="dashboard-main">
                    <!-- Quick Actions -->
                    <div class="content-section">
                        <h2>Quick Actions</h2>
                        <div class="quick-actions">
                            <div class="action-card">
                                <div class="action-icon">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <h3>Write New Post</h3>
                                <p>Create a new blog post</p>
                            </div>
                            <div class="action-card">
                                <div class="action-icon">
                                    <i class="fas fa-palette"></i>
                                </div>
                                <h3>Customize Theme</h3>
                                <p>Update your blog appearance</p>
                            </div>
                            <div class="action-card">
                                <div class="action-icon">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                                <h3>View Analytics</h3>
                                <p>Check your performance</p>
                            </div>
                            <div class="action-card">
                                <div class="action-icon">
                                    <i class="fas fa-cog"></i>
                                </div>
                                <h3>Settings</h3>
                                <p>Manage your preferences</p>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Posts -->
                    <div class="content-section">
                        <h2>Recent Posts</h2>
                        <div class="recent-posts">
                            <div class="post-item">
                                <div class="post-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="post-content">
                                    <div class="post-title">Getting Started with Laravel</div>
                                    <div class="post-meta">Published 2 days ago • 1.2K views</div>
                                </div>
                                <i class="fas fa-ellipsis-v" style="color: #6B7280;"></i>
                            </div>
                            <div class="post-item">
                                <div class="post-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="post-content">
                                    <div class="post-title">Advanced PHP Techniques</div>
                                    <div class="post-meta">Published 1 week ago • 856 views</div>
                                </div>
                                <i class="fas fa-ellipsis-v" style="color: #6B7280;"></i>
                            </div>
                            <div class="post-item">
                                <div class="post-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="post-content">
                                    <div class="post-title">Building Modern Web Apps</div>
                                    <div class="post-meta">Published 2 weeks ago • 2.3K views</div>
                                </div>
                                <i class="fas fa-ellipsis-v" style="color: #6B7280;"></i>
                            </div>
                        </div>
                    </div>
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
                                <div class="profile-stat-number">24</div>
                                <div class="profile-stat-label">Posts</div>
                            </div>
                            <div class="profile-stat">
                                <div class="profile-stat-number">1.2K</div>
                                <div class="profile-stat-label">Followers</div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="content-section">
                        <h2>This Week</h2>
                        <div style="display: flex; flex-direction: column; gap: 1rem;">
                            <div style="display: flex; justify-content: between; align-items: center;">
                                <span style="color: #6B7280;">Views</span>
                                <span style="font-weight: 600; color: #6366F1;">+12%</span>
                            </div>
                            <div style="display: flex; justify-content: between; align-items: center;">
                                <span style="color: #6B7280;">New Followers</span>
                                <span style="font-weight: 600; color: #10B981;">+8</span>
                            </div>
                            <div style="display: flex; justify-content: between; align-items: center;">
                                <span style="color: #6B7280;">Comments</span>
                                <span style="font-weight: 600; color: #6366F1;">+15</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

    </div>
</x-layouts.app>
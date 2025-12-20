<x-layouts.app 
    title="LaravelBlog | Premium Blog Platform"
    description="Create, share, and inspire with LaravelBlog - the premium platform for writers and content creators."
>

    <div class="welcome-container">
        <!-- Rest of your page remains the same -->
        <section class="hero-section">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Create, Share, and <span>Inspire</span></h1>
                    <p class="hero-description">LaravelBlog is the premium platform for writers and content creators. Share your stories with a global audience and build your digital presence.</p>
                    <div class="hero-actions">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn-primary btn-large">Go to Dashboard <i class="fas fa-arrow-right"></i></a>
                        @else
                            <a href="{{ route('register') }}" class="btn-primary btn-large">Start Writing <i class="fas fa-arrow-right"></i></a>
                            <a href="{{ route('login') }}" class="btn-secondary btn-large"><i class="fas fa-user"></i> Sign In</a>
                        @endauth
                    </div>
                    <div class="hero-stats">
                        <div class="stat">
                            <div class="stat-number">10K+</div>
                            <div class="stat-label">Active Writers</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number">25K+</div>
                            <div class="stat-label">Published Articles</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number">95%</div>
                            <div class="stat-label">Satisfaction Rate</div>
                        </div>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="floating-card card-1">
                        <div class="card-header">
                            <div class="author">
                                <div class="avatar"></div>
                                <div class="author-info">
                                    <div class="name">Sarah Johnson</div>
                                    <div class="title">Content Strategist</div>
                                </div>
                            </div>
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <h3>How to Build an Audience with Authentic Content</h3>
                        <div class="tags">
                            <span>Content Marketing</span>
                            <span>Growth</span>
                        </div>
                    </div>
                    <div class="floating-card card-2">
                        <div class="card-header">
                            <div class="author">
                                <div class="avatar"></div>
                                <div class="author-info">
                                    <div class="name">Michael Chen</div>
                                    <div class="title">Tech Writer</div>
                                </div>
                            </div>
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <h3>Laravel Best Practices for Modern Web Applications</h3>
                        <div class="tags">
                            <span>Laravel</span>
                            <span>Web Dev</span>
                        </div>
                    </div>
                    <div class="floating-card card-3">
                        <div class="card-header">
                            <div class="author">
                                <div class="avatar"></div>
                                <div class="author-info">
                                    <div class="name">Emma Wilson</div>
                                    <div class="title">Travel Blogger</div>
                                </div>
                            </div>
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <h3>10 Hidden Gems in Southeast Asia You Need to Visit</h3>
                        <div class="tags">
                            <span>Travel</span>
                            <span>Adventure</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section">
            <div class="section-header">
                <h2>Why Choose LaravelBlog</h2>
                <p>Premium features for professional content creators</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-pen-fancy"></i>
                    </div>
                    <h3>Elegant Editor</h3>
                    <p>Our distraction-free editor helps you focus on writing with markdown support and rich media embedding.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3>Custom Themes</h3>
                    <p>Choose from professionally designed themes or create your own to match your brand identity.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Advanced Analytics</h3>
                    <p>Track engagement, read time, and audience demographics to optimize your content strategy.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Community Building</h3>
                    <p>Build a loyal readership with comments, newsletters, and subscriber features.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Blazing Fast</h3>
                    <p>Built on Laravel for exceptional performance and reliability, even under heavy traffic.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Enterprise Security</h3>
                    <p>Your content is protected with enterprise-grade security and automated backups.</p>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="cta-content">
                <h2>Ready to Start Your Blogging Journey?</h2>
                <p>Join thousands of writers who have already found their voice with LaravelBlog</p>
                <div class="cta-actions">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-primary btn-large">Go to Dashboard</a>
                    @else
                        <a href="{{ route('register') }}" class="btn-primary btn-large">Create Your Account</a>
                        <a href="{{ route('login') }}" class="btn-secondary btn-large">Sign In</a>
                    @endauth
                </div>
            </div>
        </section>
    </div>

</x-layouts.app>    

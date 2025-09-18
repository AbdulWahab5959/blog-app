@props(['header' => false])

<header class="welcome-header">
    <div class="header-content">
        <div class="logo">
            <a href="{{ route('dashboard') }}">
                <div class="logo-icon">
                    <i class="fas fa-pen-nib"></i>
                </div>
                <span class="logo-text">Laravel<span>Blog</span></span>
            </a>
        </div>
        
        <nav class="header-nav">
            @auth
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
            @endauth
            <a href="#" class="nav-link">Features</a>
            <a href="#" class="nav-link">Pricing</a>
            <a href="#" class="nav-link">Blog</a>
            <a href="#" class="nav-link">About</a>
        </nav>
        
        <div class="header-actions">
            @auth
                <!-- User dropdown for authenticated users -->
                <div class="user-dropdown">
                    <button class="user-dropdown-toggle">
                        <span>{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="user-dropdown-menu">
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <i class="fas fa-user"></i> Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i> Log Out
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Login/Register links for guests -->
                <a href="{{ route('login') }}" class="btn-login">Log in</a>
                <a href="{{ route('register') }}" class="btn-primary">Get Started</a>
            @endauth
        </div>
    </div>
</header>
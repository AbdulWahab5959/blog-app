@props(['header' => false])

<header class="welcome-header">
    <div class="header-content">
        <div class="logo">
            @auth
            <a href="{{ route('dashboard') }}">
                <div class="logo-icon">
                    <i class="fas fa-pen-nib"></i>
                </div>
                <span class="logo-text"><span>Laravel Blog </span></span>
            </a>
            @else
            <a href="{{ route('welcome') }}">
                <div class="logo-icon">
                    <i class="fas fa-pen-nib"></i>
                </div>
                <span class="logo-text"><span>Laravel Blog </span></span>
            </a>
            @endauth

        </div>

        <nav class="header-nav">
            @auth
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
            @endauth
                
            <a href="{{ route('blog') }}" class="nav-link">Blog</a>
            <a href="{{ route('feature') }}" class="nav-link">Features</a>
            <a href="{{ route('pricing') }}" class="nav-link">Pricing</a>
            <a href="{{ route('about') }}" class="nav-link">About</a>
        </nav>

        <div class="header-actions">
            @auth
            <!-- User dropdown for authenticated users -->
            <div class="user-dropdown" x-data="{ open: false }">
                <button class="user-dropdown-toggle" @click="open = !open" @click.outside="open = false">
                    <div class="user-avatar-mini">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="user-info-compact">
                        <span class="user-name">{{ Auth::user()->name }}</span>
                    </div>
                </button>

                <div class="user-dropdown-menu" x-show="open" x-transition>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="fas fa-user-edit"></i>
                        <span>Edit Profile</span>
                        <i class="fas fa-chevron-right dropdown-item-arrow"></i>
                    </a>
<!-- 
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                        <i class="fas fa-chevron-right dropdown-item-arrow"></i>
                    </a> -->
                    <div class="dropdown-divider"></div>

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="dropdown-item logout-item">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Sign Out</span>
                            <i class="fas fa-chevron-right dropdown-item-arrow"></i>
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
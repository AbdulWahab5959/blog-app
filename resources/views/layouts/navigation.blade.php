@props(['header' => false])

<nav class="premium-header">
    <div class="header-container">
        <!-- Logo Section -->
        <div class="logo">
            <a href="{{ route('dashboard') }}">
                <div class="logo-icon">
                    <i class="fas fa-pen-nib"></i>
                </div>
                <span class="logo-text"><span> Laravel Blog</span></span>
            </a>
        </div>

        <!-- Navigation Menu -->
        <nav class="navigation-menu">
            @auth
            <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'nav-item-active' : '' }}">
                <i class="fas fa-th-large nav-icon"></i>
                <span>Dashboard</span>
            </a>
            @endauth
            <a href="#" class="nav-item">
                <i class="fas fa-star nav-icon"></i>
                <span>Features</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-tag nav-icon"></i>
                <span>Pricing</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-blog nav-icon"></i>
                <span>Blog</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-info-circle nav-icon"></i>
                <span>About</span>
            </a>
        </nav>

        <!-- User Actions -->
        <div class="user-actions">
            @auth
                <!-- Premium User Dropdown -->
                <div class="premium-dropdown" x-data="{ open: false }">
                    <button 
                        class="user-trigger" 
                        @click="open = !open"
                        @click.outside="open = false"
                    >
                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ Auth::user()->name }}</span>
                            <span class="user-status">Premium Member</span>
                        </div>
                        <i class="fas fa-chevron-down dropdown-arrow" :class="{ 'rotate-180': open }"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div class="dropdown-menu" x-show="open" x-transition>
                        <div class="dropdown-header">
                            <div class="dropdown-avatar">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <div class="dropdown-user-info">
                                <span class="dropdown-name">{{ Auth::user()->name }}</span>
                                <span class="dropdown-email">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                        
                        <div class="dropdown-divider"></div>
                        
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <i class="fas fa-user-edit"></i>
                            <span>Edit Profile</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                                                
                        <div class="dropdown-divider"></div>
                        
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="dropdown-item logout-item">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Sign Out</span>
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Guest Actions -->
                <div class="guest-actions">
                    <a href="{{ route('login') }}" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i>
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" class="btn-primary">
                        <i class="fas fa-rocket"></i>
                        Get Started
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>


<script>
// Alpine.js for dropdown functionality
document.addEventListener('alpine:init', () => {
    Alpine.data('dropdown', () => ({
        open: false,
        toggle() {
            this.open = !this.open;
        },
        close() {
            this.open = false;
        }
    }));
});
</script>
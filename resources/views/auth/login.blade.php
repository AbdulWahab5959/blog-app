<x-layouts.guest 
    title="Login Page"
    description="Create, share, and inspire with LaravelBlog - the premium platform for writers and content creators."
>
    <div class="form-page">
        <div class="form-container">
            <div class="form-card">
                <!-- Header Section -->
                <div class="form-header">
                    <div class="form-header-icon">
                        <i class="fas fa-pen-nib text-white text-xl"></i>
                    </div>
                    <h2 class="form-title form-title-large">Welcome Back</h2>
                    <p class="form-subtitle">Sign in to your LaravelBlog account</p>
                </div>

                <div class="form-body">
                    <!-- Session Status -->
                    @if(session('status'))
                        <div class="form-alert form-alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="form-input-container">
                                <i class="fas fa-envelope form-input-icon"></i>
                                <input 
                                    id="email" 
                                    name="email" 
                                    type="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autofocus 
                                    autocomplete="username"
                                    class="form-field-input"
                                    placeholder="Enter your email"
                                >
                            </div>
                            @if($errors->has('email'))
                                <div class="form-error-message">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <div class="form-input-container">
                                <i class="fas fa-lock form-input-icon"></i>
                                <input 
                                    id="password" 
                                    name="password" 
                                    type="password" 
                                    required 
                                    autocomplete="current-password"
                                    class="form-field-input"
                                    placeholder="Enter your password"
                                >
                            </div>
                            @if($errors->has('password'))
                                <div class="form-error-message">{{ $errors->first('password') }}</div>
                            @endif
                        </div>

                        <!-- Remember Me -->
                        <div class="form-checkbox-container">
                            <input 
                                id="remember_me" 
                                type="checkbox" 
                                name="remember"
                                class="form-checkbox"
                            >
                            <label for="remember_me" class="form-checkbox-label">Remember me</label>
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="form-btn-primary form-btn-full">
                            <i class="fas fa-sign-in-alt form-btn-icon"></i> Log in
                        </button>
                    </form>

                    <!-- Forgot Password -->
                    <div class="form-forgot-password">
                        @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="form-forgot-link">
                                Forgot your password?
                            </a>
                        @endif
                    </div>

                    <!-- Sign Up Link -->
                    <div class="form-signup-link">
                        <p>Don't have an account?
                            <a href="{{ route('register') }}" class="form-link">Sign up now</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple form enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const inputs = document.querySelectorAll('.form-field-input');
            
            // Add focus styles
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('form-focused');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('form-focused');
                });
            });
            
            // Form validation
            form.addEventListener('submit', function(e) {
                let isValid = true;
                
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.style.borderColor = '#EF4444';
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    alert('Please fill in all required fields');
                }
            });
        });
    </script>
</x-layouts.guest>
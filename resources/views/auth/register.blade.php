<x-layouts.guest 
    title="Register"
    description="Create a new LaravelBlog account"
>
    <div class="form-page">
        <div class="form-container">
            <div class="form-card">
                <!-- Header Section -->
                <div class="form-header">
                    <div class="form-header-icon">
                        <i class="fas fa-user-plus text-white text-xl"></i>
                    </div>
                    <h2 class="form-title form-title-large">Create Account</h2>
                    <p class="form-subtitle">Join LaravelBlog community today</p>
                </div>

                <div class="form-body">
                    <!-- Error Alert -->
                    @if($errors->any())
                        <div class="form-alert form-alert-error">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name" class="form-label">Full Name</label>
                            <div class="form-input-container">
                                <i class="fas fa-user form-input-icon"></i>
                                <input 
                                    id="name" 
                                    name="name" 
                                    type="text" 
                                    value="{{ old('name') }}" 
                                    required 
                                    autofocus 
                                    autocomplete="name"
                                    class="form-field-input"
                                    placeholder="Enter your full name"
                                >
                            </div>
                            @if($errors->has('name'))
                                <div class="form-error-message">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

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
                                    autocomplete="new-password"
                                    class="form-field-input"
                                    placeholder="Create a password"
                                >
                            </div>
                            @if($errors->has('password'))
                                <div class="form-error-message">{{ $errors->first('password') }}</div>
                            @endif
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="form-input-container">
                                <i class="fas fa-lock form-input-icon"></i>
                                <input 
                                    id="password_confirmation" 
                                    name="password_confirmation" 
                                    type="password" 
                                    required 
                                    autocomplete="new-password"
                                    class="form-field-input"
                                    placeholder="Confirm your password"
                                >
                            </div>
                        </div>

                        <!-- Terms Agreement -->
                        <div class="form-checkbox-container">
                            <input 
                                id="terms" 
                                type="checkbox" 
                                name="terms"
                                required
                                class="form-checkbox"
                            >
                            <label for="terms" class="form-checkbox-label">
                                I agree to the <a href="#" class="form-link">Terms of Service</a> and <a href="#" class="form-link">Privacy Policy</a>
                            </label>
                        </div>

                        <!-- Register Button -->
                        <button type="submit" class="form-btn-primary form-btn-full">
                            <i class="fas fa-user-plus form-btn-icon"></i> Create Account
                        </button>
                    </form>

                    <!-- Login Link -->
                    <div class="form-signup-link">
                        <p>Already have an account?
                            <a href="{{ route('login') }}" class="form-link">Sign in here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
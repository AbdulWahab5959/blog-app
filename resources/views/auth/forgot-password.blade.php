<x-layouts.guest 
    title="Forgot Password"
    description="Reset your LaravelBlog password"
>
    <div class="form-page">
        <div class="form-container">
            <div class="form-card">
                <!-- Header Section -->
                <div class="form-header">
                    <div class="form-header-icon">
                        <i class="fas fa-key text-white text-xl"></i>
                    </div>
                    <h2 class="form-title form-title-large">Reset Password</h2>
                    <p class="form-subtitle">We'll send you a reset link</p>
                </div>

                <div class="form-body">
                    <!-- Session Status -->
                    @if(session('status'))
                        <div class="form-alert form-alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Error Alert -->
                    @if($errors->any())
                        <div class="form-alert form-alert-error">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Info Text -->
                        <div class="form-info-text">
                            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
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

                        <!-- Submit Button -->
                        <div class="form-actions-container">
                            <a href="{{ route('login') }}" class="form-btn-secondary">
                                <i class="fas fa-arrow-left form-btn-icon"></i> Back to Login
                            </a>
                            <button type="submit" class="form-btn-primary">
                                <i class="fas fa-paper-plane form-btn-icon"></i> Send Reset Link
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
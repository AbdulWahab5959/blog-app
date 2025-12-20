<x-layouts.guest 
    title="Reset Password"
    description="Create a new password for your LaravelBlog account"
>
    <div class="form-page">
        <div class="form-container">
            <div class="form-card">
                <!-- Header Section -->
                <div class="form-header">
                    <div class="form-header-icon">
                        <i class="fas fa-lock text-white text-xl"></i>
                    </div>
                    <h2 class="form-title form-title-large">New Password</h2>
                    <p class="form-subtitle">Create a new password for your account</p>
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

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email (hidden) -->
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="form-input-container">
                                <i class="fas fa-envelope form-input-icon"></i>
                                <input 
                                    id="email" 
                                    name="email" 
                                    type="email" 
                                    value="{{ old('email', $request->email) }}" 
                                    required 
                                    autofocus 
                                    autocomplete="username"
                                    class="form-field-input"
                                    readonly
                                >
                            </div>
                            @if($errors->has('email'))
                                <div class="form-error-message">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password" class="form-label">New Password</label>
                            <div class="form-input-container">
                                <i class="fas fa-lock form-input-icon"></i>
                                <input 
                                    id="password" 
                                    name="password" 
                                    type="password" 
                                    required 
                                    autocomplete="new-password"
                                    class="form-field-input"
                                    placeholder="Enter new password"
                                >
                            </div>
                            @if($errors->has('password'))
                                <div class="form-error-message">{{ $errors->first('password') }}</div>
                            @endif
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <div class="form-input-container">
                                <i class="fas fa-lock form-input-icon"></i>
                                <input 
                                    id="password_confirmation" 
                                    name="password_confirmation" 
                                    type="password" 
                                    required 
                                    autocomplete="new-password"
                                    class="form-field-input"
                                    placeholder="Confirm new password"
                                >
                            </div>
                        </div>

                        <!-- Reset Button -->
                        <button type="submit" class="form-btn-primary form-btn-full">
                            <i class="fas fa-sync-alt form-btn-icon"></i> Reset Password
                        </button>
                    </form>

                    <!-- Back to Login -->
                    <div class="form-signup-link">
                        <p>Remembered your password?
                            <a href="{{ route('login') }}" class="form-link">Sign in here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
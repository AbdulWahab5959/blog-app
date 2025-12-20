<x-layouts.guest 
    title="Confirm Password"
    description="Confirm your password to continue"
>
    <div class="form-page">
        <div class="form-container">
            <div class="form-card">
                <!-- Header Section -->
                <div class="form-header">
                    <div class="form-header-icon">
                        <i class="fas fa-shield-alt text-white text-xl"></i>
                    </div>
                    <h2 class="form-title form-title-large">Confirm Password</h2>
                    <p class="form-subtitle">This is a secure area of the application. Please confirm your password before continuing.</p>
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

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

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

                        <!-- Confirm Button -->
                        <button type="submit" class="form-btn-primary form-btn-full">
                            <i class="fas fa-check form-btn-icon"></i> Confirm
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
    

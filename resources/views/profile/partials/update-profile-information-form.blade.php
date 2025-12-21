{{-- File: resources/views/profile/partials/update-profile-information-form.blade.php --}}
<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}" class="space-y-6">
    @csrf
    @method('patch')

    <div class="premium-form-group">
        <label for="name" class="premium-label">{{ __('Full Name') }}</label>
        <input id="name" name="name" type="text" 
               class="premium-input {{ $errors->get('name') ? 'input-error-premium' : '' }}"
               value="{{ old('name', $user->name) }}" 
               required autofocus autocomplete="name"
               placeholder="{{ __('Enter your full name') }}">
        @if($errors->get('name'))
            <div class="error-message-premium">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>

    <div class="premium-form-group">
        <label for="email" class="premium-label">{{ __('Email Address') }}</label>
        <input id="email" name="email" type="email" 
               class="premium-input {{ $errors->get('email') ? 'input-error-premium' : '' }}"
               value="{{ old('email', $user->email) }}" 
               required autocomplete="username"
               placeholder="{{ __('your.email@example.com') }}">
        @if($errors->get('email'))
            <div class="error-message-premium">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                {{ $errors->first('email') }}
            </div>
        @endif

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="premium-status-warning">
                <p class="mb-2">
                    <strong>{{ __('Email Verification Required') }}</strong><br>
                    {{ __('Your email address is unverified. Please check your inbox for the verification link.') }}
                </p>
                <button form="send-verification" class="premium-btn premium-btn-secondary">
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        @endif
    </div>

    <div class="flex items-center gap-4 mt-8">
        <button type="submit" class="premium-btn premium-btn-primary">
            <span class="btn-icon">💾</span>
            {{ __('Save Profile Changes') }}
        </button>

        @if (session('status') === 'profile-updated')
            <div class="premium-status-success">
                <span class="btn-icon">✅</span>
                {{ __('Profile updated successfully!') }}
            </div>
        @endif
    </div>
</form>
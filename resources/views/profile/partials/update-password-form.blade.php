{{-- File: resources/views/profile/partials/update-password-form.blade.php --}}
<form method="post" action="{{ route('password.update') }}" class="space-y-6">
    @csrf
    @method('put')

    <div class="premium-form-group">
        <label for="update_password_current_password" class="premium-label">{{ __('Current Password') }}</label>
        <input id="update_password_current_password" name="current_password" type="password" 
               class="premium-input {{ $errors->updatePassword->get('current_password') ? 'input-error-premium' : '' }}"
               autocomplete="current-password"
               placeholder="{{ __('Enter your current password') }}">
        @if($errors->updatePassword->get('current_password'))
            <div class="error-message-premium">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                {{ $errors->updatePassword->first('current_password') }}
            </div>
        @endif
    </div>

    <div class="premium-form-group">
        <label for="update_password_password" class="premium-label">{{ __('New Password') }}</label>
        <input id="update_password_password" name="password" type="password" 
               class="premium-input {{ $errors->updatePassword->get('password') ? 'input-error-premium' : '' }}"
               autocomplete="new-password"
               placeholder="{{ __('Enter a strong new password') }}">
        @if($errors->updatePassword->get('password'))
            <div class="error-message-premium">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                {{ $errors->updatePassword->first('password') }}
            </div>
        @endif
    </div>

    <div class="premium-form-group">
        <label for="update_password_password_confirmation" class="premium-label">{{ __('Confirm New Password') }}</label>
        <input id="update_password_password_confirmation" name="password_confirmation" type="password" 
               class="premium-input {{ $errors->updatePassword->get('password_confirmation') ? 'input-error-premium' : '' }}"
               autocomplete="new-password"
               placeholder="{{ __('Re-enter your new password') }}">
        @if($errors->updatePassword->get('password_confirmation'))
            <div class="error-message-premium">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                {{ $errors->updatePassword->first('password_confirmation') }}
            </div>
        @endif
    </div>

    <div class="mt-8">
        <button type="submit" class="premium-btn premium-btn-primary">
            <span class="btn-icon">🔄</span>
            {{ __('Update Password') }}
        </button>

        @if (session('status') === 'password-updated')
            <div class="premium-status-success ml-4">
                <span class="btn-icon">✅</span>
                {{ __('Password updated successfully!') }}
            </div>
        @endif
    </div>
</form>
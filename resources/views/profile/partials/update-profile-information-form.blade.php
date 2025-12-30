{{-- File: resources/views/profile/partials/update-profile-information-form.blade.php --}}
<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>
{{-- Add this at the top of your form --}}
            @if($errors->any())
            <div class="premium-error-alert">
                <strong>{{ __('Whoops! Something went wrong.') }}</strong>
                <ul class="mt-2">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
<form method="post" action="{{ route('profile.update') }}" class="space-y-6" enctype="multipart/form-data">
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
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
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
            readonly
            placeholder="{{ __('your.email@example.com') }}">
        @if($errors->get('email'))
        <div class="error-message-premium">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
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
    <!-- Avatar Section -->
    <div class="premium-form-group">
        <label class="premium-label">{{ __('Profile Picture') }}</label>
        <div class="profile-picture-upload-container">
            <div class="profile-picture-preview mb-4">
                @if($user->avatar)
                @if(filter_var($user->avatar, FILTER_VALIDATE_URL))
                <img src="{{ $user->avatar }}"
                    alt="{{ $user->name }}"
                    class="profile-picture-img"
                    id="avatar-preview">
                @else
                <img src="{{ asset('storage/' . $user->avatar) }}"
                    alt="{{ $user->name }}"
                    class="profile-picture-img"
                    id="avatar-preview">
                @endif
                @else
                <div class="profile-picture-default" id="avatar-preview">
                    <i class="fas fa-user-circle fa-3x"></i>
                </div>
                @endif
            </div>

            <div class="profile-picture-controls">
                <input type="file"
                    id="avatar"
                    name="avatar"
                    accept="image/*"
                    class="hidden"
                    onchange="previewAvatar(event)">

                <button type="button"
                    onclick="document.getElementById('avatar').click()"
                    class="premium-btn premium-btn-secondary mb-2">
                    <i class="fas fa-upload mr-2"></i>
                    {{ __('Upload New Picture') }}
                </button>

                @if($user->avatar)
                <button type="button"
                    onclick="removeAvatar()"
                    class="premium-btn premium-btn-danger">
                    <i class="fas fa-trash mr-2"></i>
                    {{ __('Remove Picture') }}
                </button>

                <input type="hidden" name="remove_avatar" id="remove_avatar" value="0">
                @endif

                <div class="text-sm text-gray-500 mt-2">
                    {{ __('Maximum file size: 2MB. Allowed formats: JPG, PNG, GIF.') }}
                </div>
            </div>
        </div>

        @if($errors->get('avatar'))
        <div class="error-message-premium">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            {{ $errors->first('avatar') }}
        </div>
        @endif
    </div>

    <!-- Add age and country fields if needed -->
    <div class="premium-form-group">
        <label for="age" class="premium-label">{{ __('Age') }}</label>
        <input id="age" name="age" type="number"
            class="premium-input {{ $errors->get('age') ? 'input-error-premium' : '' }}"
            value="{{ old('age', $user->age) }}"
            min="13" max="120"
            placeholder="{{ __('Your age') }}">
        @if($errors->get('age'))
        <div class="error-message-premium">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            {{ $errors->first('age') }}
        </div>
        @endif
    </div>

    <div class="premium-form-group">
        <label for="country" class="premium-label">{{ __('Country') }}</label>
        <input id="country" name="country" type="text"
            class="premium-input {{ $errors->get('country') ? 'input-error-premium' : '' }}"
            value="{{ old('country', $user->country) }}"
            placeholder="{{ __('Your country') }}">
        @if($errors->get('country'))
        <div class="error-message-premium">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            {{ $errors->first('country') }}
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
<!-- JavaScript -->
    <script>
        function previewAvatar(event) {
            const input = event.target;
            const preview = document.getElementById('avatar-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    if (preview.classList.contains('profile-picture-default')) {
                        // Create new image element
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = 'Avatar Preview';
                        img.className = 'profile-picture-img';

                        // Replace the default icon with image
                        preview.parentNode.replaceChild(img, preview);
                        img.id = 'avatar-preview';
                    } else {
                        // Update existing image
                        preview.src = e.target.result;
                    }
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeAvatar() {
            const preview = document.getElementById('avatar-preview');
            const removeInput = document.getElementById('remove_avatar');

            // Set remove flag
            removeInput.value = '1';

            // Replace with default icon
            const defaultDiv = document.createElement('div');
            defaultDiv.className = 'profile-picture-default';
            defaultDiv.id = 'avatar-preview';
            defaultDiv.innerHTML = '<i class="fas fa-user-circle fa-3x"></i>';

            preview.parentNode.replaceChild(defaultDiv, preview);
        }
    </script>

    <!-- CSS Styles -->
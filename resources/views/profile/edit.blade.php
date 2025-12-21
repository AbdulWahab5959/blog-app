<x-layouts.app 
    title="Profile | Premium Blog Platform"
    description="Manage your premium account, security settings, and personal preferences."
>
    <div class="premium-profile-container">
        <div class="premium-profile-card">
            <!-- Premium Header -->
            <div class="premium-header">
                <div class="premium-header-content">
                    <h1 class="premium-title">{{ __('Premium Account Settings') }}</h1>
                    <p class="premium-subtitle">
                        {{ __('Manage your personal information, security preferences, and account settings with our premium interface.') }}
                    </p>
                </div>
            </div>

            <!-- Profile Information Section -->
            <div class="premium-section">
                <div class="section-header-premium">
                    <div class="section-icon-container icon-profile">
                        <div class="section-icon">👤</div>
                    </div>
                    <div>
                        <h2 class="section-title-premium">{{ __('Personal Information') }}</h2>
                        <p class="section-description-premium">
                            {{ __('Update your personal details and contact information. Your profile helps personalize your experience.') }}
                        </p>
                    </div>
                </div>
                
                <div class="premium-form-grid">
                    <div class="premium-form-column">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <!-- Security Section -->
            <div class="premium-section">
                <div class="section-header-premium">
                    <div class="section-icon-container icon-security">
                        <div class="section-icon">🔒</div>
                    </div>
                    <div>
                        <h2 class="section-title-premium">{{ __('Security Settings') }}</h2>
                        <p class="section-description-premium">
                            {{ __('Keep your account secure with strong authentication methods and regular password updates.') }}
                        </p>
                    </div>
                </div>
                
                <div class="premium-form-grid">
                    <div class="premium-form-column">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Account Management Section -->
            <div class="premium-section">
                <div class="section-header-premium">
                    <div class="section-icon-container icon-danger">
                        <div class="section-icon">⚠️</div>
                    </div>
                    <div>
                        <h2 class="section-title-premium">{{ __('Account Management') }}</h2>
                        <p class="section-description-premium">
                            {{ __('Manage advanced account settings and options. Please proceed with caution for irreversible actions.') }}
                        </p>
                    </div>
                </div>
                
                <div class="premium-form-grid">
                    <div class="premium-form-column">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
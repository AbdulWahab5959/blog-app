<x-layouts.guest 
    title="Verify Email"
    description="Verify your email address for LaravelBlog"
>
    <div class="form-page">
        <div class="form-container">
            <div class="form-card">
                <!-- Header Section -->
                <div class="form-header">
                    <div class="form-header-icon">
                        <i class="fas fa-envelope-open-text text-white text-xl"></i>
                    </div>
                    <h2 class="form-title form-title-large">Verify Your Email</h2>
                    <p class="form-subtitle">Please verify your email address</p>
                </div>

                <div class="form-body">
                    <!-- Success Message -->
                    @if(session('status') == 'verification-link-sent')
                        <div class="form-alert form-alert-success">
                            A new verification link has been sent to the email address you provided during registration.
                        </div>
                    @endif

                    <!-- Info Message -->
                    <div class="form-info-message">
                        <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
                    </div>

                    <!-- Actions -->
                    <div class="form-actions-container">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="form-btn-primary">
                                <i class="fas fa-paper-plane form-btn-icon"></i> Resend Verification Email
                            </button>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="form-btn-secondary">
                                <i class="fas fa-sign-out-alt form-btn-icon"></i> Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
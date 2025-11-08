<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email - LaravelBlog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #F9FAFB 0%, #F3F4F6 100%);
            padding: 20px;
        }
        
        .auth-container {
            width: 100%;
            max-width: 440px;
        }
        
        .auth-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .auth-header {
            background: linear-gradient(135deg, #6366F1 0%, #4F46E5 100%);
            padding: 2rem;
            text-align: center;
            color: white;
        }
        
        .auth-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .auth-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.95rem;
        }
        
        .auth-body {
            padding: 2rem;
        }
        
        .info-message {
            background-color: #F0F9FF;
            border: 1px solid #BAE6FD;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            color: #0369A1;
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        .success-message {
            background-color: #F0FDF4;
            border: 1px solid #BBF7D0;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            color: #166534;
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        .actions-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
            gap: 1rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #6366F1 0%, #4F46E5 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-size: 1rem;
            text-decoration: none;
            flex: 1;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }
        
        .btn-secondary {
            background: transparent;
            color: #6B7280;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            border: 1px solid #D1D5DB;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-size: 1rem;
            text-decoration: none;
            flex: 1;
        }
        
        .btn-secondary:hover {
            background-color: #F9FAFB;
            border-color: #9CA3AF;
        }
        
        @media (max-width: 480px) {
            .actions-container {
                flex-direction: column;
            }
            
            .btn-primary, .btn-secondary {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h1 class="auth-title">Verify Your Email</h1>
                <p class="auth-subtitle">Complete your registration process</p>
            </div>
            
            <div class="auth-body">
                <div class="info-message">
                    <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                    Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="success-message">
                        <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                        A new verification link has been sent to the email address you provided during registration.
                    </div>
                @endif

                <div class="actions-container">
                    <form method="POST" action="{{ route('verification.send') }}" style="flex: 1;">
                        @csrf
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-paper-plane"></i> Resend Verification Email
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}" style="flex: 1;">
                        @csrf
                        <button type="submit" class="btn-secondary">
                            <i class="fas fa-sign-out-alt"></i> Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
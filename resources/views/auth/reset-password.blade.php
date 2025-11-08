<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - LaravelBlog</title>
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
        
        .header-icon {
            width: 48px;
            height: 48px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
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
        
        .form-group {
            margin-bottom: 1.25rem;
        }
        
        .form-label {
            display: block;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }
        
        .input-container {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9CA3AF;
            z-index: 10;
        }
        
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s;
            background: white;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #6366F1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }
        
        .error-message {
            color: #EF4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        
        .btn-primary {
            width: 100%;
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
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }
        
        .auth-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: #6B7280;
        }
        
        .auth-link {
            color: #6366F1;
            text-decoration: none;
            font-weight: 500;
        }
        
        .auth-link:hover {
            text-decoration: underline;
        }
        
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <!-- Header Section -->
            <div class="auth-header">
                <div class="header-icon">
                    <i class="fas fa-lock text-white"></i>
                </div>
                <h2 class="auth-title">Create New Password</h2>
                <p class="auth-subtitle">Enter your new password below</p>
            </div>

            <div class="auth-body">
                <form method="POST" action="<?php echo e(route('password.store')); ?>">
                    <?php echo csrf_field(); ?>

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-container">
                            <i class="fas fa-envelope input-icon"></i>
                            <input 
                                id="email" 
                                class="form-input" 
                                type="email" 
                                name="email" 
                                value="<?php echo e(old('email', $request->email)); ?>" 
                                required 
                                autofocus 
                                autocomplete="username"
                                placeholder="Enter your email address"
                            />
                        </div>
                        <?php if($errors->has('email')): ?>
                            <div class="error-message"><?php echo e($errors->first('email')); ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label">New Password</label>
                        <div class="input-container">
                            <i class="fas fa-lock input-icon"></i>
                            <input 
                                id="password" 
                                class="form-input" 
                                type="password" 
                                name="password" 
                                required 
                                autocomplete="new-password"
                                placeholder="Enter your new password"
                            />
                        </div>
                        <?php if($errors->has('password')): ?>
                            <div class="error-message"><?php echo e($errors->first('password')); ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <div class="input-container">
                            <i class="fas fa-lock input-icon"></i>
                            <input 
                                id="password_confirmation" 
                                class="form-input"
                                type="password"
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password"
                                placeholder="Confirm your new password"
                            />
                        </div>
                        <?php if($errors->has('password_confirmation')): ?>
                            <div class="error-message"><?php echo e($errors->first('password_confirmation')); ?></div>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn-primary">
                        <i class="fas fa-sync-alt"></i> Reset Password
                    </button>
                </form>

                <div class="auth-footer">
                    <p>Remember your password? 
                        <a href="<?php echo e(route('login')); ?>" class="auth-link">Sign in here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple form enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const inputs = document.querySelectorAll('.form-input');
            
            // Add focus styles
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });
            });
            
            // Password validation
            form.addEventListener('submit', function(e) {
                const password = document.getElementById('password');
                const confirmPassword = document.getElementById('password_confirmation');
                let isValid = true;
                
                // Check if passwords match
                if (password.value !== confirmPassword.value) {
                    isValid = false;
                    confirmPassword.style.borderColor = '#EF4444';
                    alert('Passwords do not match');
                }
                
                // Check if all fields are filled
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.style.borderColor = '#EF4444';
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
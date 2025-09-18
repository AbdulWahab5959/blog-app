<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LaravelBlog</title>
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
        
        .login-container {
            width: 100%;
            max-width: 440px;
        }
        
        .login-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .login-header {
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
        
        .login-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .login-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.95rem;
        }
        
        .login-body {
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
            font-size: 0.95rem;
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
        }
        
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s;
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
        
        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 1.25rem;
        }
        
        .checkbox {
            width: 1rem;
            height: 1rem;
            border: 1px solid #D1D5DB;
            border-radius: 4px;
            margin-right: 0.5rem;
            cursor: pointer;
        }
        
        .checkbox-label {
            font-size: 0.95rem;
            color: #6B7280;
            cursor: pointer;
        }
        
        .btn-login {
            margin-inline: auto;
            background: linear-gradient(135deg, #6366F1 0%, #4F46E5 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }
        
        .btn-icon {
            margin-right: 0.5rem;
        }
        
        .forgot-password {
            text-align: center;
            margin: 1.25rem 0;
        }
        
        .forgot-link {
            color: #6366F1;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.2s;
        }
        
        .forgot-link:hover {
            color: #4F46E5;
            text-decoration: underline;
        }
        
        .signup-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #6B7280;
            font-size: 0.95rem;
        }
        
        .signup-link a {
            color: #6366F1;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        
        .signup-link a:hover {
            color: #4F46E5;
            text-decoration: underline;
        }
        
        .alert {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
            font-size: 0.95rem;
        }
        
        .alert-success {
            background-color: #ECFDF5;
            color: #065F46;
            border: 1px solid #A7F3D0;
        }
        
        .alert-error {
            background-color: #FEF2F2;
            color: #991B1B;
            border: 1px solid #FECACA;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Header Section -->
            <div class="login-header">
                <div class="header-icon">
                    <i class="fas fa-pen-nib text-white text-xl"></i>
                </div>
                <h2 class="login-title">Welcome Back</h2>
                <p class="login-subtitle">Sign in to your LaravelBlog account</p>
            </div>

            <div class="login-body">
                <!-- Session Status -->
                <?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-container">
                            <i class="fas fa-envelope input-icon"></i>
                            <input 
                                id="email" 
                                name="email" 
                                type="email" 
                                value="<?php echo e(old('email')); ?>" 
                                required 
                                autofocus 
                                autocomplete="username"
                                class="form-input"
                                placeholder="Enter your email"
                            >
                        </div>
                        <?php if($errors->has('email')): ?>
                            <div class="error-message"><?php echo e($errors->first('email')); ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-container">
                            <i class="fas fa-lock input-icon"></i>
                            <input 
                                id="password" 
                                name="password" 
                                type="password" 
                                required 
                                autocomplete="current-password"
                                class="form-input"
                                placeholder="Enter your password"
                            >
                        </div>
                        <?php if($errors->has('password')): ?>
                            <div class="error-message"><?php echo e($errors->first('password')); ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- Remember Me -->
                    <div class="checkbox-container">
                        <input 
                            id="remember_me" 
                            type="checkbox" 
                            name="remember"
                            class="checkbox"
                        >
                        <label for="remember_me" class="checkbox-label">Remember me</label>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt btn-icon"></i> Log in
                    </button>
                </form>

                <!-- Forgot Password -->
                <div class="forgot-password">
                    <?php if(Route::has('password.request')): ?>
                        <a href="<?php echo e(route('password.request')); ?>" class="forgot-link">
                            Forgot your password?
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Sign Up Link -->
                <div class="signup-link">
                    <p>Don't have an account?
                        <a href="<?php echo e(route('register')); ?>">Sign up now</a>
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
            
            // Form validation
            form.addEventListener('submit', function(e) {
                let isValid = true;
                
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.style.borderColor = '#EF4444';
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    alert('Please fill in all required fields');
                }
            });
        });
    </script>
</body>
</html>
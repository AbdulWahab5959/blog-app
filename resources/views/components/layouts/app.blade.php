<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $description ?? 'Premium Blog Platform' }}">

    <title>{{ $title ?? config('app.name', 'LaravelBlog') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons CDN (Optional but recommended) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Your Consolidated CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- Alpine.js for interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Additional Page Styles -->
    @stack('styles')
</head>
<body class="font-sans antialiased">
    
    <!-- Conditional Navigation -->
        <x-section.custom-nav />

    <!-- Page Content -->
    <main>
        @isset($header)
                {{ $header }}
        @endisset

        {{ $slot }}
    </main>

    <!-- Conditional Footer -->
    <x-section.footer />


    <!-- Additional Page Scripts -->
    @stack('scripts')
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Alpine.js if you're using it (commonly in Laravel) -->
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
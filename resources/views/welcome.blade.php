<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} | Premium Blog Platform</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|inter:400,500,600,700" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
                @layer theme, base, components, utilities;
                @layer theme {
                    :root, :host {
                        --font-sans: 'Inter', 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                        --font-serif: ui-serif, Georgia, Cambria, "Times New Roman", Times, serif;
                        --font-mono: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
                        /* Color palette optimized for premium blog */
                        --color-primary: oklch(0.62 0.22 256.52);
                        --color-primary-dark: oklch(0.45 0.20 260.32);
                        --color-secondary: oklch(0.75 0.15 180.00);
                        --color-accent: oklch(0.82 0.18 70.00);
                        --color-surface: oklch(0.98 0.01 260.00);
                        --color-surface-dark: oklch(0.14 0.02 260.00);
                        --color-text: oklch(0.20 0.02 260.00);
                        --color-text-light: oklch(0.98 0.01 260.00);
                        --color-border: oklch(0.90 0.02 260.00);
                        --color-border-dark: oklch(0.25 0.02 260.00);
                    }
                }
                @layer base {
                    *, :after, :before, ::backdrop {
                        box-sizing: border-box;
                        border: 0 solid;
                        margin: 0;
                        padding: 0;
                    }
                    html, :host {
                        -webkit-text-size-adjust: 100%;
                        -moz-tab-size: 4;
                        tab-size: 4;
                        line-height: 1.5;
                        font-family: var(--default-font-family, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji");
                        font-feature-settings: var(--default-font-feature-settings, normal);
                        font-variation-settings: var(--default-font-variation-settings, normal);
                        -webkit-tap-highlight-color: transparent;
                    }
                    body {
                        line-height: inherit;
                    }
                    /* Additional base styles would follow */
                }
                @layer utilities {
                    .bg-gradient-premium {
                        background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
                    }
                    .text-gradient {
                        background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-accent) 100%);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        background-clip: text;
                    }
                    .hover-lift {
                        transition: all 0.3s ease;
                    }
                    .hover-lift:hover {
                        transform: translateY(-3px);
                        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
                    }
                }
            </style>
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-6xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="h-8 w-auto text-[#1b1b18] dark:text-white" viewBox="0 0 50 50" fill="currentColor">
                            <path d="M25 5C13.954 5 5 13.954 5 25s8.954 20 20 20 20-8.954 20-20S36.046 5 25 5zm0 36c-8.837 0-16-7.163-16-16S16.163 9 25 9s16 7.163 16 16-7.163 16-16 16z"/>
                            <path d="M22 32h6v2h-6zm4-18c-4.418 0-8 3.582-8 8h2c0-3.314 2.686-6 6-6s6 2.686 6 6c0 2.209-1.791 4-4 4h-2v-4h-2v6h4c3.309 0 6-2.691 6-6s-2.691-8-6-8z"/>
                        </svg>
                        <span class="ml-2 text-xl font-semibold dark:text-white">Laravel<span class="text-gradient">Blog</span></span>
                    </div>
                    <div class="flex items-center gap-4">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="inline-block px-5 py-2.5 dark:text-white border border-[#19140035] hover:border-[#1915014a] text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-lg text-sm font-medium hover-lift"
                            >
                                Dashboard
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="inline-block px-5 py-2.5 dark:text-white text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-lg text-sm font-medium"
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="inline-block px-5 py-2.5 bg-gradient-premium text-white rounded-lg text-sm font-medium hover-lift shadow-md">
                                    Get Started
                                </a>
                            @endif
                        @endauth
                    </div>
                </nav>
            @endif
        </header>
        
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-6xl lg:flex-row lg:items-center lg:gap-12">
                <div class="text-[15px] leading-[24px] flex-1 p-6 pb-12 lg:p-12 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[0_10px_40px_-15px_rgba(0,0,0,0.1)] dark:shadow-[0_10px_40px_-15px_rgba(0,0,0,0.3)] rounded-2xl">
                    <h1 class="mb-4 text-3xl font-bold dark:text-white">Welcome to <span class="text-gradient">LaravelBlog</span></h1>
                    <p class="mb-6 text-[#706f6c] dark:text-[#A1A09A]">A premium blogging platform built with Laravel. Share your stories, ideas, and expertise with a beautiful, modern interface designed for writers and readers alike.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                        <div class="flex items-start gap-3 p-3 bg-[#F7F7F6] dark:bg-[#1F1F1E] rounded-lg">
                            <div class="flex items-center justify-center w-8 h-8 bg-white dark:bg-[#161615] rounded-full shadow-sm">
                                <svg class="w-4 h-4 text-[var(--color-primary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-[#1b1b18] dark:text-white">Easy Writing</h3>
                                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Rich text editor with markdown support</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3 p-3 bg-[#F7F7F6] dark:bg-[#1F1F1E] rounded-lg">
                            <div class="flex items-center justify-center w-8 h-8 bg-white dark:bg-[#161615] rounded-full shadow-sm">
                                <svg class="w-4 h-4 text-[var(--color-primary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-[#1b1b18] dark:text-white">Beautiful Themes</h3>
                                <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Multiple responsive design options</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-3">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-premium text-white rounded-lg font-medium hover-lift shadow-md">
                                Go to Dashboard
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        @else
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-premium text-white rounded-lg font-medium hover-lift shadow-md">
                                    Start Writing Now
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            @endif
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-6 py-3 border border-[#e3e3e0] dark:border-[#3E3E3A] text-[#1b1b18] dark:text-white rounded-lg font-medium">
                                Sign In
                            </a>
                        @endauth
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Trusted by thousands of writers worldwide</p>
                        <div class="flex items-center gap-4 mt-3">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-premium border-2 border-white dark:border-[#161615]"></div>
                                <div class="w-8 h-8 rounded-full bg-[var(--color-secondary)] border-2 border-white dark:border-[#161615]"></div>
                                <div class="w-8 h-8 rounded-full bg-[var(--color-accent)] border-2 border-white dark:border-[#161615]"></div>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-[#1b1b18] dark:text-white">4.8/5 rating</p>
                                <div class="flex items-center mt-1">
                                    <?xml version="1.0" ?><svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                    <?xml version="1.0" ?><svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                    <?xml version="1.0" ?><svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                    <?xml version="1.0" ?><svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                    <?xml version="1.0" ?><svg class="w-4 h-4 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="relative -mb-px lg:mb-0 rounded-2xl aspect-[335/376] lg:aspect-auto w-full lg:w-[45%] shrink-0 overflow-hidden">
                    <div class="bg-gradient-premium rounded-2xl p-8 h-full flex flex-col justify-center">
                        <div class="text-white mb-6">
                            <h2 class="text-2xl font-bold mb-2">Featured Article</h2>
                            <p class="text-white/90">Discover the latest insights on modern web development</p>
                        </div>
                        
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                                    <span class="text-white font-semibold">JD</span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-white font-medium">John Doe</p>
                                    <p class="text-white/70 text-sm">Web Developer</p>
                                </div>
                            </div>
                            <h3 class="text-white font-bold mb-2">Building Modern Blogs with Laravel</h3>
                            <p class="text-white/80 text-sm mb-3">Learn how to create high-performance blogging platforms using the latest Laravel features and modern frontend techniques.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-white/60 text-sm">5 min read</span>
                                <span class="text-white/60 text-sm">May 15, 2023</span>
                            </div>
                        </div>
                        
                        <div class="mt-6 flex items-center text-white/80">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            <span class="text-sm">Trending in Technology</span>
                        </div>
                    </div>
                    
                    <!-- Decorative elements -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-16 translate-x-16"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/5 rounded-full translate-y-12 -translate-x-12"></div>
                </div>
            </main>
        </div>

        <footer class="mt-12 text-center text-sm text-[#706f6c] dark:text-[#A1A09A]">
            <p>© {{ date('Y') }} LaravelBlog. All rights reserved.</p>
        </footer>
    </body>
</html>
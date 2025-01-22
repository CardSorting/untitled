<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }} - AI-Powered Sticker Creation Platform</title>
        <meta name="description" content="Transform your ideas into stunning stickers instantly with AI. Create unique, personalized stickers for your brand, products, or personal use.">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
        <!-- Navigation -->
        <nav class="fixed inset-x-0 top-0 z-50 backdrop-blur-lg bg-white/70 dark:bg-gray-900/80 border-b border-gray-200 dark:border-gray-800">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center flex-shrink-0">
                        <a href="/" class="flex items-center space-x-2">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-xl font-bold text-gray-900 dark:text-white">{{ config('app.name', 'Laravel') }}</span>
                        </a>
                    </div>
                    @if (Route::has('login'))
                        <div class="flex items-center gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" 
                                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-gray-900 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-gray-900 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" 
                                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out">
                                        Start Free
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>

        <div class="relative">
            <!-- Hero Section -->
            <header class="relative overflow-hidden pt-32 pb-16 sm:pt-40 sm:pb-24">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                    <div class="text-center space-y-8 max-w-4xl mx-auto">
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 dark:text-white tracking-tight">
                            Transform Your Ideas into 
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-red-600 to-orange-500">
                                Beautiful Stickers
                            </span>
                            <br /> in Seconds with AI
                        </h1>
                        <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                            Create professional-quality stickers instantly using our AI-powered platform. Perfect for businesses, creators, and anyone who wants to make their products stand out.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('register') }}"
                               class="inline-flex items-center justify-center px-8 py-4 text-base font-medium text-white bg-red-600 border border-transparent rounded-lg shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out">
                                Start Creating Free
                                <svg class="ml-2 -mr-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                            <a href="#how-it-works"
                               class="inline-flex items-center justify-center px-8 py-4 text-base font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                                See How It Works
                            </a>
                        </div>
                        <div class="pt-8 flex items-center justify-center space-x-8 text-sm text-gray-500 dark:text-gray-400">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                No Credit Card Required
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Free Plan Available
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Value Proposition Section -->
            <section class="py-16 sm:py-24 bg-white dark:bg-gray-900">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                            Why Choose Our Platform?
                        </h2>
                        <p class="text-lg text-gray-600 dark:text-gray-300">
                            We combine cutting-edge AI technology with user-friendly tools to help you create stunning stickers in minutes, not hours.
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="relative p-6 bg-gray-50 dark:bg-gray-800 rounded-xl">
                            <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-lg bg-red-100 dark:bg-red-900/20">
                                <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                                Lightning Fast Creation
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Generate professional stickers in seconds using our AI technology. No design skills needed.
                            </p>
                        </div>
                        <div class="relative p-6 bg-gray-50 dark:bg-gray-800 rounded-xl">
                            <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-lg bg-red-100 dark:bg-red-900/20">
                                <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                                Unlimited Customization
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Customize every aspect of your stickers with our intuitive editing tools and AI suggestions.
                            </p>
                        </div>
                        <div class="relative p-6 bg-gray-50 dark:bg-gray-800 rounded-xl">
                            <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-lg bg-red-100 dark:bg-red-900/20">
                                <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                                Cost-Effective
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Save money on design costs with our affordable plans. Start free and upgrade as you grow.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- How It Works Section -->
            <section id="how-it-works" class="py-16 sm:py-24">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                            How It Works
                        </h2>
                        <p class="text-lg text-gray-600 dark:text-gray-300">
                            Create stunning stickers in three simple steps
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="relative">
                            <div class="flex flex-col items-center text-center">
                                <div class="w-12 h-12 rounded-full bg-red-600 text-white flex items-center justify-center text-xl font-bold mb-4">
                                    1
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                                    Describe Your Idea
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    Tell us what you want to create. Our AI will generate multiple design options.
                                </p>
                            </div>
                        </div>
                        <div class="relative">
                            <div class="flex flex-col items-center text-center">
                                <div class="w-12 h-12 rounded-full bg-red-600 text-white flex items-center justify-center text-xl font-bold mb-4">
                                    2
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                                    Customize Your Design
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    Use our intuitive editor to refine colors, text, and layout.
                                </p>
                            </div>
                        </div>
                        <div class="relative">
                            <div class="flex flex-col items-center text-center">
                                <div class="w-12 h-12 rounded-full bg-red-600 text-white flex items-center justify-center text-xl font-bold mb-4">
                                    3
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                                    Download & Share
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    Get high-quality files ready for printing or digital use.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        <div class="flex items-center space-x-4">
                            <a href="https://github.com/sponsors/taylorotwell" 
                               class="group inline-flex items-center text-sm text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out">
                                <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-gray-500 dark:group-hover:text-gray-300 transition duration-150 ease-in-out" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                Sponsor
                            </a>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>

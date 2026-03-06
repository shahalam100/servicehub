<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ServiceHub - Access Portal</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Outfit:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-['Outfit'] text-slate-900 antialiased bg-[#f0f4f8]">
        <!-- Background Decorative Elements -->
        <div class="fixed inset-0 -z-10 overflow-hidden">
            <div class="absolute top-[20%] -left-[10%] w-[40%] h-[40%] rounded-full bg-indigo-200/40 blur-[120px]"></div>
            <div class="absolute bottom-[20%] -right-[10%] w-[35%] h-[35%] rounded-full bg-purple-200/40 blur-[120px]"></div>
        </div>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="mb-8 animate-fade-in">
                <a href="/" class="flex flex-col items-center gap-2">
                    <div class="w-16 h-16 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-xl shadow-indigo-200">
                        <span class="text-white text-3xl">🏠</span>
                    </div>
                    <span class="text-2xl font-black tracking-tight text-slate-900">Service<span class="text-indigo-600">Hub</span></span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-10 py-10 glass-card animate-fade-in relative z-10">
                {{ $slot }}
            </div>

            <p class="mt-8 text-slate-400 text-sm font-medium animate-fade-in">&copy; 2026 ServiceHub Network</p>
        </div>
    </body>
</html>

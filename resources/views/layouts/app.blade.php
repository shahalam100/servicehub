<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ServiceHub') }} | Terminal</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Outfit:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-['Outfit'] antialiased bg-[#f8fafc] text-slate-900 selection:bg-indigo-600 selection:text-white">
        <!-- Structural Background Nodes -->
        <div class="fixed inset-0 -z-10 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:32px_32px] opacity-40"></div>
        <div class="fixed top-0 left-0 right-0 h-screen -z-10 pointer-events-none">
            <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-indigo-200/20 blur-[150px] rounded-full"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-purple-200/20 blur-[150px] rounded-full"></div>
        </div>

        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white/40 backdrop-blur-xl border-b border-slate-100/50 sticky top-20 z-30">
                    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="relative z-10">
                {{ $slot }}
            </main>

            <footer class="py-12 border-t border-slate-100 mt-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="flex items-center gap-3 grayscale opacity-30">
                        <span class="text-xl">🏠</span>
                        <span class="text-xs font-black uppercase tracking-widest italic">ServiceHub Platform</span>
                    </div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-300 italic">
                        &copy; 2026 Operational Node Status: Secure
                    </p>
                </div>
            </footer>
        </div>
    </body>
</html>

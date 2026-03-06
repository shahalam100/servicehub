<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ServiceHub | Elite Domestic Infrastructure</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Outfit:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .glass-panel {
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(24px) saturate(150%);
                border: 1px solid rgba(255, 255, 255, 0.8);
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.05), inset 0 1px 0 rgba(255, 255, 255, 0.5);
            }
            .hero-bg {
                background-color: #f8fafc;
                background-image: 
                    radial-gradient(at 0% 0%, hsla(253,16%,7%,0.03) 0, transparent 50%), 
                    radial-gradient(at 50% 0%, hsla(225,39%,30%,0.03) 0, transparent 50%), 
                    radial-gradient(at 100% 0%, hsla(339,49%,30%,0.03) 0, transparent 50%);
            }
            .blob {
                position: absolute;
                filter: blur(80px);
                z-index: -1;
                opacity: 0.8;
                animation: float 10s ease-in-out infinite;
                pointer-events: none;
            }
            @keyframes float {
                0%, 100% { transform: translateY(0) scale(1); }
                50% { transform: translateY(-20px) scale(1.05); }
            }
        </style>
    </head>
    <body class="antialiased font-['Outfit'] hero-bg text-slate-800 selection:bg-indigo-600 selection:text-white min-h-screen flex flex-col relative overflow-hidden">

        <!-- Background Ornaments -->
        <div class="blob bg-indigo-200/60 w-[600px] h-[600px] rounded-full top-[-20%] left-[-10%] mix-blend-multiply"></div>
        <div class="blob bg-sky-200/60 w-[500px] h-[500px] rounded-full bottom-[-10%] right-[-5%] mix-blend-multiply" style="animation-delay: -5s"></div>
        <div class="fixed inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'20\' height=\'20\' viewBox=\'0 0 20 20\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%239C92AC\' fill-opacity=\'0.05\' fill-rule=\'evenodd\'%3E%3Ccircle cx=\'2\' cy=\'2\' r=\'2\'/%3E%3Cg%3E%3C/svg%3E')] -z-10 pointer-events-none"></div>

        <div class="overflow-y-auto h-screen w-full relative z-10 flex flex-col">
            <!-- Premium Navigation -->
            <nav class="w-full relative z-50 pt-6">
                <div class="max-w-7xl mx-auto px-6 lg:px-8">
                    <div class="glass-panel rounded-2xl px-6 py-4 flex justify-between items-center transition-all hover:shadow-xl">
                        <div class="flex items-center gap-3 group cursor-pointer">
                            <div class="w-11 h-11 bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-[0.9rem] flex items-center justify-center shadow-[0_8px_16px_-6px_rgba(79,70,229,0.5)] group-hover:scale-105 transition-transform duration-300">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            </div>
                            <span class="text-2xl font-black tracking-tight text-slate-800 group-hover:text-indigo-600 transition-colors">Service<span class="text-indigo-600">Hub</span></span>
                        </div>
                        
                        <div class="flex items-center gap-6">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="font-bold text-slate-600 hover:text-indigo-600 transition-colors px-4 py-2">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="font-bold text-[15px] text-slate-500 hover:text-indigo-600 transition-colors">Log In</a>
                                <a href="{{ route('register') }}" class="bg-slate-900 hover:bg-indigo-600 text-white px-7 py-3 rounded-xl font-bold text-[15px] shadow-lg shadow-slate-900/20 hover:shadow-indigo-600/30 hover:-translate-y-0.5 transition-all duration-300">
                                    Get Started
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <main class="flex-grow flex flex-col justify-center relative z-10 pt-16 pb-24">
                <div class="max-w-7xl mx-auto px-6 lg:px-8 w-full">
                    <!-- Hero Section -->
                    <div class="text-center max-w-4xl mx-auto mb-20">
                        <div class="inline-flex items-center gap-2.5 px-5 py-2 glass-panel rounded-full mb-8 transform hover:scale-105 transition-transform cursor-pointer border-white/60">
                            <span class="relative flex h-2.5 w-2.5">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                            </span>
                            <span class="text-[11px] font-black uppercase tracking-widest text-slate-600">Operational Integrity Vetted</span>
                        </div>
                        
                        <h1 class="text-5xl md:text-7xl font-black text-slate-900 leading-[1.05] mb-6 tracking-tight">
                            Precision Home <br/>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-sky-500">Maintenance.</span>
                        </h1>
                        
                        <p class="text-lg md:text-xl text-slate-500 max-w-2xl mx-auto mb-10 leading-relaxed font-medium">
                            Elite-tier domestic service deployment. Secure certified technicians for high-impact infrastructure optimization at your exact coordinates.
                        </p>

                        <div class="flex flex-col sm:flex-row items-center justify-center gap-5">
                            <a href="{{ route('register') }}" class="w-full sm:w-auto bg-indigo-600 text-white px-8 py-4.5 rounded-2xl font-bold text-base shadow-xl shadow-indigo-600/30 hover:bg-indigo-700 hover:shadow-indigo-600/40 hover:-translate-y-1 transition-all flex items-center justify-center gap-2 group">
                                Secure First Deployment
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                            <div class="w-full sm:w-auto flex items-center justify-center gap-4 px-6 py-3.5 glass-panel rounded-2xl border-white/60 hover:shadow-md transition-shadow">
                                <div class="flex -space-x-3">
                                    <img class="w-10 h-10 rounded-full border-[3px] border-white object-cover" src="https://i.pravatar.cc/100?img=1" alt="Avatar">
                                    <img class="w-10 h-10 rounded-full border-[3px] border-white object-cover" src="https://i.pravatar.cc/100?img=2" alt="Avatar">
                                    <div class="w-10 h-10 rounded-full border-[3px] border-white bg-slate-900 text-white flex items-center justify-center text-[10px] font-black tracking-tighter">1k+</div>
                                </div>
                                <span class="text-xs font-black uppercase tracking-wider text-slate-500">Trusted globally</span>
                            </div>
                        </div>
                    </div>

                    <!-- Services Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                        <!-- Connecting Line Background for Desktop (Optional Visual Element) -->
                        <div class="hidden md:block absolute top-[40%] left-10 right-10 h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent -z-10"></div>
                        
                        <!-- Service 1 -->
                        <div class="glass-panel group p-10 rounded-[2rem] hover:-translate-y-2 transition-all duration-300 hover:shadow-2xl hover:shadow-amber-500/10 cursor-pointer relative overflow-hidden bg-white/60">
                            <div class="absolute top-0 right-0 w-40 h-40 bg-amber-100 rounded-bl-full -z-10 opacity-60 group-hover:scale-125 group-hover:bg-amber-200 transition-all duration-500"></div>
                            <div class="w-16 h-16 bg-white shadow-[0_8px_16px_-6px_rgba(0,0,0,0.1)] border border-slate-100 rounded-[1.2rem] flex items-center justify-center text-4xl mb-8 group-hover:scale-110 transition-transform duration-500">⚡</div>
                            <h3 class="text-2xl font-black text-slate-900 mb-3 group-hover:text-amber-500 transition-colors tracking-tight">Power Infra</h3>
                            <p class="text-slate-500 font-medium text-[15px] leading-relaxed mb-8">Advanced electrical diagnostics, unit configuration, and safety hardening.</p>
                            <div class="flex items-center text-sm font-black uppercase tracking-widest text-amber-500 gap-2 group-hover:gap-3 transition-all">
                                Initialize <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </div>
                        </div>

                        <!-- Service 2 -->
                        <div class="glass-panel group p-10 rounded-[2rem] hover:-translate-y-2 transition-all duration-300 hover:shadow-2xl hover:shadow-blue-500/20 cursor-pointer relative overflow-hidden ring-1 ring-slate-800/10 bg-gradient-to-br from-slate-900 to-slate-800 text-white shadow-xl shadow-slate-900/10">
                            <div class="absolute top-0 right-0 w-40 h-40 bg-blue-500/20 rounded-bl-full -z-10 opacity-70 group-hover:scale-125 group-hover:bg-blue-500/30 transition-all duration-500"></div>
                            <div class="w-16 h-16 bg-slate-800 shadow-xl border border-slate-700/50 rounded-[1.2rem] flex items-center justify-center text-4xl mb-8 group-hover:scale-110 transition-transform duration-500">🚰</div>
                            <h3 class="text-2xl font-black text-white mb-3 group-hover:text-blue-400 transition-colors tracking-tight">Hydraulic Flex</h3>
                            <p class="text-slate-400 font-medium text-[15px] leading-relaxed mb-8">System leak mitigation, drainage architecture, and fitting deployments.</p>
                            <div class="flex items-center text-sm font-black uppercase tracking-widest text-blue-400 gap-2 group-hover:gap-3 transition-all">
                                Initialize <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </div>
                        </div>

                        <!-- Service 3 -->
                        <div class="glass-panel group p-10 rounded-[2rem] hover:-translate-y-2 transition-all duration-300 hover:shadow-2xl hover:shadow-purple-500/10 cursor-pointer relative overflow-hidden bg-white/60">
                            <div class="absolute top-0 right-0 w-40 h-40 bg-purple-100 rounded-bl-full -z-10 opacity-60 group-hover:scale-125 group-hover:bg-purple-200 transition-all duration-500"></div>
                            <div class="w-16 h-16 bg-white shadow-[0_8px_16px_-6px_rgba(0,0,0,0.1)] border border-slate-100 rounded-[1.2rem] flex items-center justify-center text-4xl mb-8 group-hover:scale-110 transition-transform duration-500">🔨</div>
                            <h3 class="text-2xl font-black text-slate-900 mb-3 group-hover:text-purple-600 transition-colors tracking-tight">Structure Lab</h3>
                            <p class="text-slate-500 font-medium text-[15px] leading-relaxed mb-8">High-end cabinetry, joinery revisions, and aesthetic wood engineering.</p>
                            <div class="flex items-center text-sm font-black uppercase tracking-widest text-purple-600 gap-2 group-hover:gap-3 transition-all">
                                Initialize <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="mt-auto border-t border-slate-200/60 bg-white/40 backdrop-blur-xl relative z-40 w-full shrink-0">
                <div class="max-w-7xl mx-auto px-6 lg:px-8 py-8 flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-slate-900 rounded-[0.8rem] flex items-center justify-center text-lg grayscale opacity-90 shadow-inner">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </div>
                        <span class="text-sm font-black tracking-tight text-slate-800">ServiceHub <span class="text-slate-400 font-bold">Ops</span></span>
                    </div>
                    <p class="text-[13px] font-bold text-slate-400">
                        &copy; 2026 ServiceHub Systems. All rights reserved.
                    </p>
                    <div class="flex gap-8">
                        <a href="#" class="text-[13px] font-bold text-slate-400 hover:text-indigo-600 transition-colors">Privacy</a>
                        <a href="#" class="text-[13px] font-bold text-slate-400 hover:text-indigo-600 transition-colors">Terms</a>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <h2 class="font-black text-4xl text-slate-900 tracking-tight leading-tight">
                    {{ __('Expert Care Hub') }}
                </h2>
                <p class="text-slate-500 mt-1.5 font-medium italic">High-end domestic services, synchronized for your home.</p>
            </div>
            <a href="{{ route('customer.bookings') }}" class="btn-secondary !rounded-2xl gap-2 shadow-sm hover:shadow-md transition-all">
                <span class="text-lg">📋</span>
                {{ __('My Logistics') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <!-- Hero Promo Section -->
            <div class="glass-card p-10 md:p-16 bg-slate-900 border-none shadow-2xl relative overflow-hidden animate-fade-in group">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 to-transparent opacity-50"></div>
                <!-- Decorative Elements -->
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl group-hover:scale-110 transition-transform duration-1000"></div>
                <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl group-hover:scale-110 transition-transform duration-1000 delay-100"></div>
                
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 items-center gap-12">
                    <div>
                        <div class="inline-flex items-center gap-3 px-4 py-2 bg-indigo-500/10 border border-indigo-500/20 rounded-full mb-6">
                            <span class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse"></span>
                            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-indigo-300">Member Exclusive Upgrade</span>
                        </div>
                        <h3 class="text-4xl md:text-5xl font-black text-white mb-6 leading-tight">Elite Care at<br><span class="text-indigo-400 italic">Unmatched Value.</span></h3>
                        <p class="text-slate-400 text-lg mb-10 leading-relaxed font-medium">
                            Experience the premium tier of home maintenance. Secure 20% efficiency credit for your initial platform session.
                        </p>
                        <div class="flex flex-wrap gap-4 items-center">
                            <div class="px-6 py-3 bg-white/5 border border-white/10 rounded-2xl flex flex-col">
                                <span class="text-[9px] font-black uppercase tracking-widest text-slate-500">Access Key</span>
                                <span class="text-lg font-black text-white font-mono">ELITE20</span>
                            </div>
                            <button class="btn-primary !px-8 !py-4 shadow-indigo-500/20">Secure Credits</button>
                        </div>
                    </div>
                    <div class="hidden lg:flex justify-end">
                        <div class="w-64 h-64 bg-white/5 border border-white/10 rounded-[4rem] flex items-center justify-center text-8xl shadow-2xl rotate-6 group-hover:rotate-0 transition-all duration-700">
                            ✨
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 italic">Strategic Verticals</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-fade-in group/container">
                    @foreach($categories as $category)
                        <div class="glass-card group cursor-pointer hover:!border-indigo-400 !border-slate-50 flex flex-col p-8 transition-all duration-500 hover:shadow-2xl hover:shadow-indigo-100/50" onclick="window.location='{{ route('customer.category', $category) }}'">
                            <div class="flex items-start justify-between mb-8">
                                <div class="w-16 h-16 bg-slate-50 group-hover:bg-indigo-600 rounded-2xl flex items-center justify-center text-4xl shadow-inner group-hover:scale-110 group-hover:-rotate-6 transition-all duration-500">
                                    <span class="group-hover:filter-none">
                                        @if($category->name == 'Electrician') ⚡ 
                                        @elseif($category->name == 'Plumber') 🚰 
                                        @elseif($category->name == 'Carpenter') 🔨 
                                        @else 🛠️ 
                                        @endif
                                    </span>
                                </div>
                                <div class="text-right">
                                    <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Efficiency Pool</span>
                                    <p class="text-indigo-600 font-black text-sm">{{ $category->sub_services_count ?? 0 }} Units</p>
                                </div>
                            </div>
                            
                            <h4 class="text-2xl font-black text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors">
                                {{ $category->name }}
                            </h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-8 italic">
                                Precision-engineered {{ strtolower($category->name) }} solutions for premium infrastructure maintenance.
                            </p>
                            
                            <div class="mt-auto flex items-center text-indigo-600 text-[10px] font-black uppercase tracking-widest gap-2 group-hover:gap-4 transition-all">
                                Deploy Request <span class="text-xl">⇀</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

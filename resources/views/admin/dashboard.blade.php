<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="flex items-center gap-6">
                <div class="w-14 h-14 bg-slate-900 rounded-2xl flex items-center justify-center shadow-2xl relative overflow-hidden group hover:rotate-6 transition-transform">
                    <span class="text-white text-2xl relative z-10">🎮</span>
                    <div class="absolute inset-0 bg-indigo-600 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </div>
                <div>
                    <h2 class="font-black text-4xl text-slate-900 tracking-tight leading-tight">
                        {{ __('Control Terminal') }}
                    </h2>
                    <p class="text-slate-500 mt-1.5 font-medium italic">High-level overview of platform operations, unit health, and strategic deployments.</p>
                </div>
            </div>
            <div class="flex items-center gap-4 px-6 py-3 bg-white rounded-2xl shadow-sm border border-slate-100">
                <span class="flex h-3 w-3 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500 shadow-[0_0_10px_rgba(34,197,94,0.5)]"></span>
                </span>
                <span class="text-[10px] font-black uppercase tracking-[0.2rem] text-slate-500 italic">Core Systems Live</span>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 animate-fade-in">
                <!-- Stat 1 -->
                <div class="glass-card group p-10 border-none bg-white hover:bg-slate-900 hover:text-white transition-all duration-700 cursor-pointer shadow-2xl relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 text-7xl opacity-[0.03] group-hover:opacity-10 group-hover:scale-125 transition-all duration-700 font-black italic">VET</div>
                    <div class="relative z-10 flex flex-col h-full justify-between">
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 group-hover:text-indigo-400 mb-2 italic">Gatekeeper</p>
                            <h4 class="text-5xl font-black tracking-tighter leading-none mb-1">{{ $pendingProviders }}</h4>
                            <p class="text-xs font-bold text-slate-500 group-hover:text-slate-400 italic">Pending Vetting</p>
                        </div>
                        <div class="mt-10 flex items-center justify-between">
                            <a href="{{ route('admin.providers') }}" class="text-indigo-600 group-hover:text-white text-[10px] font-black uppercase tracking-widest hover:gap-3 transition-all flex items-center gap-2">Initialize Review ⇀</a>
                            <div class="w-10 h-10 bg-indigo-50 group-hover:bg-white/10 rounded-xl flex items-center justify-center text-xl shadow-inner group-hover:scale-110 transition-transform">👤</div>
                        </div>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="glass-card group p-10 border-none bg-white hover:bg-slate-900 hover:text-white transition-all duration-700 cursor-pointer shadow-2xl relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 text-7xl opacity-[0.03] group-hover:opacity-10 group-hover:scale-125 transition-all duration-700 font-black italic">TRAF</div>
                    <div class="relative z-10 flex flex-col h-full justify-between">
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 group-hover:text-emerald-400 mb-2 italic">Traffic Flow</p>
                            <h4 class="text-5xl font-black tracking-tighter leading-none mb-1">{{ $totalBookings }}</h4>
                            <p class="text-xs font-bold text-slate-500 group-hover:text-slate-400 italic">Total Requests</p>
                        </div>
                        <div class="mt-10 flex items-center justify-between">
                            <a href="{{ route('admin.bookings') }}" class="text-emerald-600 group-hover:text-white text-[10px] font-black uppercase tracking-widest hover:gap-3 transition-all flex items-center gap-2">Audit Schedule ⇀</a>
                            <div class="w-10 h-10 bg-emerald-50 group-hover:bg-white/10 rounded-xl flex items-center justify-center text-xl shadow-inner group-hover:scale-110 transition-transform">📅</div>
                        </div>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="glass-card group p-10 border-none bg-white hover:bg-slate-900 hover:text-white transition-all duration-700 cursor-pointer shadow-2xl relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 text-7xl opacity-[0.03] group-hover:opacity-10 group-hover:scale-125 transition-all duration-700 font-black italic">INFRA</div>
                    <div class="relative z-10 flex flex-col h-full justify-between">
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 group-hover:text-amber-400 mb-2 italic">Architecture</p>
                            <h4 class="text-5xl font-black tracking-tighter leading-none mb-1">{{ $totalCategories }}</h4>
                            <p class="text-xs font-bold text-slate-500 group-hover:text-slate-400 italic">Core Segments</p>
                        </div>
                        <div class="mt-10 flex items-center justify-between">
                            <a href="{{ route('admin.categories.index') }}" class="text-amber-600 group-hover:text-white text-[10px] font-black uppercase tracking-widest hover:gap-3 transition-all flex items-center gap-2">Shift Segments ⇀</a>
                            <div class="w-10 h-10 bg-amber-50 group-hover:bg-white/10 rounded-xl flex items-center justify-center text-xl shadow-inner group-hover:scale-110 transition-transform">🏗️</div>
                        </div>
                    </div>
                </div>

                <!-- Stat 4 -->
                <div class="glass-card group p-10 border-none bg-white hover:bg-slate-900 hover:text-white transition-all duration-700 cursor-pointer shadow-2xl relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 text-7xl opacity-[0.03] group-hover:opacity-10 group-hover:scale-125 transition-all duration-700 font-black italic">BOOT</div>
                    <div class="relative z-10 flex flex-col h-full justify-between">
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 group-hover:text-violet-400 mb-2 italic">Inventory</p>
                            <h4 class="text-5xl font-black tracking-tighter leading-none mb-1">{{ $totalSubServices }}</h4>
                            <p class="text-xs font-bold text-slate-500 group-hover:text-slate-400 italic">Active Units</p>
                        </div>
                        <div class="mt-10 flex items-center justify-between">
                            <a href="{{ route('admin.sub-services.index') }}" class="text-violet-600 group-hover:text-white text-[10px] font-black uppercase tracking-widest hover:gap-3 transition-all flex items-center gap-2">Modify Catalog ⇀</a>
                            <div class="w-10 h-10 bg-violet-50 group-hover:bg-white/10 rounded-xl flex items-center justify-center text-xl shadow-inner group-hover:scale-110 transition-transform">⚙️</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Strategic Zone -->
            <div class="glass-card p-12 md:p-16 border-none shadow-2xl bg-white/80 animate-fade-in delay-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-12 opacity-5 select-none pointer-events-none text-[15rem] font-black leading-none italic">ZONE</div>
                
                <div class="relative z-10">
                    <div class="mb-16">
                        <div class="flex items-center gap-5 mb-3">
                            <div class="w-14 h-14 bg-slate-900 rounded-[1.2rem] flex items-center justify-center text-white shadow-2xl rotate-3">
                                <span class="text-2xl">🛠️</span>
                            </div>
                            <h3 class="text-4xl font-[900] text-slate-900 tracking-tight leading-none">Strategic Management Zone</h3>
                        </div>
                        <p class="text-lg text-slate-500 font-bold italic">Central command for platform architecture and specialist verification protocol.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                        <a href="{{ route('admin.categories.index') }}" class="group p-10 bg-white border border-slate-100 rounded-[2.5rem] hover:bg-slate-900 hover:text-white hover:scale-105 transition-all duration-500 shadow-xl hover:shadow-indigo-900/50">
                            <div class="w-16 h-16 bg-slate-50 group-hover:bg-white/10 rounded-2xl flex items-center justify-center text-4xl mb-10 shadow-inner group-hover:rotate-6 transition-all duration-500">🏗️</div>
                            <h4 class="font-black text-2xl mb-3 tracking-tight group-hover:italic italic">Structural Pillar</h4>
                            <p class="text-sm text-slate-500 group-hover:text-slate-400 leading-relaxed font-bold italic">Define the foundational vertical structure and core market segments for the hub.</p>
                            <div class="mt-10 flex items-center text-indigo-600 group-hover:text-indigo-400 text-[10px] font-black uppercase tracking-[0.2em] group-hover:translate-x-3 transition-transform italic">Initialize Segment ⇀</div>
                        </a>
                        
                        <a href="{{ route('admin.sub-services.index') }}" class="group p-10 bg-white border border-slate-100 rounded-[2.5rem] hover:bg-slate-900 hover:text-white hover:scale-105 transition-all duration-500 shadow-xl hover:shadow-violet-900/50">
                            <div class="w-16 h-16 bg-slate-50 group-hover:bg-white/10 rounded-2xl flex items-center justify-center text-4xl mb-10 shadow-inner group-hover:rotate-6 transition-all duration-500">📋</div>
                            <h4 class="font-black text-2xl mb-3 tracking-tight group-hover:italic italic">Module Inventory</h4>
                            <p class="text-sm text-slate-500 group-hover:text-slate-400 leading-relaxed font-bold italic">Fine-tune individual service modules, competitive pricing, and technical descriptions.</p>
                            <div class="mt-10 flex items-center text-violet-600 group-hover:text-violet-400 text-[10px] font-black uppercase tracking-[0.2em] group-hover:translate-x-3 transition-transform italic">Configure Units ⇀</div>
                        </a>

                        <a href="{{ route('admin.providers') }}" class="group p-10 bg-white border border-slate-100 rounded-[2.5rem] hover:bg-slate-900 hover:text-white hover:scale-105 transition-all duration-500 shadow-xl hover:shadow-emerald-900/50">
                            <div class="w-16 h-16 bg-slate-50 group-hover:bg-white/10 rounded-2xl flex items-center justify-center text-4xl mb-10 shadow-inner group-hover:rotate-6 transition-all duration-500">🛡️</div>
                            <h4 class="font-black text-2xl mb-3 tracking-tight group-hover:italic italic">Integrity Vetting</h4>
                            <p class="text-sm text-slate-500 group-hover:text-slate-400 leading-relaxed font-bold italic">Vet entering talent nodes and maintain the network standard through rigorous verification.</p>
                            <div class="mt-10 flex items-center text-emerald-600 group-hover:text-emerald-400 text-[10px] font-black uppercase tracking-[0.2em] group-hover:translate-x-3 transition-transform italic">Security Review ⇀</div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Operations Stream -->
            <div class="space-y-8 animate-fade-in delay-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-2xl shadow-inner group-hover:rotate-12 transition-transform">⚡</div>
                        <h3 class="text-2xl font-black text-slate-900 tracking-tight leading-none italic uppercase tracking-tighter">Operational Real-Time Stream</h3>
                    </div>
                    <a href="{{ route('admin.bookings') }}" class="text-indigo-600 text-[10px] font-black uppercase tracking-widest hover:gap-3 transition-all flex items-center gap-2 italic">Full Audit Ledger ⇀</a>
                </div>

                <div class="glass-card overflow-hidden border-none shadow-2xl bg-white/80 backdrop-blur-md">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-indigo-600 text-white uppercase text-[8px] font-black tracking-[0.3em]">
                                    <th class="px-10 py-6">Signal ID</th>
                                    <th class="px-10 py-6">Operation</th>
                                    <th class="px-10 py-6">Participants</th>
                                    <th class="px-10 py-6 text-right">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($recentBookings as $booking)
                                    <tr class="group hover:bg-slate-50/50 transition-colors">
                                        <td class="px-10 py-8">
                                            <span class="font-black text-slate-300 text-[10px] tracking-widest italic group-hover:text-indigo-400 transition-colors">#DE-{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}</span>
                                        </td>
                                        <td class="px-10 py-8">
                                            <p class="font-black text-slate-900 text-base leading-none mb-1">{{ $booking->subService->name }}</p>
                                            <p class="text-[9px] text-indigo-500 font-bold uppercase tracking-wider italic">{{ $booking->subService->category->name }}</p>
                                        </td>
                                        <td class="px-10 py-8">
                                            <div class="flex flex-col gap-1.5">
                                                <p class="text-xs font-black text-slate-800 flex items-center gap-2">
                                                    <span class="w-1.5 h-1.5 bg-slate-300 rounded-full"></span>
                                                    {{ $booking->customer->name }}
                                                </p>
                                                @if($booking->provider)
                                                    <p class="text-[10px] font-bold text-slate-500 flex items-center gap-2 italic">
                                                        <span class="w-1.5 h-1.5 bg-indigo-400 rounded-full"></span>
                                                        {{ $booking->provider->name }}
                                                    </p>
                                                @else
                                                    <span class="text-[9px] font-black uppercase text-amber-500 animate-pulse italic">Awaiting Asset...</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-10 py-8 text-right">
                                            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-xl text-[9px] font-black uppercase tracking-widest
                                                @if($booking->status == 'pending') bg-amber-50 text-amber-600
                                                @elseif($booking->status == 'accepted') bg-indigo-50 text-indigo-600
                                                @elseif($booking->status == 'completed') bg-emerald-50 text-emerald-600
                                                @else bg-slate-50 text-slate-600 @endif">
                                                <span class="w-1.5 h-1.5 rounded-full
                                                    @if($booking->status == 'pending') bg-amber-400 animate-pulse
                                                    @elseif($booking->status == 'accepted') bg-indigo-400
                                                    @elseif($booking->status == 'completed') bg-emerald-400
                                                    @else bg-slate-400 @endif"></span>
                                                {{ $booking->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-10 py-20 text-center font-bold text-slate-400 italic">No operational data detected in recent stream. Hub stands ready.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col md:flex-row gap-8 animate-fade-in delay-200">
                <div class="flex-1 glass-card p-12 border-none bg-slate-900 text-white flex items-center justify-between overflow-hidden relative group">
                    <div class="relative z-10">
                        <p class="text-[10px] font-black uppercase tracking-[0.2em] text-indigo-400 mb-2 italic">Global Operations Integrity</p>
                        <h4 class="text-3xl font-black leading-none italic">System Shield: ACTIVE</h4>
                        <p class="text-xs text-slate-400 mt-4 italic font-medium leading-relaxed max-w-sm">All operational data streams and participant nodes are encrypted under Tier-1 security protocols.</p>
                    </div>
                    <div class="text-9xl opacity-5 rotate-12 absolute -right-4 top-1/2 -translate-y-1/2 group-hover:scale-110 transition-transform duration-700">🛡️</div>
                </div>
                <div class="md:w-1/3 glass-card p-12 border-none bg-indigo-600 text-white flex items-center gap-8 overflow-hidden relative group cursor-default">
                    <div class="relative z-10">
                        <p class="text-[10px] font-black uppercase tracking-[0.2em] text-indigo-200 mb-3 italic">Command Protocol</p>
                        <p class="text-xl font-black leading-tight italic">"Precision is the foundation of structural excellence."</p>
                    </div>
                    <div class="text-8xl opacity-20 absolute -right-4 -bottom-4 group-hover:rotate-12 transition-transform duration-700">✨</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

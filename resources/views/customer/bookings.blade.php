<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="flex items-center gap-6">
                <a href="{{ route('customer.dashboard') }}" class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm hover:shadow-indigo-100 hover:scale-105 transition-all border border-slate-100 group">
                    <span class="text-xl group-hover:-translate-x-1 transition-transform">↼</span>
                </a>
                <div>
                    <h2 class="font-black text-4xl text-slate-900 tracking-tight leading-tight">
                        {{ __('Logistic Ledger') }}
                    </h2>
                    <p class="text-slate-500 font-medium italic mt-1">Track your active deployments and service history.</p>
                </div>
            </div>
            <a href="{{ route('customer.dashboard') }}" class="btn-primary !rounded-2xl gap-2 shadow-indigo-100 hover:shadow-indigo-200">
                <span class="text-lg">⊕</span>
                {{ __('Secure New Session') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            @if(session('success'))
                <div class="p-5 bg-indigo-50 border-l-4 border-indigo-600 text-indigo-700 animate-fade-in rounded-r-2xl shadow-sm flex items-center gap-4">
                    <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center text-white shadow-lg">✓</div>
                    <span class="font-black italic text-sm">{{ session('success') }}</span>
                </div>
            @endif

            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Activity Registry</h3>
                    <div class="h-px bg-slate-100 flex-grow mx-8"></div>
                </div>

                <div class="grid grid-cols-1 gap-8 animate-fade-in">
                    @forelse($bookings as $booking)
                        <div class="glass-card group overflow-hidden border-none shadow-2xl hover:shadow-indigo-100/50 transition-all duration-500 bg-white/80">
                            <div class="flex flex-col lg:flex-row">
                                <!-- Status Sidebar Indicator -->
                                <div class="w-full lg:w-3 
                                    @if($booking->status == 'pending') bg-amber-400 
                                    @elseif($booking->status == 'accepted') bg-indigo-500 
                                    @elseif($booking->status == 'completed') bg-emerald-500 
                                    @else bg-slate-300 @endif">
                                </div>
                                
                                <div class="flex-grow p-10 md:p-12">
                                    <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-10">
                                        <div class="flex items-start gap-8">
                                            <div class="w-20 h-20 bg-slate-50 rounded-[2.5rem] flex items-center justify-center text-4xl shadow-inner group-hover:scale-110 group-hover:-rotate-6 transition-all duration-500">
                                                @if($booking->subService->category->name == 'Electrician') ⚡ 
                                                @elseif($booking->subService->category->name == 'Plumber') 🚰 
                                                @elseif($booking->subService->category->name == 'Carpenter') 🔨 
                                                @else ⚙️ @endif
                                            </div>
                                            <div>
                                                <div class="flex items-center gap-4 mb-2">
                                                    <h4 class="font-black text-3xl text-slate-900 leading-tight group-hover:text-indigo-600 transition-colors">{{ $booking->subService->name }}</h4>
                                                    <span class="px-3 py-1 bg-white border border-slate-100 rounded-xl text-[10px] font-black uppercase tracking-[0.1em] text-slate-400 shadow-sm">
                                                        #LOG-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}
                                                    </span>
                                                </div>
                                                <p class="text-slate-500 text-base font-bold italic">{{ $booking->subService->category->name }} Infrastructure Segment</p>
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap items-center gap-10 xl:gap-14">
                                            <div class="text-left xl:text-right min-w-[120px]">
                                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2">Status Protocol</p>
                                                <span class="inline-flex items-center gap-2.5 px-5 py-2 rounded-2xl text-[11px] font-black uppercase tracking-widest shadow-sm
                                                    @if($booking->status == 'pending') bg-amber-50 text-amber-600 border border-amber-100
                                                    @elseif($booking->status == 'accepted') bg-indigo-50 text-indigo-600 border border-indigo-100
                                                    @elseif($booking->status == 'completed') bg-emerald-50 text-emerald-600 border border-emerald-100
                                                    @else bg-slate-50 text-slate-600 border border-slate-100 @endif">
                                                    <span class="w-2 h-2 rounded-full animate-pulse
                                                        @if($booking->status == 'pending') bg-amber-400
                                                        @elseif($booking->status == 'accepted') bg-indigo-400
                                                        @elseif($booking->status == 'completed') bg-emerald-400
                                                        @else bg-slate-400 @endif"></span>
                                                    {{ $booking->status }}
                                                </span>
                                            </div>
                                            
                                            <div class="hidden xl:block h-12 w-px bg-slate-100"></div>
                                            
                                            <div class="text-left xl:text-right min-w-[120px]">
                                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-2">Unit Value</p>
                                                <div class="flex items-center gap-1.5 xl:justify-end">
                                                    <span class="text-sm font-bold text-slate-400">₹</span>
                                                    <span class="text-3xl font-black text-slate-900 group-hover:text-indigo-600 transition-colors leading-none">{{ number_format($booking->subService->price, 0) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-10 pt-10 border-t border-slate-50">
                                        <div class="flex items-center gap-5">
                                            <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 text-xl italic shadow-inner">📅</div>
                                            <div>
                                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-0.5">Sync Schedule</p>
                                                <p class="text-[15px] font-black text-slate-800">{{ \Carbon\Carbon::parse($booking->booking_date)->format('D, M d, Y') }}</p>
                                                <p class="text-xs font-bold text-slate-400 mt-0.5 italic">{{ \Carbon\Carbon::parse($booking->booking_time)->format('g:i A') }}</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center gap-5">
                                            <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 text-xl italic shadow-inner">📍</div>
                                            <div class="flex-grow min-w-0">
                                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-0.5">Deployment Node</p>
                                                <p class="text-[15px] font-black text-slate-800 truncate">{{ $booking->address }}</p>
                                                <p class="text-xs font-bold text-slate-400 mt-0.5 italic">Verified Location</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-5">
                                            <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 text-xl italic shadow-inner">🛡️</div>
                                            <div>
                                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-0.5">Assigned Expert</p>
                                                @if($booking->provider)
                                                    <div class="flex items-center gap-2">
                                                        <span class="text-[15px] font-black text-slate-800">{{ $booking->provider->name }}</span>
                                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                                    </div>
                                                    <p class="text-xs font-bold text-indigo-400 mt-0.5 italic">Certified Specialist</p>
                                                @else
                                                    <p class="text-[15px] font-black text-amber-500 animate-pulse">Pending Sync...</p>
                                                    <p class="text-xs font-bold text-slate-400 mt-0.5 italic">Search in progress</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-40 animate-fade-in bg-slate-50/20 rounded-[4rem] border-2 border-dashed border-slate-100">
                            <div class="w-32 h-32 bg-white border border-slate-100 rounded-[2.5rem] flex items-center justify-center text-6xl shadow-2xl mx-auto mb-10 group hover:rotate-12 transition-transform duration-500">
                                📑
                            </div>
                            <h3 class="text-4xl font-black text-slate-900 mb-3">Archive Empty</h3>
                            <p class="text-slate-500 font-bold text-lg max-w-sm mx-auto italic mb-12">No logistic activity detected. Initialize your first service module to populate the ledger.</p>
                            <a href="{{ route('customer.dashboard') }}" class="btn-primary !px-12 !py-5 !text-[13px] !font-black uppercase tracking-widest shadow-indigo-200">Initialize Operational Session</a>
                        </div>
                    @endforelse
                </div>
            </div>
            
            @if(!$bookings->isEmpty())
                <div class="flex items-center justify-between p-10 glass-card bg-slate-900 text-white border-none shadow-2xl">
                    <div class="flex items-center gap-6">
                        <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center text-3xl">📊</div>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Fleet Utilization</p>
                            <p class="text-2xl font-black">{{ $bookings->count() }} Managed Interactions</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 italic">Security Guard</p>
                        <p class="text-sm font-bold text-green-400 flex items-center gap-2 justify-end">
                            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                            Encrypted Ledger
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

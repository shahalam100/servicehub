<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <h2 class="font-black text-4xl text-slate-900 tracking-tight leading-tight">
                    {{ __('Mission Control') }}
                </h2>
                <p class="text-slate-500 mt-1.5 font-medium italic">Synchronized stream of incoming service requests and active operations.</p>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('provider.services') }}" class="btn-secondary !rounded-2xl gap-2 shadow-sm hover:shadow-md transition-all">
                    <span class="text-lg">🛠️</span>
                    {{ __('Asset Config') }}
                </a>
                <a href="{{ route('provider.history') }}" class="btn-secondary !rounded-2xl gap-2 shadow-sm hover:shadow-md transition-all">
                    <span class="text-lg">📜</span>
                    {{ __('Mission Logs') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            @if(session('success'))
                <div class="p-5 bg-emerald-50 border-l-4 border-emerald-600 text-emerald-700 animate-fade-in rounded-r-2xl shadow-sm flex items-center gap-4">
                    <div class="w-8 h-8 bg-emerald-600 rounded-full flex items-center justify-center text-white shadow-lg">✓</div>
                    <span class="font-black italic text-sm">{{ session('success') }}</span>
                </div>
            @endif

            <!-- New Requests -->
            <section class="animate-fade-in">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center text-2xl shadow-inner group-hover:rotate-12 transition-transform">🔔</div>
                        <h3 class="text-2xl font-black text-slate-900 tracking-tight">Incoming Opportunities</h3>
                    </div>
                    <div class="h-px bg-slate-100 flex-grow mx-8 hidden md:block"></div>
                    <span class="text-xs font-black uppercase tracking-widest text-slate-400 italic">{{ $pendingBookings->count() }} detected</span>
                </div>
                
                @if($pendingBookings->isEmpty())
                    <div class="glass-card p-20 text-center border-none shadow-xl bg-slate-50/50">
                        <div class="text-6xl mb-6">🛰️</div>
                        <p class="text-slate-500 font-bold italic text-lg max-w-md mx-auto leading-relaxed">System scan complete. No external requests detected in your operational sector.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($pendingBookings as $booking)
                            <div class="glass-card group !border-none shadow-2xl hover:shadow-indigo-100/50 transition-all duration-500 bg-white p-8 overflow-hidden relative">
                                <div class="absolute top-0 right-0 p-4 opacity-5 pointer-events-none text-6xl font-black">SYNC</div>
                                
                                <div class="relative z-10">
                                    <div class="flex justify-between items-start mb-8">
                                        <div>
                                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-indigo-400 mb-1">Target Module</p>
                                            <h4 class="text-2xl font-black text-slate-900 leading-tight">{{ $booking->subService->name }}</h4>
                                        </div>
                                        <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-2xl shadow-inner group-hover:scale-110 transition-transform">
                                            @if($booking->subService->category->name == 'Electrician') ⚡ 
                                            @elseif($booking->subService->category->name == 'Plumber') 🚰 
                                            @elseif($booking->subService->category->name == 'Carpenter') 🔨 
                                            @else ⚙️ @endif
                                        </div>
                                    </div>

                                    <div class="space-y-6 mb-10">
                                        <div class="flex items-center gap-4">
                                            <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-slate-400 text-sm italic shadow-inner">👤</div>
                                            <div>
                                                <p class="text-[9px] font-black uppercase tracking-widest text-slate-400">Endpoint Entity</p>
                                                <p class="text-sm font-black text-slate-800">{{ $booking->customer->name }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-slate-400 text-sm italic shadow-inner">📍</div>
                                            <div class="min-w-0 flex-grow">
                                                <p class="text-[9px] font-black uppercase tracking-widest text-slate-400">Node Location</p>
                                                <p class="text-sm font-black text-slate-800 truncate italic">"{{ $booking->address }}"</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-slate-400 text-sm italic shadow-inner">🕒</div>
                                            <div>
                                                <p class="text-[9px] font-black uppercase tracking-widest text-slate-400">Execution Window</p>
                                                <p class="text-sm font-black text-slate-800">{{ \Carbon\Carbon::parse($booking->booking_date)->format('M d') }} at {{ \Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col gap-3 pt-6 border-t border-slate-50">
                                        <form action="{{ route('provider.booking.status', $booking) }}" method="POST" class="w-full">
                                            @csrf
                                            <input type="hidden" name="status" value="accepted">
                                            <button type="submit" class="w-full btn-primary !py-4 font-black uppercase tracking-widest !text-[10px] shadow-indigo-100 hover:shadow-indigo-200">Initialize Mission</button>
                                        </form>
                                        <form action="{{ route('provider.booking.status', $booking) }}" method="POST" class="w-full">
                                            @csrf
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="submit" class="w-full btn-secondary !py-4 font-black uppercase tracking-widest !text-[10px] !text-slate-400 !border-slate-100 hover:!bg-slate-50">Decline Protocol</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>

            <!-- Active Jobs -->
            <section class="animate-fade-in delay-200">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-2xl shadow-inner group-hover:rotate-12 transition-transform">🚀</div>
                        <h3 class="text-2xl font-black text-slate-900 tracking-tight">Active Operations</h3>
                    </div>
                </div>

                <div class="glass-card overflow-hidden border-none shadow-2xl bg-white/80">
                    @if($myJobs->isEmpty())
                        <div class="p-20 text-center text-slate-400 font-bold italic">No active missions in current cycle. Stay synchronized for new deployments.</div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead>
                                    <tr class="bg-slate-900 text-white uppercase text-[9px] font-black tracking-[0.2em]">
                                        <th class="px-10 py-6">Operation Module</th>
                                        <th class="px-10 py-6">Client & Coordinates</th>
                                        <th class="px-10 py-6">Mission Status</th>
                                        <th class="px-10 py-6 text-right">Command</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    @foreach($myJobs as $job)
                                        <tr class="group hover:bg-slate-50/50 transition-colors">
                                            <td class="px-10 py-8">
                                                <p class="font-black text-slate-900 text-lg group-hover:text-indigo-600 transition-colors leading-none mb-2">{{ $job->subService->name }}</p>
                                                <p class="text-[10px] text-slate-400 font-black uppercase tracking-widest flex items-center gap-2">
                                                    <span class="w-1.5 h-1.5 bg-indigo-500 rounded-full animate-pulse"></span>
                                                    {{ \Carbon\Carbon::parse($job->booking_date)->format('M d, Y') }}
                                                </p>
                                            </td>
                                            <td class="px-10 py-8">
                                                <p class="font-black text-slate-800 text-sm mb-1.5">{{ $job->customer->name }} <span class="text-slate-400 font-medium italic">({{ $job->customer->phone }})</span></p>
                                                <p class="text-[11px] text-slate-500 italic truncate max-w-xs font-medium">"{{ $job->address }}"</p>
                                            </td>
                                            <td class="px-10 py-8">
                                                <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-indigo-50 text-indigo-600 rounded-xl text-[9px] font-black uppercase tracking-[0.2em] border border-indigo-100 shadow-sm">
                                                    <span class="w-1.5 h-1.5 bg-indigo-600 rounded-full animate-ping"></span>
                                                    Live Session
                                                </span>
                                            </td>
                                            <td class="px-10 py-8 text-right">
                                                <form action="{{ route('provider.booking.status', $job) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="status" value="completed">
                                                    <button type="submit" class="bg-emerald-600 text-white px-6 py-2.5 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-700 hover:scale-105 transition-all shadow-emerald-100/50 shadow-lg">
                                                        Complete Mission
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </div>
</x-app-layout>

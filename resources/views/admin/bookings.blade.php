<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="flex items-center gap-6">
                <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-slate-100">
                    <span class="text-2xl">📊</span>
                </div>
                <div>
                    <h2 class="font-black text-4xl text-slate-900 tracking-tight leading-tight">
                        {{ __('Audit Schedule') }}
                    </h2>
                    <p class="text-slate-500 mt-1.5 font-medium italic">Global synchronized ledger of all service interactions and system fulfillments.</p>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="glass-card !p-5 !px-8 bg-slate-900 !border-none flex items-center gap-5 text-white shadow-2xl">
                    <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center text-2xl">📜</div>
                    <div>
                        <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest leading-none mb-1">Total Volume</p>
                        <p class="text-3xl font-black leading-none">{{ $bookings->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 italic">Central Transaction Repository</h3>
                    <div class="h-px bg-slate-100 flex-grow mx-8"></div>
                </div>

                <div class="glass-card border-none shadow-2xl overflow-hidden animate-fade-in bg-white/80 backdrop-blur-md">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-slate-900 text-white uppercase text-[9px] font-black tracking-[0.2em]">
                                    <th class="px-10 py-6">Interaction ID</th>
                                    <th class="px-10 py-6">Operation Module</th>
                                    <th class="px-10 py-6">Participants</th>
                                    <th class="px-10 py-6">Sync Window</th>
                                    <th class="px-10 py-6 text-right">Mission Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach($bookings as $booking)
                                    <tr class="group hover:bg-slate-50/50 transition-all duration-300">
                                        <td class="px-10 py-8">
                                            <span class="font-black text-slate-300 text-[11px] tracking-[0.25em] group-hover:text-indigo-400 transition-colors italic">#LOG-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</span>
                                        </td>
                                        <td class="px-10 py-8">
                                            <p class="font-black text-slate-900 text-xl group-hover:text-indigo-600 transition-colors leading-none mb-2">{{ $booking->subService->name }}</p>
                                            <p class="text-[10px] text-indigo-500 font-black uppercase tracking-[0.2em] italic">{{ $booking->subService->category->name }} INFRA</p>
                                        </td>
                                        <td class="px-10 py-8">
                                            <div class="flex flex-col gap-4">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center text-[10px] text-slate-400 italic font-black">C</div>
                                                    <span class="text-sm font-black text-slate-800">{{ $booking->customer->name }}</span>
                                                </div>
                                                <div class="flex items-center gap-3">
                                                    <div class="w-8 h-8 bg-indigo-50 rounded-lg flex items-center justify-center text-[10px] text-indigo-400 italic font-black shadow-inner">E</div>
                                                    @if($booking->provider)
                                                        <span class="text-sm font-bold text-slate-500 italic">{{ $booking->provider->name }}</span>
                                                    @else
                                                        <span class="text-[10px] font-black uppercase tracking-widest text-amber-500 animate-pulse italic">Searching Assets...</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-10 py-8">
                                            <div class="space-y-1.5">
                                                <p class="text-sm font-black text-slate-800 tracking-tight">{{ \Carbon\Carbon::parse($booking->booking_date)->format('D, M d, Y') }}</p>
                                                <div class="flex items-center gap-2">
                                                    <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                                                    <p class="text-[10px] font-black text-slate-400 italic tracking-[0.1em]">{{ \Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }} SYNC</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-10 py-8 text-right">
                                            <span class="inline-flex items-center gap-2.5 px-6 py-2.5 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] shadow-sm border
                                                @if($booking->status == 'pending') bg-amber-50 text-amber-600 border-amber-100
                                                @elseif($booking->status == 'accepted') bg-indigo-50 text-indigo-600 border-indigo-100
                                                @elseif($booking->status == 'completed') bg-emerald-50 text-emerald-600 border-emerald-100
                                                @else bg-slate-50 text-slate-600 border-slate-100 @endif">
                                                <span class="w-2 h-2 rounded-full
                                                    @if($booking->status == 'pending') bg-amber-400 animate-pulse shadow-[0_0_8px_rgba(251,191,36,0.5)]
                                                    @elseif($booking->status == 'accepted') bg-indigo-400 animate-ping
                                                    @elseif($booking->status == 'completed') bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.5)]
                                                    @else bg-slate-400 @endif"></span>
                                                {{ $booking->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    @if($bookings->isEmpty())
                        <div class="p-32 text-center bg-slate-50/20">
                            <div class="w-32 h-32 bg-white border border-slate-100 rounded-[3rem] flex items-center justify-center text-6xl shadow-2xl mx-auto mb-10 group hover:rotate-12 transition-transform duration-500">
                                📑
                            </div>
                            <h3 class="text-4xl font-black text-slate-900 mb-4 tracking-tight">Ledger Inactive</h3>
                            <p class="text-slate-500 font-bold text-lg max-w-sm mx-auto italic leading-relaxed">System is awaiting initial customer interactions. Transaction streams will populate this node in real-time.</p>
                        </div>
                    @endif
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 animate-fade-in delay-200">
                    <div class="glass-card p-10 border-none bg-slate-900 text-white relative overflow-hidden group">
                        <div class="relative z-10">
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 mb-2">Global Health</p>
                            <h4 class="text-4xl font-black leading-none italic">98.2%</h4>
                            <p class="text-xs text-slate-400 mt-4 italic font-medium leading-relaxed">System Infrastructure Fulfillment Rate across all operational sectors.</p>
                        </div>
                        <div class="absolute -right-4 -bottom-4 text-9xl opacity-5 group-hover:scale-125 transition-transform duration-700">📈</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

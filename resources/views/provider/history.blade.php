<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="flex items-center gap-6">
                <a href="{{ route('provider.dashboard') }}" class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm hover:shadow-indigo-100 hover:scale-105 transition-all border border-slate-100 group">
                    <span class="text-xl group-hover:-translate-x-1 transition-transform">↼</span>
                </a>
                <div>
                    <h2 class="font-black text-4xl text-slate-900 tracking-tight leading-tight">
                        {{ __('Mission Logs') }}
                    </h2>
                    <p class="text-slate-500 mt-1.5 font-medium italic">Comprehensive archive of synchronized service deployments and revenue generation.</p>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="glass-card !p-4 !px-6 bg-emerald-600 !border-none !flex-row items-center gap-4 text-white shadow-2xl">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center text-xl">💰</div>
                    <div>
                        <p class="text-[9px] font-black text-emerald-100 uppercase tracking-widest leading-none mb-1">CUMULATIVE EARNINGS</p>
                        <p class="text-2xl font-black leading-none">₹{{ number_format($jobs->sum('subService.price'), 0) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 italic">Historical Activity Ledger</h3>
                    <div class="h-px bg-slate-100 flex-grow mx-8"></div>
                </div>

                <div class="glass-card overflow-hidden border-none shadow-2xl bg-white/80 animate-fade-in">
                    @if($jobs->isEmpty())
                        <div class="p-24 text-center">
                            <div class="w-24 h-24 bg-slate-50 border border-slate-100 rounded-[2.5rem] flex items-center justify-center text-5xl shadow-xl mx-auto mb-10 group hover:rotate-12 transition-transform">
                                📜
                            </div>
                            <h3 class="text-3xl font-black text-slate-900 mb-2">Logs Empty</h3>
                            <p class="text-slate-500 font-bold italic max-w-sm mx-auto leading-relaxed">No historical data detected. Initialize and complete your first mission to populate the archive.</p>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead>
                                    <tr class="bg-slate-900 text-white uppercase text-[9px] font-black tracking-[0.2em]">
                                        <th class="px-10 py-6">Fulfillment Date</th>
                                        <th class="px-10 py-6">Operation Module</th>
                                        <th class="px-10 py-6">Endpoint Entity</th>
                                        <th class="px-10 py-6 text-right">Revenue Yield</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    @foreach($jobs as $job)
                                        <tr class="group hover:bg-slate-50/50 transition-colors">
                                            <td class="px-10 py-8">
                                                <div class="space-y-1">
                                                    <p class="text-sm font-black text-slate-800 tracking-tight">{{ \Carbon\Carbon::parse($job->booking_date)->format('D, M d, Y') }}</p>
                                                    <p class="text-[9px] font-black uppercase tracking-widest text-emerald-500 flex items-center gap-1.5">
                                                        <span class="w-1 h-1 bg-emerald-500 rounded-full"></span>
                                                        Certified Completion
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="px-10 py-8">
                                                <p class="font-black text-slate-900 text-lg group-hover:text-indigo-600 transition-colors leading-none mb-2">{{ $job->subService->name }}</p>
                                                <p class="text-[10px] text-indigo-500 font-black uppercase tracking-[0.15em]">{{ $job->subService->category->name }} INFRA</p>
                                            </td>
                                            <td class="px-10 py-8">
                                                <div class="flex items-center gap-4">
                                                    <div class="w-10 h-10 bg-slate-50 border border-slate-100 rounded-xl flex items-center justify-center font-black text-xs text-slate-400 italic shadow-inner">
                                                        {{ substr($job->customer->name, 0, 1) }}
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-black text-slate-800 leading-none mb-1">{{ $job->customer->name }}</p>
                                                        <p class="text-[10px] text-slate-400 italic truncate max-w-[200px]">Node: "{{ $job->address }}"</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-10 py-8 text-right">
                                                <div class="inline-flex flex-col items-end">
                                                    <span class="text-xl font-black text-slate-900 group-hover:text-emerald-600 transition-colors">+₹{{ number_format($job->subService->price, 0) }}</span>
                                                    <span class="text-[9px] font-black uppercase tracking-widest text-slate-400 mt-1">Settled Net</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 animate-fade-in delay-200">
                    <div class="glass-card p-10 border-none bg-slate-900 text-white relative overflow-hidden group">
                        <div class="relative z-10">
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 mb-2">Fleet Performance</p>
                            <h4 class="text-3xl font-black">{{ $jobs->count() }} Successful Deployments</h4>
                            <p class="text-xs text-slate-400 mt-3 italic font-medium leading-relaxed">System reliability score 100% based on historical mission logs.</p>
                        </div>
                        <div class="absolute -right-4 -bottom-4 text-8xl opacity-5 group-hover:scale-125 transition-transform duration-700">🎖️</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

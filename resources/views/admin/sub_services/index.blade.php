<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="flex items-center gap-6">
                <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-slate-100">
                    <span class="text-2xl">📋</span>
                </div>
                <div>
                    <h2 class="font-black text-4xl text-slate-900 tracking-tight leading-tight">
                        {{ __('Asset Catalog') }}
                    </h2>
                    <p class="text-slate-500 mt-1.5 font-medium italic">Global configuration of service modules, unit valuations, and operational parameters.</p>
                </div>
            </div>
            <a href="{{ route('admin.sub-services.create') }}" class="btn-primary !px-8 !py-4 shadow-indigo-100 group">
                <span class="group-hover:rotate-90 transition-transform inline-block mr-2">⊕</span>
                {{ __('Initialize Module') }}
            </a>
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

            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 italic">Central Service Repository</h3>
                    <div class="h-px bg-slate-100 flex-grow mx-8"></div>
                </div>

                <div class="glass-card border-none shadow-2xl overflow-hidden animate-fade-in bg-white/80 backdrop-blur-md">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-slate-900 text-white uppercase text-[9px] font-black tracking-[0.2em]">
                                    <th class="px-10 py-6">Operation Entity</th>
                                    <th class="px-10 py-6 text-center">Structural Pillar</th>
                                    <th class="px-10 py-6 text-center">Unit Valuation</th>
                                    <th class="px-10 py-6 text-right">System Controls</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach($subServices as $service)
                                    <tr class="group hover:bg-slate-50/50 transition-all duration-500">
                                        <td class="px-10 py-8">
                                            <div class="max-w-md">
                                                <h4 class="font-black text-2xl text-slate-900 group-hover:text-indigo-600 transition-colors leading-none mb-3 italic">{{ $service->name }}</h4>
                                                <div class="flex items-start gap-3">
                                                    <span class="w-1 h-4 bg-indigo-100 rounded-full mt-0.5 group-hover:bg-indigo-600 transition-colors"></span>
                                                    <p class="text-xs text-slate-500 font-bold italic leading-relaxed group-hover:text-slate-700 transition-colors">{{ $service->description }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-10 py-8 text-center">
                                            <span class="inline-flex items-center gap-2.5 px-6 py-2.5 bg-indigo-50 text-indigo-600 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] border border-indigo-100/50 shadow-sm group-hover:scale-110 group-hover:bg-white group-hover:shadow-xl transition-all duration-500">
                                                <span class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse shadow-[0_0_8px_rgba(129,140,248,0.5)]"></span>
                                                {{ $service->category->name }} INFRA
                                            </span>
                                        </td>
                                        <td class="px-10 py-8 text-center text-center">
                                            <div class="inline-flex flex-col items-center px-8 py-3 bg-slate-50/50 rounded-2xl border border-slate-100/50 group-hover:bg-white group-hover:shadow-lg transition-all min-w-[140px]">
                                                <span class="text-3xl font-black text-slate-900 group-hover:text-indigo-600 transition-colors">₹{{ number_format($service->price, 0) }}</span>
                                                <span class="text-[9px] font-black uppercase tracking-[0.3em] text-slate-400 mt-1 italic leading-none">Global Unit Rate</span>
                                            </div>
                                        </td>
                                        <td class="px-10 py-8 text-right">
                                            <div class="flex justify-end items-center gap-3 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-x-4 group-hover:translate-x-0">
                                                <a href="{{ route('admin.sub-services.edit', $service) }}" class="px-6 py-2.5 bg-white border border-slate-100 text-slate-900 hover:text-indigo-600 hover:border-indigo-100 rounded-xl shadow-sm hover:shadow-lg transition-all text-[10px] font-black uppercase tracking-widest">
                                                    Revision
                                                </a>
                                                <form action="{{ route('admin.sub-services.destroy', $service) }}" method="POST" class="inline-block" onsubmit="return confirm('DANGER ZONE: Permanent purge of module {{ $service->name }}. Confirm?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="p-2.5 bg-white border border-slate-100 text-slate-300 hover:text-red-500 hover:border-red-100 rounded-xl shadow-sm hover:shadow-lg transition-all">
                                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    @if($subServices->isEmpty())
                        <div class="p-32 text-center bg-slate-50/20">
                            <div class="w-32 h-32 bg-white border border-slate-100 rounded-[3rem] flex items-center justify-center text-6xl shadow-2xl mx-auto mb-10 group hover:rotate-12 transition-transform duration-500">
                                🔧
                            </div>
                            <h3 class="text-4xl font-black text-slate-900 mb-4 tracking-tight">Catalog Depleted</h3>
                            <p class="text-slate-500 font-bold text-lg max-w-sm mx-auto italic leading-relaxed">System parameters are uninitialized. Register a service module to activate technical deployment streams.</p>
                            <a href="{{ route('admin.sub-services.create') }}" class="btn-primary mt-12 !px-10 !py-5">Initialize Node Activation</a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 animate-fade-in delay-200">
                <div class="glass-card p-12 border-none bg-slate-900 text-white relative overflow-hidden group">
                    <div class="relative z-10">
                        <p class="text-[10px] font-black uppercase tracking-[0.2em] text-indigo-400 mb-2 italic">Catalog Density</p>
                        <h4 class="text-4xl font-black italic">{{ $subServices->count() }} Synchronized Nodes</h4>
                        <p class="text-xs text-slate-400 mt-4 italic font-medium leading-relaxed">Total operational capacity spanning across all structural pillars and active verticals.</p>
                    </div>
                    <div class="absolute -right-4 -bottom-4 text-9xl opacity-10 group-hover:scale-125 transition-transform duration-700 italic font-black">CAP</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-lg border border-slate-100 group hover:rotate-6 transition-transform">
                    <span class="text-3xl">👥</span>
                </div>
                <div>
                    <h2 class="font-black text-4xl text-slate-900 tracking-tight leading-tight">
                        {{ __('Partner Network') }}
                    </h2>
                    <p class="text-slate-500 mt-1.5 font-medium italic">Vetting and authorization portal for incoming service specialists and operational nodes.</p>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="glass-card !p-6 !px-10 bg-slate-900 !border-none flex items-center gap-6 text-white shadow-2xl relative overflow-hidden group">
                    <div class="absolute inset-0 bg-indigo-500/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em] leading-none mb-2 italic">Global Fleet Size</p>
                        <p class="text-4xl font-[1000] italic leading-none tracking-tighter">{{ $providers->count() }} <span class="text-lg text-indigo-400">Assets</span></p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            @if(session('success'))
                <div class="p-6 bg-emerald-50 border-l-4 border-emerald-600 text-emerald-700 animate-fade-in rounded-r-3xl shadow-sm flex items-center gap-5">
                    <div class="w-10 h-10 bg-emerald-600 rounded-2xl flex items-center justify-center text-white shadow-lg text-xl italic">✓</div>
                    <span class="font-black italic text-sm">{{ session('success') }}</span>
                </div>
            @endif

            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-[11px] font-[1000] uppercase tracking-[0.3em] text-slate-400 italic">Security Vetting Ledger</h3>
                    <div class="h-px bg-slate-100 flex-grow mx-10"></div>
                </div>

                <div class="glass-card border-none shadow-2xl overflow-hidden animate-fade-in bg-white/80 backdrop-blur-xl">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-slate-900 text-white uppercase text-[10px] font-black tracking-[0.3em]">
                                    <th class="px-12 py-8">Specialist Profile</th>
                                    <th class="px-12 py-8">Communication Bridge</th>
                                    <th class="px-12 py-8">Verification Phase</th>
                                    <th class="px-12 py-8 text-right">Operational Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach($providers as $provider)
                                    <tr class="group hover:bg-slate-50/50 transition-all duration-300">
                                        <td class="px-12 py-10">
                                            <div class="flex items-center gap-8">
                                                <div class="w-20 h-20 bg-white border border-slate-100 rounded-[2rem] flex items-center justify-center font-black text-3xl text-indigo-600 shadow-inner group-hover:scale-110 group-hover:rotate-6 group-hover:shadow-2xl transition-all duration-500 italic">
                                                    {{ substr($provider->name, 0, 1) }}
                                                </div>
                                                <div>
                                                    <h4 class="font-[1000] text-2xl text-slate-900 leading-tight mb-3 group-hover:text-indigo-600 transition-colors uppercase tracking-tight">{{ $provider->name }}</h4>
                                                    <div class="flex items-center gap-3">
                                                        <span class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse"></span>
                                                        <p class="text-[11px] text-slate-400 font-bold uppercase tracking-widest italic truncate max-w-[250px] border-l-2 border-slate-100 pl-3">Node: "{{ $provider->address }}"</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-12 py-10">
                                            <div class="space-y-3">
                                                <p class="text-lg font-black text-slate-800 tracking-tight leading-none group-hover:text-indigo-600 transition-colors">{{ $provider->email }}</p>
                                                <div class="flex items-center gap-4">
                                                    <span class="px-3 py-1 bg-slate-100 text-[10px] text-slate-500 font-black italic rounded-lg tracking-widest border border-slate-200">PH-SEC</span>
                                                    <p class="text-sm font-black text-slate-400 tracking-[0.15em] italic">{{ $provider->phone }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-12 py-10">
                                            @if($provider->is_approved)
                                                <span class="inline-flex items-center gap-3 px-6 py-3 bg-emerald-50 text-emerald-600 rounded-[1.5rem] text-[11px] font-[1000] uppercase tracking-[0.2em] border border-emerald-100 shadow-sm italic">
                                                    <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full shadow-[0_0_12px_rgba(52,211,153,0.8)] animate-pulse"></span>
                                                    Authorized Asset
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-3 px-6 py-3 bg-amber-50 text-amber-600 rounded-[1.5rem] text-[11px] font-[1000] uppercase tracking-[0.2em] border border-amber-100 shadow-sm animate-pulse italic">
                                                    <span class="w-2.5 h-2.5 bg-amber-400 rounded-full"></span>
                                                    Verification Pend
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-12 py-10 text-right">
                                            @if(!$provider->is_approved)
                                                <form action="{{ route('admin.provider.approve', $provider) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="bg-indigo-600 text-white px-10 py-5 rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-slate-900 hover:scale-105 active:scale-95 transition-all shadow-indigo-900/20 shadow-2xl italic">
                                                        Authorize Deployment
                                                    </button>
                                                </form>
                                            @else
                                                <div class="flex items-center justify-end gap-4 text-slate-300">
                                                    <span class="text-[11px] font-[1000] uppercase tracking-[0.4em] select-none italic group-hover:text-indigo-300 transition-colors">Operational Active</span>
                                                    <div class="w-10 h-10 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-500 text-xl font-black shadow-inner border border-emerald-100">✓</div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    @if($providers->isEmpty())
                        <div class="py-48 text-center bg-slate-50/20">
                            <div class="w-32 h-32 bg-white border border-slate-100 rounded-[3.5rem] flex items-center justify-center text-7xl shadow-2xl mx-auto mb-10 group hover:rotate-12 transition-transform duration-700 italic">
                                📶
                            </div>
                            <h3 class="text-4xl font-black text-slate-900 mb-4 tracking-tight">Application Void</h3>
                            <p class="text-slate-500 font-bold text-lg max-w-sm mx-auto italic leading-relaxed">The partner registration gateway is currently active but quiet. Monitor for incoming talent nodes seeking authorization.</p>
                        </div>
                    @endif
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 animate-fade-in delay-200">
                    <div class="glass-card p-12 border-none bg-slate-900 text-white flex items-center justify-between overflow-hidden relative group">
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative z-10">
                            <p class="text-[11px] font-black uppercase tracking-[0.3em] text-indigo-400 mb-3 italic">Network Standard</p>
                            <h4 class="text-4xl font-black leading-none italic tracking-tight">Vetting <span class="text-indigo-400">Strict</span> Mode</h4>
                            <p class="text-sm text-slate-400 mt-5 italic font-medium leading-relaxed max-w-sm">Global platform integrity is currently 100% based on recent vetted deployments and system audits.</p>
                        </div>
                        <div class="text-[10rem] opacity-[0.03] rotate-12 absolute -right-8 top-1/2 -translate-y-1/2 group-hover:scale-110 transition-transform duration-1000 font-black pointer-events-none">SECURE</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

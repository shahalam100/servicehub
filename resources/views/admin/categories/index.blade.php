<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-lg border border-slate-100 group hover:rotate-6 transition-transform">
                    <span class="text-3xl">🏗️</span>
                </div>
                <div>
                    <h2 class="font-black text-4xl text-slate-900 tracking-tight leading-tight">
                        {{ __('Portfolio Structure') }}
                    </h2>
                    <p class="text-slate-500 mt-1.5 font-medium italic">Architectural definition of foundational service pillars and operational verticals.</p>
                </div>
            </div>
            <a href="{{ route('admin.categories.create') }}" class="btn-primary !px-10 !py-5 shadow-indigo-200 group active:scale-95 transition-all">
                <span class="group-hover:rotate-90 transition-transform inline-block mr-3">⊕</span>
                {{ __('Initialize Segment') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            @if(session('success'))
                <div class="p-6 bg-emerald-50 border-l-4 border-emerald-600 text-emerald-700 animate-fade-in rounded-r-3xl shadow-sm flex items-center gap-5">
                    <div class="w-10 h-10 bg-emerald-600 rounded-2xl flex items-center justify-center text-white shadow-lg text-xl italic">✓</div>
                    <span class="font-black italic text-sm tracking-tight">{{ session('success') }}</span>
                </div>
            @endif
            
            <div class="glass-card border-none shadow-2xl overflow-hidden animate-fade-in bg-white/80 backdrop-blur-xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-slate-900 text-white uppercase text-[10px] font-black tracking-[0.3em]">
                                <th class="px-12 py-8">Structural Entity</th>
                                <th class="px-12 py-8 text-center">Service Capacity</th>
                                <th class="px-12 py-8 text-right">System Controls</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($categories as $category)
                                <tr class="group hover:bg-slate-50/50 transition-all duration-300">
                                    <td class="px-12 py-10">
                                        <div class="flex items-center gap-8">
                                            <div class="w-20 h-20 bg-white rounded-[2rem] flex items-center justify-center text-4xl shadow-inner border border-slate-50 group-hover:scale-110 group-hover:rotate-3 group-hover:shadow-2xl transition-all duration-500 italic">
                                                @if($category->name == 'Electrician') ⚡ 
                                                @elseif($category->name == 'Plumber') 🚰 
                                                @elseif($category->name == 'Carpenter') 🔨 
                                                @else 📂 
                                                @endif
                                            </div>
                                            <div>
                                                <h4 class="font-black text-3xl text-slate-900 group-hover:text-indigo-600 transition-colors leading-none mb-3">{{ $category->name }}</h4>
                                                <p class="text-[11px] font-black text-slate-400 uppercase tracking-[0.3em] italic">Primary Vertical Node</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-12 py-10 text-center">
                                        <div class="inline-flex flex-col items-center px-8 py-4 bg-indigo-50/50 rounded-[2rem] border border-indigo-100/50 group-hover:bg-white group-hover:shadow-2xl transition-all min-w-[140px]">
                                            <span class="text-3xl font-black text-indigo-600 italic leading-none">{{ $category->sub_services_count }}</span>
                                            <span class="text-[10px] font-black uppercase text-slate-400 tracking-widest mt-2 italic">Active Units</span>
                                        </div>
                                    </td>
                                    <td class="px-12 py-10 text-right">
                                        <div class="flex justify-end items-center gap-4 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-x-6 group-hover:translate-x-0">
                                            <a href="{{ route('admin.categories.edit', $category) }}" class="px-8 py-3 bg-white border border-slate-100 text-slate-900 hover:text-indigo-600 hover:border-indigo-100 rounded-2xl shadow-sm hover:shadow-xl transition-all text-xs font-black uppercase tracking-widest italic">
                                                Revision
                                            </a>
                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('DANGER ZONE: Permanent deletion of {{ $category->name }}. Confirm?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-12 h-12 flex items-center justify-center bg-white border border-slate-100 text-slate-300 hover:text-red-500 hover:border-red-100 rounded-2xl shadow-sm hover:shadow-xl transition-all group/del">
                                                    <svg class="w-5 h-5 group-hover/del:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                
                @if($categories->isEmpty())
                    <div class="py-40 text-center bg-slate-50/20">
                        <div class="w-32 h-32 bg-white border border-slate-100 rounded-[3.5rem] flex items-center justify-center text-7xl shadow-2xl mx-auto mb-10 group hover:rotate-12 transition-transform duration-700 italic">
                            📁
                        </div>
                        <h3 class="text-4xl font-black text-slate-900 mb-4 tracking-tight">Inventory Void</h3>
                        <p class="text-slate-500 font-bold text-lg max-w-sm mx-auto italic leading-relaxed">System backbone is currently unconfigured. Initialize a primary segment to begin operational scaling.</p>
                        <a href="{{ route('admin.categories.create') }}" class="btn-primary mt-12 !px-12 !py-6 !text-xs !font-black uppercase tracking-[0.2em] shadow-indigo-100 active:scale-95 transition-all">Initialize Node Activation</a>
                    </div>
                @endif
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 animate-fade-in delay-200">
                <div class="md:col-span-2 glass-card p-12 border-none bg-slate-900 text-white flex items-center justify-between overflow-hidden relative group">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="relative z-10">
                        <p class="text-[11px] font-black uppercase tracking-[0.3em] text-indigo-400 mb-3 italic">Network Resilience</p>
                        <h4 class="text-4xl font-black tracking-tight leading-none italic">Architecture Integrity: <span class="text-indigo-400">OPTIMAL</span></h4>
                        <p class="text-sm text-slate-400 mt-4 italic max-w-md font-medium">All structural nodes are synchronized, secured, and ready for high-impact deployment across the global fleet.</p>
                    </div>
                    <div class="text-[12rem] opacity-[0.03] absolute -right-8 top-1/2 -translate-y-1/2 group-hover:scale-125 transition-transform duration-1000 italic font-black pointer-events-none">HEALTH</div>
                </div>
                
                <div class="glass-card p-12 border-none bg-indigo-600 text-white flex flex-col justify-center overflow-hidden relative group">
                    <div class="absolute inset-0 bg-indigo-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative z-10">
                        <p class="text-[11px] font-black uppercase tracking-[0.3em] text-indigo-200 mb-2 italic">Global Count</p>
                        <p class="text-6xl font-[1000] italic leading-none tracking-tighter">{{ $categories->count() }}</p>
                        <p class="text-[11px] font-black uppercase tracking-[0.2em] text-indigo-300 mt-4 italic border-l-2 border-indigo-400 pl-4">Active Segments In Production</p>
                    </div>
                    <div class="text-8xl opacity-10 absolute -right-4 -bottom-4 group-hover:scale-110 transition-transform duration-1000">🏛️</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

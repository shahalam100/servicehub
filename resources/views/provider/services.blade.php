<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <h2 class="font-black text-4xl text-slate-900 tracking-tight leading-tight">
                    {{ __('Asset Capabilities') }}
                </h2>
                <p class="text-slate-500 mt-1.5 font-medium italic">Configure your operational skillset to receive synchronized mission requests.</p>
            </div>
            <div class="flex items-center gap-6">
                <div class="glass-card !p-4 !px-6 bg-slate-900 !border-none !flex-row items-center gap-4 text-white shadow-2xl">
                    <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center text-xl">🛠️</div>
                    <div>
                        <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest leading-none mb-1">Active Modules</p>
                        <p class="text-2xl font-black leading-none">{{ count($mySubServiceIds) }}</p>
                    </div>
                </div>
            </div>
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

            <form action="{{ route('provider.services.update') }}" method="POST">
                @csrf
                
                <div class="space-y-16">
                    @foreach($categories as $category)
                        <section class="animate-fade-in">
                            <div class="flex items-center justify-between mb-8">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-white border border-slate-100 rounded-2xl flex items-center justify-center text-2xl shadow-sm group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                        @if($category->name == 'Electrician') ⚡ 
                                        @elseif($category->name == 'Plumber') 🚰 
                                        @elseif($category->name == 'Carpenter') 🔨 
                                        @else ⚙️ 
                                        @endif
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-black text-slate-900 tracking-tight">{{ $category->name }} Segment</h3>
                                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mt-0.5 italic">Operational Infrastructure</p>
                                    </div>
                                </div>
                                <div class="h-px bg-slate-100 flex-grow mx-8 hidden md:block"></div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($category->subServices as $subService)
                                    <label class="glass-card group relative flex items-center gap-5 p-8 border-none shadow-xl hover:shadow-indigo-100/50 cursor-pointer transition-all duration-500 bg-white/80 overflow-hidden">
                                        <div class="absolute top-0 right-0 p-4 opacity-0 group-hover:opacity-5 transition-opacity text-5xl font-black">SKILL</div>
                                        
                                        <div class="relative z-10 flex items-center justify-center">
                                            <input type="checkbox" name="sub_services[]" value="{{ $subService->id }}" 
                                                class="peer hidden"
                                                {{ in_array($subService->id, $mySubServiceIds) ? 'checked' : '' }}>
                                            <div class="w-8 h-8 rounded-xl border-2 border-slate-100 peer-checked:border-indigo-600 peer-checked:bg-indigo-600 flex items-center justify-center transition-all duration-300 shadow-inner group-hover:scale-110">
                                                <svg class="w-4 h-4 text-white opacity-0 peer-checked:opacity-100 transition-opacity" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                        </div>
                                        
                                        <div class="relative z-10 flex-grow min-w-0">
                                            <p class="font-black text-slate-900 text-lg group-hover:text-indigo-600 transition-colors leading-tight mb-1 truncate">{{ $subService->name }}</p>
                                            <div class="flex items-center gap-2">
                                                <span class="text-xs font-bold text-slate-400">Unit Rate:</span>
                                                <span class="text-xs font-black text-indigo-500">₹{{ number_format($subService->price, 0) }}</span>
                                            </div>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </section>
                    @endforeach
                </div>

                <div class="sticky bottom-8 mt-20 flex justify-center">
                    <button type="submit" class="bg-slate-900 text-white px-12 py-5 rounded-3xl font-black text-[13px] uppercase tracking-[0.3em] flex items-center gap-4 hover:scale-105 active:scale-95 transition-all shadow-2xl group">
                        <span>Commit Portfolio Changes</span>
                        <span class="text-lg group-hover:translate-x-2 transition-transform duration-500">↼</span>
                    </button>
                </div>
            </form>
            
            <div class="p-10 glass-card bg-slate-50 border-none flex items-center justify-between relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1 italic">Security Advisory</p>
                    <p class="text-sm font-bold text-slate-600">Ensure all selected capabilities are verified by your unit certification documents.</p>
                </div>
                <div class="text-6xl opacity-5 absolute -right-4 top-1/2 -translate-y-1/2 rotate-12">🛡️</div>
            </div>
        </div>
    </div>
</x-app-layout>

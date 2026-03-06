<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="flex items-center gap-6">
                <a href="{{ route('admin.categories.index') }}" class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm hover:shadow-indigo-100 hover:scale-105 active:scale-95 transition-all border border-slate-100 group">
                    <span class="text-2xl group-hover:-translate-x-1 transition-transform italic">↼</span>
                </a>
                <div>
                    <h2 class="font-black text-4xl text-slate-900 tracking-tight leading-tight">
                        {{ __('New Segment') }}
                    </h2>
                    <p class="text-slate-500 mt-1.5 font-medium italic">Initialize a foundational service pillar for the global platform architecture.</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <div class="glass-card p-12 md:p-16 border-none shadow-2xl bg-white/80 animate-fade-in relative overflow-hidden backdrop-blur-xl">
                <div class="absolute top-0 right-0 p-12 opacity-5 pointer-events-none text-[12rem] font-black italic select-none leading-none">CORE</div>
                
                <div class="relative z-10">
                    <div class="mb-16">
                        <div class="flex items-center gap-5 mb-4">
                            <span class="px-4 py-1.5 bg-indigo-50 text-indigo-600 rounded-xl text-[10px] font-black uppercase tracking-[0.3em] border border-indigo-100 shadow-sm italic">Phase 01-INIT</span>
                            <h3 class="text-3xl font-black text-slate-900 tracking-tight">Entity Definition</h3>
                        </div>
                        <p class="text-slate-500 text-lg font-bold leading-relaxed italic border-l-4 border-indigo-600 pl-6">Specify the taxonomy for this operational node. This will organize all future specialist deployments.</p>
                    </div>

                    <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-10">
                        @csrf
                        <div class="group">
                            <label for="name" class="flex items-center justify-between mb-4">
                                <span class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 group-focus-within:text-indigo-600 transition-colors italic">Operational Designation</span>
                                <span class="text-[9px] font-black text-slate-300 italic uppercase tracking-widest">Required Module</span>
                            </label>
                            <div class="relative">
                                <input id="name" type="text" name="name" :value="old('name')" required autofocus 
                                    class="block w-full h-20 px-8 bg-slate-50 border-2 border-transparent rounded-[2rem] text-2xl font-black text-slate-900 placeholder:text-slate-200 focus:ring-0 focus:border-indigo-600 focus:bg-white transition-all shadow-inner"
                                    placeholder="e.g. Infrastructure, Logistics">
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-4 font-black italic text-sm text-red-500 px-4" />
                        </div>

                        <div class="p-8 bg-slate-900 rounded-[2.5rem] text-white flex flex-col md:flex-row items-center justify-between shadow-2xl mt-16 relative overflow-hidden group/btn gap-8">
                            <div class="relative z-10 flex items-center gap-6">
                                <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center text-3xl text-indigo-400 shadow-inner group-hover/btn:rotate-12 transition-transform duration-500">🛡️</div>
                                <div>
                                    <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-500 italic mb-1">State: AUTH_WAIT</p>
                                    <p class="text-lg font-black italic tracking-tight leading-none">Secure Authorization</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-6 relative z-10 w-full md:w-auto">
                                <a href="{{ route('admin.categories.index') }}" class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-500 hover:text-white transition-colors px-6 py-4">Discard</a>
                                <button type="submit" class="w-full md:w-auto bg-indigo-600 hover:bg-indigo-500 text-white px-10 py-5 rounded-2xl font-black text-xs uppercase tracking-[0.3em] shadow-xl shadow-indigo-900/50 hover:scale-105 active:scale-95 transition-all italic">
                                    Initialize Segment
                                </button>
                            </div>
                            
                            <div class="absolute -right-6 top-1/2 -translate-y-1/2 text-[10rem] opacity-[0.03] group-hover/btn:scale-125 transition-transform duration-700 italic font-black pointer-events-none">SYNC</div>
                        </div>
                    </form>
                </div>
            </div>  
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 animate-fade-in delay-200">
                <div class="glass-card p-10 border-none bg-indigo-50/50 flex items-center gap-8 shadow-xl">
                    <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-3xl shadow-sm italic group-hover:scale-110 transition-transform">💡</div>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-[0.3em] text-indigo-400 mb-2 italic">Architecture Tip</p>
                        <p class="text-sm text-slate-500 italic font-bold leading-relaxed">Ensure the designation is broad enough to encompass multiple specialist sub-modules and operational niches.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

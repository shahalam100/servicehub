<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-6">
            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-slate-100">
                <span class="text-xl animate-pulse">🔒</span>
            </div>
            <div>
                <h2 class="font-black text-4xl text-slate-900 tracking-tight leading-tight">
                    {{ __('Credential Vetting') }}
                </h2>
                <p class="text-slate-500 mt-1.5 font-medium italic">Your professional profile is currently undergoing structural verification.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-24">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card p-16 md:p-24 border-none shadow-2xl bg-white/80 animate-fade-in relative overflow-hidden text-center">
                <!-- Background Decorative Rings -->
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-indigo-50 rounded-full blur-3xl opacity-50"></div>
                <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-slate-50 rounded-full blur-3xl opacity-50"></div>
                
                <div class="relative z-10">
                    <div class="w-32 h-32 bg-slate-900 rounded-[3rem] flex items-center justify-center text-6xl shadow-2xl mx-auto mb-12 animate-bounce">
                        ⏳
                    </div>
                    
                    <h3 class="text-4xl font-black text-slate-900 mb-6 tracking-tight italic">Waiting for Authorization</h3>
                    
                    <p class="text-slate-500 text-lg leading-relaxed font-bold italic max-w-xl mx-auto mb-12">
                        System Protocol: Initial registration successful. Our global admin team is meticulously reviewing your asset capabilities. Deployment access will be granted upon successful vetting.
                    </p>
                    
                    <div class="flex flex-col items-center gap-8">
                        <div class="inline-flex items-center gap-4 px-6 py-3 bg-indigo-50 border border-indigo-100 rounded-2xl">
                            <span class="flex h-3 w-3 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-indigo-500"></span>
                            </span>
                            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-indigo-600">Syncing with Control Terminal</span>
                        </div>
                        
                        <div class="flex items-center gap-6 pt-8 border-t border-slate-100 w-full justify-center">
                            <p class="text-[11px] font-black uppercase tracking-widest text-slate-400">Action Required:</p>
                            <a href="{{ route('profile.edit') }}" class="btn-primary !px-8 !py-4 !rounded-2xl !text-[11px] !font-black uppercase tracking-[0.2em] shadow-indigo-100">
                                Refine Profile Data
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 flex items-center justify-center gap-4 opacity-50">
                <div class="w-1.5 h-1.5 bg-slate-300 rounded-full"></div>
                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Security Cleared • Operational Integrity Confirmed</p>
                <div class="w-1.5 h-1.5 bg-slate-300 rounded-full"></div>
            </div>
        </div>
    </div>
</x-app-layout>

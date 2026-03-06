<x-guest-layout>
    <div class="mb-12 relative text-center">
        <div class="absolute -top-12 -right-12 w-32 h-32 bg-indigo-500/10 rounded-full blur-3xl"></div>
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-slate-900 text-white rounded-lg text-[10px] font-black uppercase tracking-[0.2em] mb-6 shadow-xl">
            <span class="w-1.5 h-1.5 bg-indigo-400 rounded-full animate-pulse"></span>
            Account Initialization
        </div>
        <h2 class="text-4xl font-black text-slate-900 tracking-tight leading-tight">Join the <span class="text-indigo-600 italic text-5xl flex justify-center mt-2">Elite Stream.</span></h2>
        <p class="text-slate-500 mt-4 font-medium italic leading-relaxed max-w-sm mx-auto">Establish your global UID and define your operational role within the ecosystem.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-8">
        @csrf

        <div class="space-y-8">
            <!-- Name -->
            <div class="group">
                <label for="name" class="flex items-center justify-between mb-3 px-1">
                    <span class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 group-hover:text-indigo-600 transition-colors">Legal Designation</span>
                    <span class="text-[9px] font-bold text-slate-300 italic">Full Identity</span>
                </label>
                <div class="relative">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus 
                        class="block w-full h-16 px-6 bg-slate-50 border-none rounded-2xl text-sm font-black text-slate-900 placeholder:text-slate-200 focus:ring-4 focus:ring-indigo-50 focus:bg-white transition-all shadow-inner"
                        placeholder="e.g. Alexander Pierce">
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-3 font-bold italic text-xs px-2" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Email Address -->
                <div class="group">
                    <label for="email" class="flex items-center justify-between mb-3 px-1">
                        <span class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 group-hover:text-indigo-600 transition-colors">Identification</span>
                        <span class="text-[9px] font-bold text-slate-300 italic">Global UID</span>
                    </label>
                    <div class="relative">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required 
                            class="block w-full h-16 px-6 bg-slate-50 border-none rounded-2xl text-sm font-black text-slate-900 placeholder:text-slate-200 focus:ring-4 focus:ring-indigo-50 focus:bg-white transition-all shadow-inner"
                            placeholder="name@stream.com">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-3 font-bold italic text-xs px-2" />
                </div>

                <!-- Phone -->
                <div class="group">
                    <label for="phone" class="flex items-center justify-between mb-3 px-1">
                        <span class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 group-hover:text-indigo-600 transition-colors">Sync Channel</span>
                        <span class="text-[9px] font-bold text-slate-300 italic">Direct Link</span>
                    </label>
                    <div class="relative">
                        <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required 
                            class="block w-full h-16 px-6 bg-slate-50 border-none rounded-2xl text-sm font-black text-slate-900 placeholder:text-slate-200 focus:ring-4 focus:ring-indigo-50 focus:bg-white transition-all shadow-inner"
                            placeholder="+91 0000 0000">
                    </div>
                    <x-input-error :messages="$errors->get('phone')" class="mt-3 font-bold italic text-xs px-2" />
                </div>
            </div>

            <!-- Role Selection -->
            <div class="group">
                <label class="flex items-center justify-between mb-4 px-1">
                    <span class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">Operational Vertical</span>
                    <span class="text-[9px] font-bold text-slate-300 italic">Protocol Choice</span>
                </label>
                <div class="grid grid-cols-2 gap-6">
                    <label class="relative cursor-pointer group/opt">
                        <input type="radio" name="role" value="customer" class="peer hidden" {{ old('role', 'customer') == 'customer' ? 'checked' : '' }} required>
                        <div class="p-6 border-none rounded-3xl bg-slate-50 shadow-inner peer-checked:bg-white peer-checked:shadow-2xl peer-checked:shadow-indigo-100 transition-all text-center relative overflow-hidden group">
                            <div class="absolute inset-0 bg-indigo-600 opacity-0 peer-checked:opacity-[0.03] transition-opacity"></div>
                            <span class="block text-3xl mb-3 group-hover/opt:scale-125 transition-transform">🏘️</span>
                            <span class="block text-[10px] font-black uppercase tracking-widest text-slate-400 peer-checked:text-indigo-600">Client Node</span>
                        </div>
                    </label>
                    <label class="relative cursor-pointer group/opt">
                        <input type="radio" name="role" value="provider" class="peer hidden" {{ old('role') == 'provider' ? 'checked' : '' }} required>
                        <div class="p-6 border-none rounded-3xl bg-slate-50 shadow-inner peer-checked:bg-white peer-checked:shadow-2xl peer-checked:shadow-indigo-100 transition-all text-center relative overflow-hidden group">
                            <div class="absolute inset-0 bg-indigo-600 opacity-0 peer-checked:opacity-[0.03] transition-opacity"></div>
                            <span class="block text-3xl mb-3 group-hover/opt:scale-125 transition-transform">⚙️</span>
                            <span class="block text-[10px] font-black uppercase tracking-widest text-slate-400 peer-checked:text-indigo-600">Asset Partner</span>
                        </div>
                    </label>
                </div>
                <x-input-error :messages="$errors->get('role')" class="mt-3 font-bold italic text-xs px-2" />
            </div>

            <!-- Address -->
            <div class="group">
                <label for="address" class="flex items-center justify-between mb-3 px-1">
                    <span class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 group-hover:text-indigo-600 transition-colors">Deployment Zone</span>
                    <span class="text-[9px] font-bold text-slate-300 italic">Base Coordinates</span>
                </label>
                <div class="relative">
                    <input id="address" type="text" name="address" value="{{ old('address') }}" required 
                        class="block w-full h-16 px-6 bg-slate-50 border-none rounded-2xl text-sm font-black text-slate-900 placeholder:text-slate-200 focus:ring-4 focus:ring-indigo-50 focus:bg-white transition-all shadow-inner"
                        placeholder="e.g. Sector 7, Block B, Unified City">
                </div>
                <x-input-error :messages="$errors->get('address')" class="mt-3 font-bold italic text-xs px-2" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Password -->
                <div class="group">
                    <label for="password" class="flex items-center justify-between mb-3 px-1">
                        <span class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 group-hover:text-indigo-600 transition-colors">Secure Key</span>
                        <span class="text-[9px] font-bold text-slate-300 italic">Auth Token</span>
                    </label>
                    <div class="relative">
                        <input id="password" type="password" name="password" required 
                            class="block w-full h-16 px-6 bg-slate-50 border-none rounded-2xl text-sm font-black text-slate-900 placeholder:text-slate-200 focus:ring-4 focus:ring-indigo-50 focus:bg-white transition-all shadow-inner"
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="group">
                    <label for="password_confirmation" class="flex items-center justify-between mb-3 px-1">
                        <span class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 group-hover:text-indigo-600 transition-colors">Key Match</span>
                        <span class="text-[9px] font-bold text-slate-300 italic">Sync Check</span>
                    </label>
                    <div class="relative">
                        <input id="password_confirmation" type="password" name="password_confirmation" required 
                            class="block w-full h-16 px-6 bg-slate-50 border-none rounded-2xl text-sm font-black text-slate-900 placeholder:text-slate-200 focus:ring-4 focus:ring-indigo-50 focus:bg-white transition-all shadow-inner"
                            placeholder="••••••••">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-3 font-bold italic text-xs px-2" />
                </div>
            </div>
        </div>

        <div class="pt-10">
            <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-white h-20 rounded-[2.5rem] font-black text-sm uppercase tracking-[0.3em] shadow-[0_20px_50px_rgba(0,0,0,0.1)] hover:scale-[1.02] active:scale-[0.98] transition-all relative overflow-hidden group">
                <span class="relative z-10">Generate Entity</span>
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-indigo-500 opacity-0 group-hover:opacity-10 transition-opacity"></div>
            </button>
        </div>

        <div class="pt-10 text-center">
            <p class="text-[11px] text-slate-400 font-black uppercase tracking-widest leading-loose">
                Already Registered in Network? <br>
                <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 underline decoration-2 underline-offset-4">Identity Verification</a>
            </p>
        </div>
    </form>
</x-guest-layout>

<x-guest-layout>
    <div class="mb-12 relative">
        <div class="absolute -top-12 -left-12 w-32 h-32 bg-indigo-500/10 rounded-full blur-3xl"></div>
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-slate-900 text-white rounded-lg text-[10px] font-black uppercase tracking-[0.2em] mb-6 shadow-xl">
            <span class="w-1.5 h-1.5 bg-indigo-400 rounded-full animate-pulse"></span>
            Secure Terminal
        </div>
        <h2 class="text-4xl font-black text-slate-900 tracking-tight leading-tight">Welcome Back, <br><span class="text-indigo-600 italic">Operator.</span></h2>
        <p class="text-slate-500 mt-3 font-medium italic leading-relaxed">Initiate secure session to manage domestic technical parameters.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6 p-4 bg-indigo-50 border-none rounded-2xl text-indigo-600 font-bold text-sm italic shadow-sm" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-8">
        @csrf

        <!-- Email Address -->
        <div class="group">
            <label for="email" class="flex items-center justify-between mb-3 px-1">
                <span class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 group-hover:text-indigo-600 transition-colors">Identification</span>
                <span class="text-[9px] font-bold text-slate-300 italic">Global UID</span>
            </label>
            <div class="relative">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                    class="block w-full h-16 px-6 bg-slate-50 border-none rounded-2xl text-sm font-black text-slate-900 placeholder:text-slate-200 focus:ring-4 focus:ring-indigo-50 focus:bg-white transition-all shadow-inner"
                    placeholder="name@example.com">
                <div class="absolute right-6 top-1/2 -translate-y-1/2 opacity-20 text-xl pointer-events-none italic">📧</div>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-3 font-bold italic text-xs px-2" />
        </div>

        <!-- Password -->
        <div class="group">
            <label for="password" class="flex items-center justify-between mb-3 px-1">
                <span class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 group-hover:text-indigo-600 transition-colors">Access Key</span>
                <span class="text-[9px] font-bold text-slate-300 italic">Encrypted Point</span>
            </label>
            <div class="relative">
                <input id="password" type="password" name="password" required 
                    class="block w-full h-16 px-6 bg-slate-50 border-none rounded-2xl text-sm font-black text-slate-900 placeholder:text-slate-200 focus:ring-4 focus:ring-indigo-50 focus:bg-white transition-all shadow-inner"
                    placeholder="••••••••">
                <div class="absolute right-6 top-1/2 -translate-y-1/2 opacity-20 text-xl pointer-events-none italic">🔑</div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-3 font-bold italic text-xs px-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between pt-2">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group/chk">
                <div class="relative">
                    <input id="remember_me" type="checkbox" class="peer hidden" name="remember">
                    <div class="w-6 h-6 bg-slate-100 border border-slate-200 rounded-lg group-hover/chk:border-indigo-400 transition-all flex items-center justify-center peer-checked:bg-indigo-600 peer-checked:border-indigo-600">
                        <svg class="w-4 h-4 text-white opacity-0 peer-checked:opacity-100 transition-opacity" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <span class="ms-3 text-[11px] text-slate-400 font-black uppercase tracking-widest group-hover/chk:text-slate-600 transition-colors">{{ __('Stay Synced') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-[11px] font-black uppercase tracking-widest text-indigo-600 hover:text-indigo-800 transition-colors italic" href="{{ route('password.request') }}">
                    {{ __('Lost Access?') }}
                </a>
            @endif
        </div>

        <div class="pt-8">
            <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-white h-18 py-5 rounded-[2rem] font-black text-sm uppercase tracking-[0.2em] shadow-2xl shadow-slate-200 hover:scale-[1.02] active:scale-[0.98] transition-all relative overflow-hidden group">
                <span class="relative z-10">Authorized Access</span>
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-indigo-500 opacity-0 group-hover:opacity-10 transition-opacity"></div>
            </button>
        </div>

        <div class="pt-10 text-center">
            <p class="text-[11px] text-slate-400 font-black uppercase tracking-widest leading-loose">
                New Entity Verification Required? <br>
                <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800 underline decoration-2 underline-offset-4">Register Operator</a>
            </p>
        </div>
    </form>
</x-guest-layout>

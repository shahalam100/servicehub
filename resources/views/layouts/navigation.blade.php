<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md border-b border-slate-100 sticky top-0 z-40 transition-all duration-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group">
                        <div class="w-9 h-9 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-100 group-hover:scale-110 transition-transform">
                            <span class="text-white text-lg">🏠</span>
                        </div>
                        <span class="text-2xl font-black tracking-tighter text-slate-900">Service<span class="text-indigo-600">Hub</span></span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex items-center">
                    @if(Auth::user()->isAdmin())
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                            {{ __('Control') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')">
                            {{ __('Units') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.sub-services.index')" :active="request()->routeIs('admin.sub-services.*')">
                            {{ __('Catalog') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.providers')" :active="request()->routeIs('admin.providers')">
                            {{ __('Network') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.bookings')" :active="request()->routeIs('admin.bookings')">
                            {{ __('Ledger') }}
                        </x-nav-link>
                    @elseif(Auth::user()->isProvider())
                        <x-nav-link :href="route('provider.dashboard')" :active="request()->routeIs('provider.dashboard')">
                            {{ __('Operating') }}
                        </x-nav-link>
                        <x-nav-link :href="route('provider.services')" :active="request()->routeIs('provider.services')">
                            {{ __('Expertise') }}
                        </x-nav-link>
                        <x-nav-link :href="route('provider.history')" :active="request()->routeIs('provider.history')">
                            {{ __('Archive') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('customer.dashboard')" :active="request()->routeIs('customer.dashboard')">
                            {{ __('Discover') }}
                        </x-nav-link>
                        <x-nav-link :href="route('customer.bookings')" :active="request()->routeIs('customer.bookings')">
                            {{ __('Bookings') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 bg-slate-50 border border-slate-100 text-sm leading-4 font-bold rounded-xl text-slate-600 hover:text-indigo-600 hover:bg-slate-100 transition-all duration-200 group">
                            <div class="flex items-center gap-3">
                                <div class="w-7 h-7 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-xs font-black shadow-inner">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="group-hover:translate-x-0.5 transition-transform">{{ Auth::user()->name }}</span>
                            </div>

                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4 opacity-40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-5 py-3 border-b border-slate-50 bg-slate-50/50">
                            <p class="text-[9px] font-black uppercase text-slate-400 tracking-[0.2em]">Validated Profile</p>
                            <p class="text-[11px] font-bold text-slate-900 truncate mt-0.5 opacity-70">{{ Auth::user()->email }}</p>
                        </div>
                        
                        <div class="p-1">
                            <x-dropdown-link :href="route('profile.edit')" class="!rounded-lg font-bold text-slate-600 hover:!bg-indigo-50 hover:!text-indigo-600 transition-colors">
                                {{ __('Secure Settings') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="!rounded-lg font-bold text-red-500 hover:!bg-red-50 transition-colors">
                                    {{ __('Exit Session') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2.5 rounded-xl text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="sm:hidden border-t border-slate-100 bg-white shadow-2xl">
        <div class="pt-2 pb-3 space-y-1 px-4">
            @if(Auth::user()->isAdmin())
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="!rounded-xl font-bold">
                    {{ __('Control Panel') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')" class="!rounded-xl font-bold">
                    {{ __('Units') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.sub-services.index')" :active="request()->routeIs('admin.sub-services.*')" class="!rounded-xl font-bold">
                    {{ __('Catalog') }}
                </x-responsive-nav-link>
            @elseif(Auth::user()->isProvider())
                <x-responsive-nav-link :href="route('provider.dashboard')" :active="request()->routeIs('provider.dashboard')" class="!rounded-xl font-bold">
                    {{ __('Operations') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('provider.services')" :active="request()->routeIs('provider.services')" class="!rounded-xl font-bold">
                    {{ __('Expertise') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('customer.dashboard')" :active="request()->routeIs('customer.dashboard')" class="!rounded-xl font-bold">
                    {{ __('Explore') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('customer.bookings')" :active="request()->routeIs('customer.bookings')" class="!rounded-xl font-bold">
                    {{ __('My Bookings') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-slate-100 bg-slate-50/50">
            <div class="px-6 flex items-center gap-4">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-black">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="font-black text-slate-900 leading-none">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-xs text-slate-500 mt-1">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1 px-4 pb-4">
                <x-responsive-nav-link :href="route('profile.edit')" class="!rounded-xl font-bold">
                    {{ __('Secure Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="!rounded-xl font-bold text-red-500">
                        {{ __('End Session') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

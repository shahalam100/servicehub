<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-6">
            <a href="{{ route('customer.dashboard') }}" class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm hover:shadow-indigo-100 hover:scale-105 transition-all border border-slate-100 group">
                <span class="text-xl group-hover:-translate-x-1 transition-transform">↼</span>
            </a>
            <div>
                <h2 class="font-black text-4xl text-slate-900 tracking-tight leading-tight">
                    {{ $category->name }} <span class="text-indigo-600">Solutions</span>
                </h2>
                <p class="text-slate-500 font-medium italic">Precision-selected expert services for your infrastructure.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            <div class="flex items-center justify-between">
                <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Available Modules</h3>
                <div class="h-px bg-slate-100 flex-grow mx-8"></div>
                <div class="text-xs font-bold text-slate-400 italic">{{ $category->subServices->count() }} registered services</div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-fade-in">
                @foreach($category->subServices as $service)
                    <div class="glass-card group flex flex-col border-none shadow-xl hover:shadow-2xl hover:shadow-indigo-100/50 transition-all duration-500 bg-white/80">
                        <div class="p-8 flex-grow">
                            <div class="flex justify-between items-start mb-6">
                                <h4 class="font-black text-2xl text-slate-900 group-hover:text-indigo-600 transition-colors leading-tight">{{ $service->name }}</h4>
                                <span class="bg-indigo-50 text-indigo-600 px-3 py-1 rounded-lg text-[9px] font-black uppercase tracking-widest border border-indigo-100/50">Enterprise Ready</span>
                            </div>
                            <p class="text-slate-500 text-sm leading-relaxed mb-4 italic font-medium">{{ $service->description }}</p>
                            
                            <div class="mt-8 flex items-center gap-2">
                                <div class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Available Locally</span>
                            </div>
                        </div>
                        <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-100/50 flex justify-between items-center mt-auto backdrop-blur-sm">
                            <div>
                                <p class="text-[9px] uppercase font-black text-slate-400 tracking-[0.15em] mb-1">Standard Unit Cost</p>
                                <div class="flex items-center gap-1.5 text-indigo-600">
                                    <span class="text-sm font-bold">₹</span>
                                    <span class="text-2xl font-black">{{ number_format($service->price, 0) }}</span>
                                </div>
                            </div>
                            <button onclick="openBookingModal('{{ $service->id }}', '{{ $service->name }}')" class="btn-primary !px-6 !py-3 !rounded-xl !text-[11px] !font-black uppercase tracking-widest shadow-indigo-100 hover:shadow-indigo-200">
                                Deploy Plan
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            
            @if($category->subServices->isEmpty())
                <div class="text-center py-32 animate-fade-in bg-slate-50/30 rounded-[3rem] border-2 border-dashed border-slate-100">
                    <div class="w-24 h-24 bg-white border border-slate-100 rounded-3xl flex items-center justify-center text-4xl shadow-xl mx-auto mb-8">
                        🔍
                    </div>
                    <h3 class="text-3xl font-black text-slate-900 mb-2">Expansion in Progress</h3>
                    <p class="text-slate-500 font-medium max-w-sm mx-auto italic">Our network of specialized providers for {{ strtolower($category->name) }} is currently undergoing certification.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Booking Modal -->
    <div id="bookingModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-md hidden flex items-center justify-center z-50 p-6">
        <div class="glass-card max-w-xl w-full border-none shadow-2xl animate-fade-in overflow-hidden">
            <div class="p-10 bg-slate-900 text-white flex justify-between items-center relative">
                <div class="absolute top-0 right-0 p-4 opacity-5 pointer-events-none text-6xl font-black">SECURE</div>
                <div class="relative z-10">
                    <h3 class="text-3xl font-black tracking-tight" id="modalTitle">Logistic Deployment</h3>
                    <p class="text-indigo-300 text-xs font-bold uppercase tracking-widest mt-1 italic">Authorized booking session</p>
                </div>
                <button onclick="closeBookingModal()" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center text-2xl transition-all">&times;</button>
            </div>
            
            <form action="{{ route('customer.book') }}" method="POST" class="p-10 space-y-8">
                @csrf
                <input type="hidden" name="sub_service_id" id="modalSubServiceId">
                
                <div class="p-6 bg-indigo-50/50 rounded-3xl border border-indigo-100/50 flex items-center gap-6 group hover:bg-white hover:shadow-xl hover:shadow-indigo-100 transition-all duration-300">
                    <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-3xl group-hover:rotate-6 transition-transform">✨</div>
                    <div>
                        <p class="text-[10px] font-black text-indigo-400 uppercase tracking-[0.2em] mb-1">Target Service Module</p>
                        <p id="modalServiceName" class="text-2xl font-black text-indigo-600"></p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-8">
                    <div class="group">
                        <x-input-label for="address" :value="__('Deployment Location')" class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 block" />
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 pointer-events-none italic">📍</span>
                            <x-text-input id="address" class="block w-full !rounded-2xl !bg-slate-50 !border-slate-100 !px-10 !py-4 focus:!ring-indigo-500 focus:!border-indigo-500 font-bold text-slate-700 shadow-inner" type="text" name="address" :value="old('address', Auth::user()->address)" required placeholder="Building, Street, Postcode" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <x-input-label for="booking_date" :value="__('Phase Date')" class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 block" />
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 pointer-events-none italic">📅</span>
                                <x-text-input id="booking_date" class="block w-full !rounded-2xl !bg-slate-50 !border-slate-100 !px-10 !py-4 focus:!ring-indigo-500 focus:!border-indigo-500 font-bold text-slate-700 shadow-inner" type="date" name="booking_date" :value="old('booking_date')" required />
                            </div>
                        </div>
                        <div>
                            <x-input-label for="booking_time" :value="__('Sync Time')" class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 block" />
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 pointer-events-none italic">⌚</span>
                                <x-text-input id="booking_time" class="block w-full !rounded-2xl !bg-slate-50 !border-slate-100 !px-10 !py-4 focus:!ring-indigo-500 focus:!border-indigo-500 font-bold text-slate-700 shadow-inner" type="time" name="booking_time" :value="old('booking_time')" required />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-8 border-t border-slate-50 flex flex-col md:flex-row items-center gap-4">
                    <button type="button" onclick="closeBookingModal()" class="w-full md:w-auto px-8 py-4 text-slate-400 font-black text-[11px] uppercase tracking-widest hover:text-slate-900 transition-colors order-2 md:order-1">Abort Session</button>
                    <button type="submit" class="btn-primary w-full !py-5 !text-[12px] !font-black uppercase tracking-[0.15em] shadow-indigo-200 order-1 md:order-2">Authorize Deployment</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openBookingModal(id, name) {
            document.getElementById('modalSubServiceId').value = id;
            document.getElementById('modalServiceName').innerText = name;
            document.getElementById('bookingModal').classList.remove('hidden');
            document.getElementById('bookingModal').classList.add('flex');
        }
        function closeBookingModal() {
            document.getElementById('bookingModal').classList.add('hidden');
            document.getElementById('bookingModal').classList.remove('flex');
        }
        
        // Close on escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeBookingModal();
        });
    </script>
</x-app-layout>

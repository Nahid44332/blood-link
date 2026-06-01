<!-- ================= DESKTOP SIDEBAR (ফিক্সড ও লাক্সারি) ================= -->
        <aside class="hidden lg:flex w-64 bg-white sidebar-shadow border-r border-slate-100 flex flex-col shrink-0 z-20">
            <!-- লোগো এরিয়া (ইমেজের মতো প্রিসাইজড) -->
            <div class="p-6 pb-5 flex items-center gap-3">
                <div class="bg-[#E53935] text-white p-2.5 rounded-2xl flex items-center justify-center w-11 h-11 shadow-md shadow-red-100">
                    <i class="fas fa-heart text-xl"></i>
                </div>
                <div>
                    <h2 class="text-[17px] font-black tracking-tight text-slate-900 leading-none">BloodLink</h2>
                    <p class="text-[9px] font-bold tracking-widest uppercase text-slate-400 mt-1">Bangladesh</p>
                </div>
            </div>

            <!-- মেনু লিংকসমূহ (অ্যাক্টিভ ও ইন-অ্যাক্টিভ স্টেট ইমেজের মতো নিখুঁত) -->
            <nav class="flex-1 px-4 py-4 space-y-1">
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 bg-[#FFF5F5] text-[#E53935] font-bold rounded-2xl text-[13.5px] transition border-l-4 border-[#E53935]">
                    <i class="fas fa-chart-pie text-base w-5"></i> Dashboard
                </a>
                <a href="{{url('/admin/donors')}}" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-[#E53935] hover:bg-slate-50 font-semibold rounded-2xl text-[13.5px] transition">
                    <i class="fas fa-users text-base w-5"></i> Donors
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-[#E53935] hover:bg-slate-50 font-semibold rounded-2xl text-[13.5px] transition">
                    <i class="fas fa-droplet text-base w-5"></i> Blood Requests
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-[#E53935] hover:bg-slate-50 font-semibold rounded-2xl text-[13.5px] transition">
                    <i class="fas fa-table-cells text-base w-5"></i> Compatibility Grid
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-[#E53935] hover:bg-slate-50 font-semibold rounded-2xl text-[13.5px] transition">
                    <i class="fas fa-heart-pulse text-base w-5"></i> Health Tips
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-[#E53935] hover:bg-slate-50 font-semibold rounded-2xl text-[13.5px] transition">
                    <i class="fas fa-sliders text-base w-5"></i> Settings
                </a>
            </nav>
        </aside>

        <!-- ================= MOBILE SIDEBAR (Drawer Menus with Overlay) ================= -->
        <!-- Overlay -->
        <div id="mobile-overlay" class="fixed inset-0 bg-slate-900/60 lg:hidden" onclick="toggleMobileSidebar()"></div>
        
        <!-- Drawer Panel -->
        <aside id="mobile-sidebar-drawer" class="fixed top-0 left-0 h-full w-64 bg-white sidebar-shadow border-r border-slate-100 flex flex-col shrink-0 lg:hidden z-50 overflow-y-auto sidebar-transition mobile-sidebar-hidden">
            <div class="p-6 pb-5 flex items-center justify-between border-b border-slate-50">
                <div class="flex items-center gap-3">
                    <div class="bg-[#E53935] text-white p-2.5 rounded-2xl flex items-center justify-center w-11 h-11 shadow-md shadow-red-100">
                        <i class="fas fa-heart text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-[17px] font-black tracking-tight text-slate-900 leading-none">BloodLink</h2>
                        <p class="text-[9px] font-bold tracking-widest uppercase text-slate-400 mt-1">Bangladesh</p>
                    </div>
                </div>
                <button class="text-slate-500 hover:text-[#E53935]" onclick="toggleMobileSidebar()">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <nav class="flex-1 px-4 py-4 space-y-1">
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 bg-[#FFF5F5] text-[#E53935] font-bold rounded-2xl text-[13.5px] transition border-l-4 border-[#E53935]">
                    <i class="fas fa-chart-pie text-base w-5"></i> Dashboard
                </a>
                <a href="{{url('/admin/donors')}}" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-[#E53935] hover:bg-slate-50 font-semibold rounded-2xl text-[13.5px] transition">
                    <i class="fas fa-users text-base w-5"></i> Donors
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-[#E53935] hover:bg-slate-50 font-semibold rounded-2xl text-[13.5px] transition">
                    <i class="fas fa-droplet text-base w-5"></i> Blood Requests
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-[#E53935] hover:bg-slate-50 font-semibold rounded-2xl text-[13.5px] transition">
                    <i class="fas fa-table-cells text-base w-5"></i> Compatibility Grid
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-[#E53935] hover:bg-slate-50 font-semibold rounded-2xl text-[13.5px] transition">
                    <i class="fas fa-heart-pulse text-base w-5"></i> Health Tips
                </a>
                <a href="#" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-[#E53935] hover:bg-slate-50 font-semibold rounded-2xl text-[13.5px] transition">
                    <i class="fas fa-sliders text-base w-5"></i> Settings
                </a>
                <a href="{{url('/admin/logout')}}" class="flex items-center gap-3.5 px-4 py-3 text-slate-500 hover:text-red-600 font-semibold rounded-2xl text-[13.5px] transition pt-4 mt-4 border-t border-slate-50">
                    <i class="fas fa-arrow-right-from-bracket text-base w-5"></i> Log Out
                </a>
            </nav>
        </aside>
  <header class="bg-white border-b border-slate-100 px-6 md:px-8 py-4 flex items-center justify-between gap-4 shrink-0 shadow-sm relative z-10 lg:justify-end">
                <!-- Mobile Logo and Burger Menu -->
                <div class="flex items-center gap-3.5 lg:hidden">
                    <button class="text-slate-600 hover:text-[#E53935]" onclick="toggleMobileSidebar()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="flex items-center gap-2">
                        <div class="bg-[#E53935] text-white p-2 rounded-xl flex items-center justify-center w-9 h-9 shadow shadow-red-100">
                            <i class="fas fa-heart text-lg"></i>
                        </div>
                        <h2 class="text-sm font-black text-slate-900 tracking-tight">BloodLink</h2>
                    </div>
                </div>
                
                <div class="flex items-center gap-4 md:gap-5">
                    <!-- ইউজার প্রোফাইল -->
                    <div class="flex items-center gap-3">
                        <div class="text-right hidden sm:block">
                            <p class="text-xs font-bold text-slate-800 leading-none">Admin User</p>
                            <p class="text-[10px] text-slate-400 font-medium mt-1">Super Admin</p>
                        </div>
                        <div class="w-9 h-9 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 font-bold border border-slate-100 shadow-sm">
                            <i class="far fa-user text-sm"></i>
                        </div>
                    </div>
                    <!-- লগআউট বাটন (ডেস্কটপে আইকন+টেক্সট, মোবাইলে আইকন) -->
                    <a href="{{url('/admin/logout')}}" class="flex items-center gap-2 text-xs font-bold text-slate-400 hover:text-red-600 transition">
                        <i class="fas fa-arrow-right-from-bracket text-sm md:text-xs"></i>
                        <span class="hidden md:inline">Logout</span>
                    </a>
                </div>
            </header>
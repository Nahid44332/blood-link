@extends('backend.master')
@section('content')
    <!-- মেইন গ্রিড কন্টেন্ট -->
            <div class="p-6 md:p-8 space-y-6 max-w-[1600px] w-full mx-auto">
                
                <!-- ওয়েলকাম টেক্সট -->
                <div class="py-1">
                    <h2 class="text-2xl md:text-[28px] font-black text-slate-900 tracking-tight">Welcome, Admin!</h2>
                    <p class="text-slate-400 text-xs mt-1 font-medium">Here's a quick overview of BloodLink Bangladesh current statistics.</p>
                </div>

                <!-- প্রথম রো (৩টি মেইন কার্ড) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    <!-- কার্ড ১: টোটাল ডোনার এবং মিনি লিস্ট -->
                    <div class="bg-white rounded-[24px] border border-slate-100 p-6 premium-shadow flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Registered Donors</p>
                                    <h4 class="text-4xl font-black text-slate-900 tracking-tight mt-1.5">2,450</h4>
                                </div>
                                <div class="bg-red-50 text-[#E53935] w-9 h-9 rounded-xl flex items-center justify-center shadow-sm">
                                    <i class="fas fa-users text-sm"></i>
                                </div>
                            </div>
                            
                            <!-- মিনি ডোনার লিস্ট (আইকন এবং প্রপার গ্যাপ সহ) -->
                            <div class="mt-6 border-t border-slate-50 pt-4 space-y-3.5 overflow-x-auto">
                                <p class="text-xs font-bold text-slate-800 mb-2">Mini Donor List</p>
                                <div class="flex items-center justify-between text-xs pb-2 border-b border-slate-50 min-w-[250px]">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 text-[10px] font-bold border border-slate-100">AM</div>
                                        <div>
                                            <p class="font-bold text-slate-700">Anisul Rahman</p>
                                            <p class="text-[10px] text-slate-400 font-medium mt-0.5">DHAKA</p>
                                        </div>
                                    </div>
                                    <a href="#" class="text-slate-300 hover:text-[#E53935] transition px-2"><i class="fas fa-chevron-right text-[10px]"></i></a>
                                </div>
                                <div class="flex items-center justify-between text-xs min-w-[250px]">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 text-[10px] font-bold border border-slate-100">RH</div>
                                        <div>
                                            <p class="font-bold text-slate-700">Rafiqul Hasan</p>
                                            <p class="text-[10px] text-slate-400 font-medium mt-0.5">CHITTAGONG</p>
                                        </div>
                                    </div>
                                    <a href="#" class="text-slate-300 hover:text-[#E53935] transition px-2"><i class="fas fa-chevron-right text-[10px]"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- কার্ড ২: ব্লাড গ্রুপ ডিস্ট্রিবিউশন (ইমেজের মতো গোল রিং চার্ট) -->
                    <div class="bg-white rounded-[24px] border border-slate-100 p-6 premium-shadow flex flex-col">
                        <div class="flex justify-between items-center mb-2 gap-2">
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Blood Group Distribution</p>
                            <button class="text-[10px] font-bold text-white bg-[#2563EB] px-3 py-1.5 rounded-xl shadow-sm shadow-blue-100 hover:bg-blue-700 transition shrink-0">View Chart</button>
                        </div>
                        <div class="flex-1 flex items-center justify-center min-h-[180px]">
                            <div class="w-40 h-40 relative">
                                <canvas id="bloodGroupChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- কার্ড ৩: জিওগ্রাফিক্যাল ডিস্ট্রিবিউশন -->
                    <div class="bg-white rounded-[24px] border border-slate-100 p-6 premium-shadow flex flex-col justify-between">
                        <div>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-4">Geographical Distribution</p>
                            <div class="bg-slate-50 rounded-2xl h-44 flex items-center justify-center overflow-hidden border border-slate-100 relative">
                                <i class="fas fa-map-location-dot text-slate-200 text-[50px] absolute z-0"></i>
                                <div class="text-center p-4 z-10">
                                    <p class="text-xs font-bold text-slate-700">Bangladesh Map View</p>
                                    <p class="text-[10px] text-slate-400 font-medium mt-1">Live donor concentration area density</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- দ্বিতীয় রো (টেবিল এবং বার চার্ট গ্রিড) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    <!-- রিসেন্ট ডোনার্স টেবিল (মোবাইলে ২ কলাম, ডেক্সটপে ৩ কলাম) -->
                    <div class="bg-white rounded-[24px] border border-slate-100 p-6 premium-shadow md:col-span-2 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-center mb-5 gap-2">
                                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Recent Donors</p>
                                <button class="text-[10px] font-bold text-white bg-[#2563EB] px-3 py-1.5 rounded-xl shadow-sm shadow-blue-100 hover:bg-blue-700 transition shrink-0">View Table</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-xs min-w-[500px]">
                                    <thead>
                                        <tr class="bg-slate-50/70 text-slate-400 font-bold border-b border-slate-100">
                                            <th class="p-3.5 rounded-l-xl">Name</th>
                                            <th class="p-3.5">Blood Group</th>
                                            <th class="p-3.5">District</th>
                                            <th class="p-3.5 rounded-r-xl">Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-50 font-semibold text-slate-600">
                                        <tr>
                                            <td class="p-3.5 font-bold text-slate-900">Kamrul Hasan</td>
                                            <td class="p-3.5"><span class="bg-red-50 text-[#E53935] px-3 py-1 rounded-xl text-[11px] font-extrabold border border-red-100/50">A+</span></td>
                                            <td class="p-3.5 text-slate-400 font-medium">Dhaka</td>
                                            <td class="p-3.5 text-slate-500 font-medium">+88017XXXXXXXX</td>
                                        </tr>
                                        <tr>
                                            <td class="p-3.5 font-bold text-slate-900">Jahidul Islam</td>
                                            <td class="p-3.5"><span class="bg-red-50 text-[#E53935] px-3 py-1 rounded-xl text-[11px] font-extrabold border border-red-100/50">O-</span></td>
                                            <td class="p-3.5 text-slate-400 font-medium">Sylhet</td>
                                            <td class="p-3.5 text-slate-500 font-medium">+88019XXXXXXXX</td>
                                        </tr>
                                        <tr>
                                            <td class="p-3.5 font-bold text-slate-900">Mehedi Hasan</td>
                                            <td class="p-3.5"><span class="bg-red-50 text-[#E53935] px-3 py-1 rounded-xl text-[11px] font-extrabold border border-red-100/50">B+</span></td>
                                            <td class="p-3.5 text-slate-400 font-medium">Barishal</td>
                                            <td class="p-3.5 text-slate-500 font-medium">+88015XXXXXXXX</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- ব্লাড স্টক বার চার্ট (ইমেজের কালার কোড ম্যাচিং) -->
                    <div class="bg-white rounded-[24px] border border-slate-100 p-6 premium-shadow flex flex-col justify-between">
                        <div>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-5">Blood Stocks (Bags)</p>
                            <div class="h-44">
                                <canvas id="bloodStockChart"></canvas>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
@endsection
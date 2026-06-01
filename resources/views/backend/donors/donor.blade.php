@extends('backend.master')
@section('content')
    <div class="p-6 bg-white rounded-[24px] border border-slate-100 premium-shadow">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h2 class="text-xl font-bold text-gray-800">All Registered Donors</h2>
                <p class="text-xs text-gray-400 font-medium">Total: {{ $donors->total() }} donors found</p>
            </div>
            <form action="{{ route('admin.donors.list') }}" method="GET" class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or phone..."
                    class="pl-10 pr-10 py-2.5 border border-gray-200 rounded-xl focus:border-red-600 outline-none w-full md:w-64 text-sm">

                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                    <i class="fas fa-search"></i>
                </span>

                @if (request()->filled('search'))
                    <a href="{{ route('admin.donors.list') }}"
                        class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-red-600 transition">
                        <i class="fas fa-times"></i>
                    </a>
                @endif
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs uppercase text-gray-400 border-b">
                        <th class="pb-4 pl-2">SL</th>
                        <th class="pb-4 pl-2">Name</th>
                        <th class="pb-4">Blood Group</th>
                        <th class="pb-4">Phone</th>
                        <th class="pb-4">District</th>
                        <th class="pb-4">Address</th>
                        <th class="pb-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach ($donors as $donor)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="py-4 pl-2 font-bold text-gray-700">{{ $loop->index + 1 }}</td>
                            <td class="py-4 pl-2 font-bold text-gray-700">{{ $donor->name }}</td>
                            <td class="py-4"><span
                                    class="bg-red-50 text-red-600 px-3 py-1 rounded-full font-bold text-xs">{{ $donor->blood_group }}</span>
                            </td>
                            <td class="py-4 text-gray-600">{{ $donor->phone }}</td>
                            <td class="py-4 text-gray-600">{{ $donor->district }}</td>
                            <td class="py-4 text-gray-600">{{ $donor->location }}</td>
                            <td class="py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="tel:{{ $donor->phone }}"
                                        class="p-2 bg-green-100 text-green-600 rounded-lg hover:bg-green-200"
                                        title="Call">
                                        <i class="fas fa-phone-alt"></i>
                                    </a>
                                    <button type="button"
                                        onclick="openEditModal(
                                            '{{ $donor->id }}', 
                                            '{{ $donor->name }}', 
                                            '{{ $donor->blood_group }}', 
                                            '{{ $donor->phone }}', 
                                            '{{ $donor->district }}', 
                                            '{{ $donor->location }}'
                                            )"
                                        class="p-2 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('admin.donors.destroy', $donor->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this donor?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $donors->appends(request()->query())->links() }}
        </div>
    </div>

    <div id="editModal"
        class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-[100] flex items-center justify-center p-4">
        <div class="bg-white rounded-[2rem] p-8 w-full max-w-lg shadow-2xl animate-in fade-in zoom-in duration-300">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-black text-gray-800">Edit Donor Info</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-red-500 transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <form id="editForm" method="POST" class="space-y-4">
                @csrf @method('PUT')

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Full Name</label>
                        <input type="text" id="editName" name="name"
                            class="w-full px-4 py-3 border border-gray-100 rounded-xl focus:border-red-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Blood Group</label>
                        <select id="editBlood" name="blood_group"
                            class="w-full px-4 py-3 border border-gray-100 rounded-xl focus:border-red-500 outline-none transition">
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>O+</option>
                            <option>O-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Phone</label>
                        <input type="text" id="editPhone" name="phone"
                            class="w-full px-4 py-3 border border-gray-100 rounded-xl focus:border-red-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">District</label>
                        <input type="text" id="editDistrict" name="district"
                            class="w-full px-4 py-3 border border-gray-100 rounded-xl focus:border-red-500 outline-none transition">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Location</label>
                    <input type="text" id="editLocation" name="location"
                        class="w-full px-4 py-3 border border-gray-100 rounded-xl focus:border-red-500 outline-none transition">
                </div>

                <button type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white py-4 rounded-xl font-bold transition mt-2">
                    Save Changes
                </button>
            </form>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function openEditModal(id, name, blood, phone, district, location) {
            const form = document.getElementById('editForm');
            // রাউট পাথ চেক করে নিও, যদি প্রয়োজন হয় তবে route() হেল্পার ব্যবহার করবে
            form.action = `/admin/donors/${id}`;

            document.getElementById('editName').value = name;
            document.getElementById('editBlood').value = blood;
            document.getElementById('editPhone').value = phone;
            document.getElementById('editDistrict').value = district;
            document.getElementById('editLocation').value = location;

            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
@endpush

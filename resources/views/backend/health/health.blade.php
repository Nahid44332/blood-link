@extends('backend.master')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Health Tips Management</h2>
            <p class="text-sm text-gray-500">Manage your blood donation health tips here.</p>
        </div>
        <button onclick="openModal()" class="flex items-center gap-2 bg-red-600 text-white px-5 py-2.5 rounded-xl hover:bg-red-700 transition shadow-lg shadow-red-200">
            <i class="fas fa-plus text-sm"></i> Add New Tip
        </button>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50/50">
                <tr>
                    <th class="p-5 font-semibold text-gray-600 uppercase text-xs tracking-wider">Icon</th>
                    <th class="p-5 font-semibold text-gray-600 uppercase text-xs tracking-wider">Title</th>
                    <th class="p-5 font-semibold text-gray-600 uppercase text-xs tracking-wider">Description</th>
                    <th class="p-5 font-semibold text-gray-600 uppercase text-xs tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($facts as $fact)
                <tr class="hover:bg-gray-50/80 transition">
                    <td class="p-5">
                        <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-red-50 text-red-600">
                            <i class="fas {{ $fact->icon }}"></i>
                        </div>
                    </td>
                    <td class="p-5 font-bold text-gray-900">{{ $fact->title }}</td>
                    <td class="p-5 text-gray-500 text-sm leading-relaxed">{{ Str::limit($fact->description, 60) }}</td>
                    <td class="p-5 text-right">
                        <button onclick="openEditModal('{{ $fact->id }}', '{{ $fact->title }}', '{{ $fact->icon }}', '{{ $fact->description }}')" 
        class="text-indigo-600 hover:text-indigo-900 font-medium"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="text-red-600 hover:text-red-900 font-medium text-sm ml-4 transition"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="addModal" class="fixed inset-0 z-50 bg-black/40 backdrop-blur-sm hidden flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-3xl w-full max-w-lg shadow-2xl transform transition-all">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-800">Add New Health Tip</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600"><i class="fas fa-times"></i></button>
        </div>
        
        <form action="{{ route('admin.health.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Title</label>
                <input type="text" name="title" class="w-full border-gray-200 rounded-xl p-3 focus:ring-2 focus:ring-red-100 focus:border-red-400 transition" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Icon Class</label>
                <input type="text" name="icon" class="w-full border-gray-200 rounded-xl p-3 focus:ring-2 focus:ring-red-100 focus:border-red-400 transition" placeholder="e.g., fa-heart">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                <textarea name="description" class="w-full border-gray-200 rounded-xl p-3 focus:ring-2 focus:ring-red-100 focus:border-red-400 transition" rows="3" required></textarea>
            </div>
            <div class="pt-4 flex justify-end gap-3">
                <button type="button" onclick="closeModal()" class="px-6 py-2.5 text-gray-600 font-medium hover:bg-gray-100 rounded-xl transition">Cancel</button>
                <button type="submit" class="bg-red-600 text-white px-8 py-2.5 rounded-xl font-medium hover:bg-red-700 transition">Save Tip</button>
            </div>
        </form>
    </div>
</div>
<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 z-50 bg-black/40 backdrop-blur-sm hidden flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-3xl w-full max-w-lg shadow-2xl">
        <h3 class="text-xl font-bold mb-6">Edit Health Tip</h3>
        
        <form id="editForm" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">Title</label>
                <input type="text" id="editTitle" name="title" class="w-full border p-3 rounded-xl" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">Icon Class</label>
                <input type="text" id="editIcon" name="icon" class="w-full border p-3 rounded-xl">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-semibold mb-1">Description</label>
                <textarea id="editDescription" name="description" class="w-full border p-3 rounded-xl" rows="3" required></textarea>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeEditModal()" class="px-6 py-2.5 text-gray-600">Cancel</button>
                <button type="submit" class="bg-indigo-600 text-white px-8 py-2.5 rounded-xl">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('script')
<script>
    function openModal() { document.getElementById('addModal').classList.remove('hidden'); }
    function closeModal() { document.getElementById('addModal').classList.add('hidden'); }
</script>
<script>
    function openEditModal(id, title, icon, description) {
        // ফর্ম অ্যাকশন আপডেট করা
        document.getElementById('editForm').action = "/admin/health-tips/update/" + id;
        
        // ইনপুট ফিল্ডে ভ্যালু বসানো
        document.getElementById('editTitle').value = title;
        document.getElementById('editIcon').value = icon;
        document.getElementById('editDescription').value = description;
        
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
@endpush
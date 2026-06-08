@extends('backend.master')

@section('content')
<div class="container mx-auto px-4 py-8">
    
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Emergency Contacts</h2>
        <p class="text-gray-500 text-sm">Manage your emergency contact list.</p>
    </div>
    
    <form action="{{ route('admin.emergency.store') }}" method="POST" 
          class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 grid grid-cols-1 md:grid-cols-12 gap-4 mb-8 items-end">
        @csrf
        <div class="md:col-span-5">
            <label class="block text-xs font-semibold text-gray-600 mb-2 uppercase">Bank Name</label>
            <input type="text" name="name" placeholder="e.g., Quantum Foundation" 
                   class="w-full border border-gray-200 p-3 rounded-xl focus:ring-2 focus:ring-red-100 outline-none transition" required>
        </div>
        <div class="md:col-span-5">
            <label class="block text-xs font-semibold text-gray-600 mb-2 uppercase">Phone Number</label>
            <input type="text" name="phone" placeholder="e.g., +880..." 
                   class="w-full border border-gray-200 p-3 rounded-xl focus:ring-2 focus:ring-red-100 outline-none transition" required>
        </div>
        <div class="md:col-span-2">
            <button type="submit" 
                    class="w-full bg-red-600 text-white py-3 rounded-xl font-bold hover:bg-red-700 transition shadow-lg shadow-red-200">
                Add
            </button>
        </div>
    </form>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-x-auto">
        <table class="w-full min-w-[500px] text-left">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-5 text-xs font-bold text-gray-500 uppercase">Bank Name</th>
                    <th class="p-5 text-xs font-bold text-gray-500 uppercase">Phone Number</th>
                    <th class="p-5 text-xs font-bold text-gray-500 uppercase text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($banks as $bank)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="p-5 font-medium text-gray-800">{{ $bank->name }}</td>
                    <td class="p-5 text-gray-600">{{ $bank->phone }}</td>
                    <td class="p-5 text-right">
                        <a href="{{ route('admin.emergency.delete', $bank->id) }}" 
                           onclick="return confirm('Are you sure?')"
                           class="text-red-600 hover:text-red-800 font-bold text-sm bg-red-50 px-3 py-1 rounded-lg">
                           <i class="fas fa-trash-alt mr-1"></i> Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
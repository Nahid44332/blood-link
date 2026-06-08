<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\EmergencyBank;
use App\Models\Fact;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
{
    $query = Donor::query();

    // রক্তের গ্রুপ ফিল্টার
    if ($request->filled('blood_group') && $request->blood_group !== 'Any') {
    $query->where('blood_group', 'LIKE', '%' . $request->blood_group . '%');
}

    // জেলা ফিল্টার
    if ($request->filled('district') && $request->district !== 'Any') {
        $query->where('district', 'LIKE', '%' . $request->district . '%');
    }

    $donors = $query->get();
    $facts = Fact::get();
    $emergencyBanks = EmergencyBank::all();
    return view('frontend.index', compact('donors', 'facts', 'emergencyBanks'));
}

    public function store(Request $request)
    {
        // ভ্যালিডেশন
        $validatedData = $request->validate([
            'name'          => 'required|string|max:255',
            'dob'           => 'required|date',
            'blood_group'   => 'required|string',
            'phone'         => 'required|string|unique:donors,phone',
            'weight'        => 'required|integer',
            'district'      => 'required|string',
            'location'      => 'required|string',
            'last_donation' => 'nullable|date',
            'email'         => 'nullable|email|unique:donors,email',
        ]);

        // ডাটাবেজে সেভ করা
        Donor::create($validatedData);

        // সাকসেস মেসেজ দিয়ে ফেরত পাঠানো
        return redirect()->back()->with('success', 'Donor registered successfully!');
    }
}

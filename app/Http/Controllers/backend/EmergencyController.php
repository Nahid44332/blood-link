<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\EmergencyBank;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function emergencyContacts()
    {
        $banks = EmergencyBank::all();
        return view('backend.emergency.emergency-contacts', compact('banks'));
    }

    public function storeEmergency(Request $request)
    {
        EmergencyBank::create($request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
        ]));
        return back()->with('success', 'Contact added!');
    }

    public function deleteEmergency($id)
    {
        EmergencyBank::findOrFail($id)->delete();
        return back()->with('success', 'Contact deleted!');
    }
}

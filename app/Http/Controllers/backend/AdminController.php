<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function deshboard()
    {
        return view('backend.deshboard');
    }

    public function donors(Request $request)
    {
        $donors = \App\Models\Donor::query();

        if ($request->has('search')) {
            $donors->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%');
        }

        $donors = $donors->latest()->paginate(10);
        return view('backend.donors.donor', compact('donors'));
    }

    public function update(Request $request, $id)
    {
        $donor = \App\Models\Donor::findOrFail($id);
        $donor->update($request->all());

        return redirect()->back()->with('success', 'Donor updated successfully!');
    }

    public function destroy($id)
    {
        $donor = Donor::findOrFail($id);
        $donor->delete();

        return redirect()->back()->with('success', 'Donor deleted successfully!');
    }
}

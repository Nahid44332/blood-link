<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Fact;
use Illuminate\Http\Request;

class HealthTipsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function healthTips()
    {
        $facts = Fact::all();
        return view('backend.health.health', compact('facts'));
    }

    public function storeHealthTip(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'icon' => 'required|string',
            'description' => 'required|string',
        ]);

        Fact::create($request->all());

        return back()->with('success', 'Health tip added successfully!');
    }

    public function updateHealthTip(Request $request, $id)
    {
        // ১. ভ্যালিডেশন
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
            'description' => 'required|string',
        ]);

        // ২. ডাটা খুঁজে আপডেট করা
        $fact = Fact::findOrFail($id);
        $fact->update([
            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description,
        ]);

        // ৩. সাকসেস মেসেজসহ ব্যাক করা
        return back()->with('success', 'Health tip updated successfully!');
    }

    public function deleteHealthTip($id)
    {
        // ১. ডাটা খুঁজে ডিলিট করা
        $fact = Fact::findOrFail($id);
        $fact->delete();

        // ২. মেসেজসহ ব্যাক করা
        return back()->with('success', 'Health tip deleted successfully!');
    }
}

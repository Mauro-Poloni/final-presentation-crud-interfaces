<?php

namespace App\Http\Controllers;

use App\Models\KidsProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KidsProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kids_profiles = KidsProfile::orderBy('created_at', 'desc')->paginate(10);
        return view('kids_profiles.index', compact('kids_profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kids_profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:100',
            'age'            => 'required|integer|min:1|max:15',
            'favorite_color' => 'required|in:blue,red,green,yellow,pink',
            'bio'            => 'nullable|string|max:500',
            'avatar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $validated['avatar_path'] = $request->file('avatar')->store('kids_avatars', 'public');
        }

        KidsProfile::create($validated);

        session()->flash('success', 'New kid profile created successfully!');
        return redirect()->route('kids_profiles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(KidsProfile $kids_profile)
    {
        return view('kids_profiles.show', compact('kids_profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KidsProfile $kids_profile)
    {
        return view('kids_profiles.edit', compact('kids_profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KidsProfile $kids_profile)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:100',
            'age'            => 'required|integer|min:1|max:15',
            'favorite_color' => 'required|in:blue,red,green,yellow,pink',
            'bio'            => 'nullable|string|max:500',
            'avatar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            if ($kids_profile->avatar_path && Storage::disk('public')->exists($kids_profile->avatar_path)) {
                Storage::disk('public')->delete($kids_profile->avatar_path);
            }
            $validated['avatar_path'] = $request->file('avatar')->store('kids_avatars', 'public');
        }

        $kids_profile->update($validated);

        session()->flash('success', 'Profile updated successfully!');
        return redirect()->route('kids_profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KidsProfile $kids_profile)
    {
        if ($kids_profile->avatar_path && Storage::disk('public')->exists($kids_profile->avatar_path)) {
            Storage::disk('public')->delete($kids_profile->avatar_path);
        }

        $kids_profile->delete();

        session()->flash('success', 'Profile deleted successfully!');
        return redirect()->route('kids_profiles.index');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\SocialPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocialPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $social_posts = SocialPost::orderBy('created_at', 'desc')->paginate(10);
        return view('social_posts.index', compact('social_posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('social_posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username'   => 'required|string|max:100',
            'visibility' => 'required|in:public,friends,private',
            'content'    => 'nullable|string|max:1000',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('social_images', 'public');
        }

        $validated['likes'] = 0;

        SocialPost::create($validated);

        session()->flash('success', 'Your post has been shared!');
        return redirect()->route('social_posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialPost $social_post)
    {
        return view('social_posts.show', compact('social_post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialPost $social_post)
    {
        return view('social_posts.edit', compact('social_post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialPost $social_post)
    {
        $validated = $request->validate([
            'username'   => 'required|string|max:100',
            'visibility' => 'required|in:public,friends,private',
            'content'    => 'nullable|string|max:1000',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        if ($request->hasFile('image')) {
            if ($social_post->image_path && Storage::disk('public')->exists($social_post->image_path)) {
                Storage::disk('public')->delete($social_post->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('social_images', 'public');
        }

        $social_post->update($validated);

        session()->flash('success', 'Post updated successfully.');
        return redirect()->route('social_posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialPost $social_post)
    {
        if ($social_post->image_path && Storage::disk('public')->exists($social_post->image_path)) {
            Storage::disk('public')->delete($social_post->image_path);
        }

        $social_post->delete();

        session()->flash('success', 'Post deleted successfully.');
        return redirect()->route('social_posts.index');
    }
}
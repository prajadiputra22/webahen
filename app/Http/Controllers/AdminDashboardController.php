<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('Admin.dashboard', compact('posts'));
    }

    public function create()
    {
        return view('Admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tittle' => 'required|max:255',
            'author' => 'required|max:255',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['tittle']);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = base64_encode(file_get_contents($image));
            $validated['image'] = $imageData;
        }

        Post::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        return view('Admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'tittle' => 'required|max:255',
            'author' => 'required|max:255',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($post->tittle !== $validated['tittle']) {
            $validated['slug'] = Str::slug($validated['tittle']);
        }
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = base64_encode(file_get_contents($image));
            $validated['image'] = $imageData;
        } else {
            // Keep the existing image if no new one is uploaded
            unset($validated['image']);
        }

        $post->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Post deleted successfully!');
    }
}
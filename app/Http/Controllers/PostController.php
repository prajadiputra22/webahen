<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Remove the image from the request data for validation
        $requestData = $request->all();
        $imageFile = null;
        
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            unset($requestData['image']);
        }
        
        // Validate everything except the image
        $request->validate([
            'tittle' => 'required|max:255',
            'author' => 'required|max:255',
            'body' => 'required',
        ]);
        
        // Create a new post
        $post = new Post();
        $post->tittle = $request->tittle;
        $post->author = $request->author;
        $post->body = $request->body;
        $post->slug = Str::slug($request->tittle);
        
        // Handle the image file if it exists
        if ($imageFile) {
            // Validate that it's an image
            if ($imageFile->isValid() && in_array($imageFile->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                // Upload the file
                $imagePath = $imageFile->store('posts', 'public');
                
                // Generate a URL for the uploaded file
                $imageUrl = asset('storage/' . $imagePath);
                
                // Store the URL in the database
                $post->image = $imageUrl;
            }
        }
        
        $post->save();
        
        return redirect()->route('admin.dashboard')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Remove the image from the request data for validation
        $requestData = $request->all();
        $imageFile = null;
        
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            unset($requestData['image']);
        }
        
        // Validate everything except the image
        $request->validate([
            'tittle' => 'required|max:255',
            'author' => 'required|max:255',
            'body' => 'required',
        ]);
        
        // Update the post
        $post->tittle = $request->tittle;
        $post->author = $request->author;
        $post->body = $request->body;
        $post->slug = Str::slug($request->tittle);
        
        // Handle the image file if it exists
        if ($imageFile) {
            // Validate that it's an image
            if ($imageFile->isValid() && in_array($imageFile->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                // Try to delete the old image if it exists
                $oldImageUrl = $post->image;
                if ($oldImageUrl) {
                    $storageUrl = asset('storage/');
                    if (strpos($oldImageUrl, $storageUrl) === 0) {
                        $oldImagePath = str_replace($storageUrl . '/', '', $oldImageUrl);
                        if (Storage::disk('public')->exists($oldImagePath)) {
                            Storage::disk('public')->delete($oldImagePath);
                        }
                    }
                }
                
                // Upload the new file
                $imagePath = $imageFile->store('posts', 'public');
                
                // Generate a URL for the uploaded file
                $imageUrl = asset('storage/' . $imagePath);
                
                // Store the URL in the database
                $post->image = $imageUrl;
            }
        }
        
        $post->save();
        
        return redirect()->route('admin.dashboard')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Try to delete the image if it exists
        $imageUrl = $post->image;
        if ($imageUrl) {
            $storageUrl = asset('storage/');
            if (strpos($imageUrl, $storageUrl) === 0) {
                $imagePath = str_replace($storageUrl . '/', '', $imageUrl);
                if (Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }
            }
        }
        
        $post->delete();
        
        return redirect()->route('admin.dashboard')->with('success', 'Post deleted successfully!');
    }
}

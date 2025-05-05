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
        // Validate the request
        $request->validate([
            'tittle' => 'required|max:255',
            'author' => 'required|max:255',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new post
        $post = new Post();
        $post->tittle = $request->tittle;
        $post->author = $request->author;
        $post->body = $request->body;
        $post->slug = Str::slug($request->tittle);

        // Handle the image file if it exists
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                // Convert image to base64 string
                $imageData = base64_encode(file_get_contents($image));
                $post->image = $imageData;
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
        // Validate the request
        $request->validate([
            'tittle' => 'required|max:255',
            'author' => 'required|max:255',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the post
        $post->tittle = $request->tittle;
        $post->author = $request->author;
        $post->body = $request->body;
        $post->slug = Str::slug($request->tittle);

        // Handle the image file if it exists
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                // Convert image to base64 string
                $imageData = base64_encode(file_get_contents($image));
                $post->image = $imageData;
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

    /**
     * Search for posts based on query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $query = $request->input('q');

        $posts = Post::query();

        if ($query) {
            $posts = $posts->where('tittle', 'LIKE', $query . '%')
                ->orWhere('body', 'LIKE', $query . '%')
                ->orWhere('author', 'LIKE', $query . '%');
        }

        $posts = $posts->latest()->get();

        $posts = $posts->map(function ($post) {
            $post->excerpt = Str::limit(strip_tags($post->body), 100);
            $post->time_ago = $post->created_at ? $post->created_at->diffForHumans() : 'Recently';
            return $post;
        });

        return response()->json([
            'posts' => $posts,
        ]);
    }
}

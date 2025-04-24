@extends('Admin.layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Post</h1>
            <p class="text-gray-600">Update the form below to edit this blog post.</p>
        </div>

        <form method="POST" action="{{ route('admin.posts.update', $post) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="tittle" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" name="tittle" id="tittle" value="{{ old('tittle', $post->tittle) }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tittle') border-red-500 @enderror">
                @error('tittle')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Author</label>
                <input type="text" name="author" id="author" value="{{ old('author', $post->author) }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('author') border-red-500 @enderror">
                @error('author')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image URL</label>
                <input type="text" name="image" id="image" value="{{ old('image', $post->image) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror"
                    placeholder="https://example.com/image.jpg">
                <p class="text-gray-500 text-xs mt-1">Enter a URL for the featured image (optional)</p>
                @error('image')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                <textarea name="body" id="body" rows="10" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('body') border-red-500 @enderror">{{ old('body', $post->body) }}</textarea>
                <p class="text-gray-500 text-xs mt-1">You can use HTML tags for formatting</p>
                @error('body')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Cancel
                </a>
                <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Post
                </button>
            </div>
        </form>
    </div>
@endsection

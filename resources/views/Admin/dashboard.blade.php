@extends('Admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <style>
        /* Custom scrollbar styles */
        .scrollbar-thin::-webkit-scrollbar {
            height: 6px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 3px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* For Firefox */
        .scrollbar-thin {
            scrollbar-width: thin;
            scrollbar-color: #888 #f1f1f1;
        }
    </style>
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Manage Posts</h1>
            <a href="{{ route('admin.posts.create') }}"
                class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-plus mr-2"></i> Add New Post
            </a>
        </div>

        @if ($posts->count())
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th
                                class="py-3 px-4 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title</th>
                            <th
                                class="py-3 px-4 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Author</th>
                            <th
                                class="py-3 px-4 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date</th>
                            <th
                                class="py-3 px-4 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($posts as $post)
                            <tr>
                                <td class="py-4 px-4 max-w-xs">
                                    <div
                                        class="overflow-x-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                                        <div class="text-sm font-medium text-gray-900 min-w-max">{{ $post->tittle }}</div>
                                        <div class="text-sm text-gray-500 min-w-max">{{ $post->slug }}</div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $post->author }}</div>
                                </td>
                                <td class="py-4 px-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        @if ($post->created_at)
                                            {{ $post->created_at->format('M d, Y') }}
                                        @else
                                            N/A
                                        @endif
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-sm font-medium min-w-[180px]">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.posts.edit', $post) }}"
                                            class="text-blue-600 hover:text-blue-900">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="/posts/{{ $post->slug }}" target="_blank"
                                            class="text-green-600 hover:text-green-900">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <form method="POST" action="{{ route('admin.posts.destroy', $post) }}"
                                            class="inline"
                                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-newspaper text-gray-300 text-5xl mb-4"></i>
                <p class="text-gray-500 text-lg">No posts found. Create your first post!</p>
                <a href="{{ route('admin.posts.create') }}"
                    class="mt-4 inline-block bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-plus mr-2"></i> Add New Post
                </a>
            </div>
        @endif
    </div>
@endsection

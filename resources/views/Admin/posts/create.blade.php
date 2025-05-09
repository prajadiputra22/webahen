@extends('Admin.layouts.app')

@section('title', 'Create Post')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Create New Post</h1>
            <p class="text-gray-600">Fill in the form below to create a new blog post.</p>
        </div>

        <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="tittle" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" name="tittle" id="tittle" value="{{ old('tittle') }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('tittle') border-red-500 @enderror">
                @error('tittle')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Author</label>
                <input type="text" name="author" id="author" value="{{ old('author') }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('author') border-red-500 @enderror">
                @error('author')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Featured Image</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror">
                <p class="text-gray-500 text-xs mt-1">Upload an image for the featured post (optional)</p>
                @error('image')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                <div class="mb-2 text-sm text-gray-600">
                    <span class="font-medium">Format teks:</span>
                    <button type="button" onclick="insertTag('strong')"
                        class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300 mr-1">Bold</button>
                    <button type="button" onclick="insertTag('em')"
                        class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300 mr-1">Italic</button>
                    <button type="button" onclick="insertTag('u')"
                        class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300 mr-1">Underline</button>
                    <button type="button" onclick="insertTag('h2')"
                        class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300 mr-1">Heading</button>
                    <button type="button" onclick="insertLink()"
                        class="px-2 py-1 bg-blue-200 rounded hover:bg-blue-300 mr-1">Link</button>
                    <button type="button" onclick="insertImage()"
                        class="px-2 py-1 bg-green-200 rounded hover:bg-green-300">Image</button>
                </div>
                <textarea name="body" id="body" rows="10" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('body') border-red-500 @enderror">{{ old('body') }}</textarea>
                <p class="text-gray-500 text-xs mt-1">Anda dapat menggunakan tag HTML untuk format teks: &lt;strong&gt;teks
                    tebal&lt;/strong&gt;, &lt;em&gt;teks miring&lt;/em&gt;, dll.</p>
                @error('body')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('admin.dashboard') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Cancel
                </a>
                <button type="submit"
                    class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Create Post
                </button>
            </div>
        </form>
    </div>

    <script>
        function insertTag(tag) {
            const textarea = document.getElementById('body');
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const selectedText = textarea.value.substring(start, end);
            const replacement = `<${tag}>${selectedText}</${tag}>`;

            textarea.value = textarea.value.substring(0, start) + replacement + textarea.value.substring(end);

            // Atur kursor setelah tag yang disisipkan
            const newCursorPos = start + replacement.length;
            textarea.focus();
            textarea.setSelectionRange(newCursorPos, newCursorPos);
        }

        function insertLink() {
            const textarea = document.getElementById('body');
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const selectedText = textarea.value.substring(start, end);

            const url = prompt('Masukkan URL:', 'https://');
            if (url) {
                const linkText = selectedText || 'Link Text';
                const replacement = `<a href="${url}" target="_blank">${linkText}</a>`;

                textarea.value = textarea.value.substring(0, start) + replacement + textarea.value.substring(end);

                // Atur kursor setelah tag yang disisipkan
                const newCursorPos = start + replacement.length;
                textarea.focus();
                textarea.setSelectionRange(newCursorPos, newCursorPos);
            }
        }

        function insertImage() {
            const textarea = document.getElementById('body');
            const start = textarea.selectionStart;

            const imageUrl = prompt('Masukkan URL gambar:', 'https://');
            if (imageUrl) {
                const altText = prompt('Masukkan teks alternatif (alt text):', '');
                const replacement = `<img src="${imageUrl}" alt="${altText}" class="w-full rounded-lg my-4">`;

                textarea.value = textarea.value.substring(0, start) + replacement + textarea.value.substring(start);

                // Atur kursor setelah tag yang disisipkan
                const newCursorPos = start + replacement.length;
                textarea.focus();
                textarea.setSelectionRange(newCursorPos, newCursorPos);
            }
        }
    </script>
@endsection

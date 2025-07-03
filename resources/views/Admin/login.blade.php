<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Sugar Ahen</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/img/ahen.png">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-amber-500 py-4">
            <h2 class="text-center text-2xl font-bold text-white">Admin Login</h2>
        </div>
        <div class="p-6">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}" id="loginForm">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}" autofocus
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('username') border-red-500 @enderror">
                    <div id="usernameError" class="hidden mt-1">
                        <p class="text-red-500 text-xs italic">Username is required.</p>
                    </div>
                    {{-- Only show server-side error if it's NOT the login credential error --}}
                    @error('username')
                        @if ($message !== 'Incorrect username or password.')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @endif
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" name="password" id="password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror">
                    <div id="passwordError" class="hidden mt-1">
                        <p class="text-red-500 text-xs italic">Password is required.</p>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Error message for empty fields -->
                <div id="emptyFieldsError" class="hidden mb-4">
                    <p class="text-red-500 text-sm font-medium">Username and password cannot be empty</p>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember" class="text-sm text-gray-700">Remember me</label>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                        Login
                    </button>
                </div>
            </form>

            {{-- <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">Don't have an account? <a href="{{ route('admin.register') }}" class="text-amber-500 hover:text-amber-600">Register</a></p>
            </div> --}}
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            const emptyFieldsError = document.getElementById('emptyFieldsError');
            const usernameError = document.getElementById('usernameError');
            const passwordError = document.getElementById('passwordError');
            const usernameInput = document.getElementById('username');
            const passwordInput = document.getElementById('password');

            // Hide all error messages initially
            emptyFieldsError.classList.add('hidden');
            usernameError.classList.add('hidden');
            passwordError.classList.add('hidden');

            // Remove error styling from inputs
            usernameInput.classList.remove('border-red-500');
            passwordInput.classList.remove('border-red-500');

            let hasError = false;

            // Check if both fields are empty
            if (username === '' && password === '') {
                e.preventDefault();
                emptyFieldsError.classList.remove('hidden');
                usernameInput.classList.add('border-red-500');
                passwordInput.classList.add('border-red-500');
                usernameInput.focus();
                hasError = true;
            } else {
                // Check individual fields
                if (username === '') {
                    e.preventDefault();
                    usernameError.classList.remove('hidden');
                    usernameInput.classList.add('border-red-500');
                    if (!hasError) {
                        usernameInput.focus();
                    }
                    hasError = true;
                }

                if (password === '') {
                    e.preventDefault();
                    passwordError.classList.remove('hidden');
                    passwordInput.classList.add('border-red-500');
                    if (!hasError) {
                        passwordInput.focus();
                    }
                    hasError = true;
                }
            }

            if (hasError) {
                return false;
            }
        });

        // Hide username error when user starts typing
        document.getElementById('username').addEventListener('input', function() {
            const usernameError = document.getElementById('usernameError');
            const emptyFieldsError = document.getElementById('emptyFieldsError');

            if (this.value.trim() !== '') {
                usernameError.classList.add('hidden');
                this.classList.remove('border-red-500');

                // Also hide the "both empty" error if username is filled
                const password = document.getElementById('password').value.trim();
                if (password !== '') {
                    emptyFieldsError.classList.add('hidden');
                    document.getElementById('password').classList.remove('border-red-500');
                }
            }
        });

        // Hide password error when user starts typing
        document.getElementById('password').addEventListener('input', function() {
            const passwordError = document.getElementById('passwordError');
            const emptyFieldsError = document.getElementById('emptyFieldsError');

            if (this.value.trim() !== '') {
                passwordError.classList.add('hidden');
                this.classList.remove('border-red-500');

                // Also hide the "both empty" error if password is filled
                const username = document.getElementById('username').value.trim();
                if (username !== '') {
                    emptyFieldsError.classList.add('hidden');
                    document.getElementById('username').classList.remove('border-red-500');
                }
            }
        });
    </script>
</body>

</html>

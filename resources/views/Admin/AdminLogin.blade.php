<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen items-center justify-center bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900">

    <div class="w-full max-w-md rounded-lg bg-white px-8 py-6 shadow-lg">
        
        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-indigo-600">Admin Login</h1>
            <p class="text-sm text-gray-600">Welcome back! Please log in to continue.</p>
        </div>

        <form method="POST" action="{{ route('admin.authenticate') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="mb-2 block text-sm font-semibold text-gray-600">Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="admin@example.com" 
                    value="{{ old('email') }}" 
                    required 
                    class="w-full rounded-lg border px-4 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        
            <div class="mb-4">
                <label for="password" class="mb-2 block text-sm font-semibold text-gray-600">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="********" 
                    required 
                    class="w-full rounded-lg border px-4 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        
            <div class="mb-6 flex items-center justify-between">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-indigo-600">
                    <span class="ml-2 text-sm text-gray-600">Remember Me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
                    Forgot Password?
                </a>
            </div>
        
            <button 
                type="submit" 
                class="w-full rounded-lg bg-indigo-600 px-4 py-2 text-white transition hover:bg-indigo-700">
                Log In
            </button>
        </form>

        @if(session('error'))
            <div class="mt-4 text-sm text-red-500">
                {{ session('error') }}
            </div>
        @endif
    </div>

</body>
</html>

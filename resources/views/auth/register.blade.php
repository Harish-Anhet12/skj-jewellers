<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Admin Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-900 antialiased">
    <div class="flex min-h-screen">
        <!-- Form Container -->
        <div class="w-full flex flex-col justify-center px-8 sm:px-16 md:px-24 xl:px-32 relative py-12">
            
            <div class="absolute top-8 right-8">
                <span class="text-sm text-gray-500">Already have an account?</span>
                <a href="{{ route('login') }}" class="ml-2 text-sm font-semibold text-purple-600 hover:text-purple-500 transition-colors">Sign in</a>
            </div>

            <div class="w-full max-w-md mx-auto">
                <div class="mb-10">
                    <h2 class="text-3xl font-bold text-gray-900">Create an account</h2>
                    <p class="text-gray-500 mt-2">Fill in your details to get started.</p>
                </div>
                
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700">
                                    {{ $errors->first() }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="/register" class="space-y-5">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors placeholder-gray-400" placeholder="John Doe">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors placeholder-gray-400" placeholder="john@example.com">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" name="password" type="password" required class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors placeholder-gray-400" placeholder="••••••••">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition-colors placeholder-gray-400" placeholder="••••••••">
                    </div>

                    <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-sm font-semibold text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors mt-6">
                        Create account
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task Manager</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50">
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="max-w-2xl w-full bg-white rounded-lg shadow-md p-8">
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">
                    Task Manager
                </h1>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="{{ route('admin.login') }}" class="aspect-square flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 group">
                        <span class="text-lg font-semibold text-gray-700 group-hover:text-blue-600">Admin</span>
                        <span class="mt-1 text-sm text-gray-500">Login</span>
                    </a>
                    <a href={{ route('manager.login') }} class="aspect-square flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 group">
                        <span class="text-lg font-semibold text-gray-700 group-hover:text-blue-600">Manager</span>
                        <span class="mt-1 text-sm text-gray-500">Login</span>
                    </a>
                    <a href="{{ route('login') }}" class="aspect-square flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 group">
                        <span class="text-lg font-semibold text-gray-700 group-hover:text-blue-600">User</span>
                        <span class="mt-1 text-sm text-gray-500">Login</span>
                    </a>
                    <a href="{{ route('register') }}" class="aspect-square flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition duration-200 group">
                        <span class="text-lg font-semibold text-gray-700 group-hover:text-blue-600">Register</span>
                        <span class="mt-1 text-sm text-gray-500">New User</span>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>

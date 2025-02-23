<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Student Manager</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- TailwindCSS Styles -->
    <link rel="stylesheet" href="{{ tailwindcss('css/app.css') }}" />
</head>
<body class="flex flex-col min-h-screen">
    <!-- Header -->
    <header class="bg-blue-600 text-white py-4">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-bold">Student Management System</h1>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-gray-100 shadow">
        <div class="container mx-auto px-4">
            <div class="flex space-x-6 py-3">
                <a href="/" class="@if(request()->is('/')) text-blue-600 font-bold @endif hover:text-blue-600">Home</a>
                <a href="/manage" class="@if(request()->is('manage')) text-blue-600 font-bold @endif hover:text-blue-600">Manage</a>
                <a href="/search" class="@if(request()->is('search')) text-blue-600 font-bold @endif hover:text-blue-600">Search</a>
                <a href="/about" class="@if(request()->is('about')) text-blue-600 font-bold @endif hover:text-blue-600">About</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Student Management System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
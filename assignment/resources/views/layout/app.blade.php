<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
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
                <a href="{{ route('home') }}" class="@if(request()->routeIs('home')) text-blue-600 font-bold @endif hover:text-blue-600">Home</a>
      
                <a href="{{ route('about') }}" class="@if(request()->routeIs('about')) text-blue-600 font-bold @endif hover:text-blue-600">About</a>
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
            <p>&copy; {{ date('Y') }} Inventory Management System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
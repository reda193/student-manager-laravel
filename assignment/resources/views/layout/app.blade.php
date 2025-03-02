<!DOCTYPE html> <!-- HTML5 document type declaration -->
<html lang="en"> <!-- Sets the language of the document to English -->
<head>
    <meta charset="utf-8"> <!-- Sets character encoding to UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsive viewport settings -->
    <title>Student Manager</title> <!-- Page title shown in browser tab -->
    <script src="https://cdn.tailwindcss.com"></script> <!-- Import Tailwind CSS from CDN -->
    <style>
        /* CSS animation for bounce effect */
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body class="flex flex-col min-h-screen"> <!-- Flex column layout with minimum full height -->
    <!-- Header section containing the site title -->
    <header class="bg-blue-600 text-white py-4">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-bold">Student Management System</h1>
        </div>
    </header>
    
    <!-- Navigation bar with links to different pages -->
    <nav class="bg-gray-100 shadow">
        <div class="container mx-auto px-4">
            <div class="flex space-x-6 py-3">
                <!-- Navigation links with active state highlighting -->
                <a href="{{ route('home') }}" class="@if(request()->routeIs('home')) text-blue-600 font-bold @endif hover:text-blue-600">Home</a>
                <a href="{{ url('/manage') }}" class="@if(request()->is('manage')) text-blue-600 font-bold @endif hover:text-blue-600">Manage</a>
                <a href="{{ url('/search') }}" class="@if(request()->is('search')) text-blue-600 font-bold @endif hover:text-blue-600">Search</a>
                <a href="{{ route('about') }}" class="@if(request()->routeIs('about')) text-blue-600 font-bold @endif hover:text-blue-600">About</a>
            </div>
        </div>
    </nav>
    
    <!-- Main content section where page-specific content will be inserted -->
    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content') <!-- Blade directive for yielding page-specific content -->
    </main>
    
    <!-- Footer section with copyright information -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Inventory Management System. All rights reserved.</p> <!-- Dynamic year using PHP -->
        </div>
    </footer>
</body>
</html>
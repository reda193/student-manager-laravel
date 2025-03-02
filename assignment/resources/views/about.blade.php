@extends('layout.app')  <!-- Extends the main app layout template -->
 
@section('content')  <!-- Defines the content section that will be injected into the layout -->

<div class="flex">  <!-- Flex container to organize content in a row -->
    <!-- Main content section (80% width) -->
    <div class="w-4/5 pr-8">
        <h2 class="text-2xl font-bold mb-4">About Our Inventory Management System</h2>
        <p class="mb-4">
            This application is designed for managing inventory records efficiently. It allows you to create, read, update, and 
            delete inventory items with ease. You can also search for items based on various criteria.
        </p>
        <p>
            Our system is built with Laravel and provides a simple interface for all your inventory management needs.
        </p>
    </div>
      
    <!-- Sidebar section with contact information -->
    <div class="w-1/5 bg-gray-100 p-4 rounded">
        <h3 class="font-bold mb-4">IT Support</h3>
        <!-- Display the support team image from public/images directory -->
        <img src="{{ asset('images/tech_supp.png') }}" alt="IT Support" class="mb-4 rounded">
        <p class="text-sm">
            Need help? Contact our IT support team:
            <!-- Email link with hover styling -->
            <a href="mailto:support@support.com" class="text-blue-600 hover:underline">support@example.com</a>
        </p>
    </div>
</div>

@endsection  <!-- End of the content section -->
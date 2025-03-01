@extends('layout.app')

@section('content')
<div class="flex">
    <!-- Main content (80%) -->
    <div class="w-4/5 pr-8">
        <h2 class="text-2xl font-bold mb-4">About Our Inventory Management System</h2>
        <p class="mb-4">
            This application is designed for managing inventory records efficiently. It allows you to create, read, update, and 
            delete inventory items with ease. You can also search for items based on various criteria.
        </p>
        <p>
            Our system is built with Laravel and provides a simple yet powerful interface for all your inventory management needs.
        </p>
    </div>
    
    <!-- Sidebar (20%) -->
    <div class="w-1/5 bg-gray-100 p-4 rounded">
        <h3 class="font-bold mb-4">IT Support</h3>
        <img src="https://via.placeholder.com/150?text=Support" alt="IT Support" class="mb-4 rounded">
        <p class="text-sm">
            Need help? Contact our IT support team:
            <a href="mailto:support@example.com" class="text-blue-600 hover:underline">support@example.com</a>
        </p>
    </div>
</div>
@endsection
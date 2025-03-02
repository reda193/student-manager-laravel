@extends('layout.app')  <!-- Extends the main app layout template -->

@section('content')  <!-- Defines the content section that will be injected into the layout -->
<div class="text-center py-12">  <!-- Centered content container with padding -->
    <h2 class="text-3xl font-bold mb-4">Welcome to the Student Inventory Management System</h2>  <!-- Main heading -->
    <!-- Display the home page banner image from the public/images directory -->
    <img src="{{ asset('images/inventory_home_page.jpg') }}" alt="Inventory System" class="mx-auto my-6 max-w-2xl">
    <!-- Descriptive text with styling and size constraints -->
    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
        Start managing your inventory efficiently. Use the navigation bar above to explore, search, and manage your inventory items.
    </p>
</div>
@endsection  <!-- End of content section -->
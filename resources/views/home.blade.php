@extends('layouts.app')

@section('content')
<div class="container mx-auto text-center py-8">
    <h1 class="text-2xl font-bold mb-6">Student Manager</h1>
    
    <div class="max-w-md mx-auto mb-8">
        <img src="{{ asset('images/inventory.jpg') }}"
             alt="Student Management System"
             class="w-1/2 max-w-md h-auto rounded-lg shadow-md mx-auto">
    </div>
    
    <p class="text-4xl text-gray-700 max-w-2xl mx-auto">
        Efficiently manage student records with our Student Manager application. 
        Create, update, search, and track student information with ease.
    </p>
</div>
@endsection
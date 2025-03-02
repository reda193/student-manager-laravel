@extends('layout.app')  <!-- Extends the main app layout template -->

@section('content')  <!-- Defines the content section that will be injected into the layout -->
<div>
    <h2 class="text-2xl font-bold mb-4">Manage Inventory</h2>  <!-- Page title -->
    
    <!-- Create New Item Link - Button to show the create form -->
    <div class="mb-6">
        <a href="{{ route('manage.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Create New Item
        </a>
    </div>
    
    <!-- Create Form - Only displayed when $showForm is true -->
    @if(isset($showForm) && $showForm)
    <div class="bg-gray-100 p-4 rounded mb-6">
        <h3 class="font-bold mb-4">Create New Item</h3>
        <!-- Form posts to the store route to create a new inventory item -->
        <form action="{{ route('manage.store') }}" method="POST">
            @csrf  <!-- CSRF protection token -->
            <div class="grid grid-cols-1 gap-4">  <!-- Form layout with vertical spacing -->
                <div>
                    <!-- Name input field -->
                    <label for="name" class="block mb-1">Name</label>
                    <input type="text" name="name" id="name" required 
                        class="w-full px-3 py-2 border rounded">
                </div>
                <div>
                    <!-- Description textarea -->
                    <label for="description" class="block mb-1">Description</label>
                    <textarea name="description" id="description" required 
                        class="w-full px-3 py-2 border rounded"></textarea>
                </div>
                <div>
                    <!-- Product code input field -->
                    <label for="product_code" class="block mb-1">Product Code</label>
                    <input type="text" name="product_code" id="product_code" required 
                        class="w-full px-3 py-2 border rounded">
                </div>
                <div>
                    <!-- Price input field with step and min validation -->
                    <label for="price" class="block mb-1">Price</label>
                    <input type="number" name="price" id="price" step="0.01" min="0" required 
                        class="w-full px-3 py-2 border rounded">
                </div>
                <div>
                    <!-- Submit button for creating item -->
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                        Create Item
                    </button>
                </div>
            </div>
        </form>
    </div>
    @endif
    
    <!-- Edit Form - Only displayed when $editItem is provided -->
    @if(isset($editItem))
    <div class="bg-gray-100 p-4 rounded mb-6">
        <h3 class="font-bold mb-4">Edit Item</h3>
        <!-- Form posts to the update route with the item ID to update an existing item -->
        <form action="{{ route('manage.update', $editItem->id) }}" method="POST">
            @csrf  <!-- CSRF protection token -->
            @method('PUT')  <!-- HTTP method spoofing for PUT request -->
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <!-- Name input field with existing value -->
                    <label for="name" class="block mb-1">Name</label>
                    <input type="text" name="name" id="name" value="{{ $editItem->name }}" required 
                        class="w-full px-3 py-2 border rounded">
                </div>
                <div>
                    <!-- Description textarea with existing value -->
                    <label for="description" class="block mb-1">Description</label>
                    <textarea name="description" id="description" required 
                        class="w-full px-3 py-2 border rounded">{{ $editItem->description }}</textarea>
                </div>
                <div>
                    <!-- Product code input field with existing value -->
                    <label for="product_code" class="block mb-1">Product Code</label>
                    <input type="text" name="product_code" id="product_code" value="{{ $editItem->product_code }}" required 
                        class="w-full px-3 py-2 border rounded">
                </div>
                <div>
                    <!-- Price input field with existing value -->
                    <label for="price" class="block mb-1">Price</label>
                    <input type="number" name="price" id="price" step="0.01" min="0" value="{{ $editItem->price }}" required 
                        class="w-full px-3 py-2 border rounded">
                </div>
                <div>
                    <!-- Submit button for updating item -->
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                        Update Item
                    </button>
                    <!-- Cancel button returns to inventory list -->
                    <a href="{{ route('manage.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded ml-2">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
    @endif
    
    <!-- Inventory Table - Displays all inventory items -->
    <div class="overflow-x-auto">  <!-- Table wrapper for horizontal scrolling on small screens -->
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>  <!-- Table header row with column specifications -->
                    <th class="w-16 px-4 py-2 border-b text-left">ID</th>
                    <th class="w-1/6 px-4 py-2 border-b text-left">Name</th>
                    <th class="w-1/3 px-4 py-2 border-b text-left">Description</th>
                    <th class="w-1/6 px-4 py-2 border-b text-left">Product Code</th>
                    <th class="w-1/6 px-4 py-2 border-b text-right">Price</th>
                    <th class="w-1/6 px-4 py-2 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through each inventory item -->
                @foreach($items as $item)
                <tr>
                    <td class="px-4 py-2 border-b text-left">{{ $item->id }}</td>
                    <td class="px-4 py-2 border-b text-left">{{ $item->name }}</td>
                    <td class="px-4 py-2 border-b text-left">{{ $item->description }}</td>
                    <td class="px-4 py-2 border-b text-left">{{ $item->product_code }}</td>
                    <!-- Format price as currency with 2 decimal places -->
                    <td class="px-4 py-2 border-b text-right">${{ number_format($item->price, 2) }}</td>
                    <td class="px-4 py-2 border-b text-center">
                        <!-- Edit link for this item -->
                        <a href="{{ route('manage.edit', $item->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                        <!-- Delete form with confirmation dialog -->
                        <form action="{{ route('manage.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf  <!-- CSRF protection token -->
                            @method('DELETE')  <!-- HTTP method spoofing for DELETE request -->
                            <button type="submit" class="text-red-600 hover:underline" 
                                onclick="return confirm('Are you sure you want to delete this item?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                
                <!-- Display message when no items exist -->
                @if(count($items) == 0)
                <tr>
                    <td colspan="6" class="px-4 py-2 text-center">No items found.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection  <!-- End of content section -->
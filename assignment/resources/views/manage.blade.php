@extends('layout.app')

@section('content')
<div>
    <h2 class="text-2xl font-bold mb-4">Manage Inventory</h2>
    
    <!-- Create New Item Link -->
    <div class="mb-6">
        <a href="{{ route('manage.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Create New Item
        </a>
    </div>
    
    <!-- Create/Edit Form -->
    @if(isset($showForm) && $showForm)
    <div class="bg-gray-100 p-4 rounded mb-6">
        <h3 class="font-bold mb-4">Create New Item</h3>
        <form action="{{ route('manage.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="name" class="block mb-1">Name</label>
                    <input type="text" name="name" id="name" required 
                        class="w-full px-3 py-2 border rounded">
                </div>
                <div>
                    <label for="description" class="block mb-1">Description</label>
                    <textarea name="description" id="description" required 
                        class="w-full px-3 py-2 border rounded"></textarea>
                </div>
                <div>
                    <label for="product_code" class="block mb-1">Product Code</label>
                    <input type="text" name="product_code" id="product_code" required 
                        class="w-full px-3 py-2 border rounded">
                </div>
                <div>
                    <label for="price" class="block mb-1">Price</label>
                    <input type="number" name="price" id="price" step="0.01" min="0" required 
                        class="w-full px-3 py-2 border rounded">
                </div>
                <div>
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                        Create Item
                    </button>
                </div>
            </div>
        </form>
    </div>
    @endif
    
    @if(isset($editItem))
    <div class="bg-gray-100 p-4 rounded mb-6">
        <h3 class="font-bold mb-4">Edit Item</h3>
        <form action="{{ route('manage.update', $editItem->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="name" class="block mb-1">Name</label>
                    <input type="text" name="name" id="name" value="{{ $editItem->name }}" required 
                        class="w-full px-3 py-2 border rounded">
                </div>
                <div>
                    <label for="description" class="block mb-1">Description</label>
                    <textarea name="description" id="description" required 
                        class="w-full px-3 py-2 border rounded">{{ $editItem->description }}</textarea>
                </div>
                <div>
                    <label for="product_code" class="block mb-1">Product Code</label>
                    <input type="text" name="product_code" id="product_code" value="{{ $editItem->product_code }}" required 
                        class="w-full px-3 py-2 border rounded">
                </div>
                <div>
                    <label for="price" class="block mb-1">Price</label>
                    <input type="number" name="price" id="price" step="0.01" min="0" value="{{ $editItem->price }}" required 
                        class="w-full px-3 py-2 border rounded">
                </div>
                <div>
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                        Update Item
                    </button>
                    <a href="{{ route('manage.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded ml-2">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
    @endif
    
    <!-- Inventory Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="w-16 px-4 py-2 border-b text-left">ID</th>
                    <th class="w-1/6 px-4 py-2 border-b text-left">Name</th>
                    <th class="w-1/3 px-4 py-2 border-b text-left">Description</th>
                    <th class="w-1/6 px-4 py-2 border-b text-left">Product Code</th>
                    <th class="w-1/6 px-4 py-2 border-b text-right">Price</th>
                    <th class="w-1/6 px-4 py-2 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td class="px-4 py-2 border-b text-left">{{ $item->id }}</td>
                    <td class="px-4 py-2 border-b text-left">{{ $item->name }}</td>
                    <td class="px-4 py-2 border-b text-left">{{ $item->description }}</td>
                    <td class="px-4 py-2 border-b text-left">{{ $item->product_code }}</td>
                    <td class="px-4 py-2 border-b text-right">${{ number_format($item->price, 2) }}</td>
                    <td class="px-4 py-2 border-b text-center">
                        <a href="{{ route('manage.edit', $item->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('manage.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" 
                                onclick="return confirm('Are you sure you want to delete this item?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                
                @if(count($items) == 0)
                <tr>
                    <td colspan="6" class="px-4 py-2 text-center">No items found.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
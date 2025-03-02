@extends('layout.app')

@section('content')
<div>
    <h2 class="text-2xl font-bold mb-4">Search Inventory</h2>
    
    <!-- Search Form -->
    <div class="bg-gray-100 p-4 rounded mb-6">
        <form action="{{ route('search.perform') }}" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="search" class="block mb-1">Search Term</label>
                    <input type="text" name="search" id="search" value="{{ $search ?? '' }}" 
                        class="w-full px-3 py-2 border rounded" 
                        placeholder="Enter search term...">
                </div>
                <div>
                    <label for="low" class="block mb-1">Min Price</label>
                    <input type="number" name="low" id="low" step="0.01" min="0" value="{{ $low ?? '' }}" 
                        class="w-full px-3 py-2 border rounded" 
                        placeholder="Minimum price...">
                </div>
                <div>
                    <label for="high" class="block mb-1">Max Price</label>
                    <input type="number" name="high" id="high" step="0.01" min="0" value="{{ $high ?? '' }}" 
                        class="w-full px-3 py-2 border rounded" 
                        placeholder="Maximum price...">
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Search
                </button>
            </div>
        </form>
    </div>
    
    <!-- Search Results -->
    @if($results !== null)
        <h3 class="text-xl font-semibold mb-4">Search Results</h3>
        
        @if(count($results) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b">Name</th>
                            <th class="px-4 py-2 border-b">Description</th>
                            <th class="px-4 py-2 border-b">Product Code</th>
                            <th class="px-4 py-2 border-b">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $item)
                        <tr>
                            <td class="px-4 py-2 border-b">{{ $item->name }}</td>
                            <td class="px-4 py-2 border-b">{{ $item->description }}</td>
                            <td class="px-4 py-2 border-b">{{ $item->product_code }}</td>
                            <td class="px-4 py-2 border-b">${{ number_format($item->price, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded">
                No items found matching your search criteria.
            </p>
        @endif
    @endif
</div>
@endsection
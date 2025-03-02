<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

/**
 * Controller for handling inventory search functionality
 */
class SearchController extends Controller
{
    /**
     * Display the search form with empty results
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Load the search view with null results (initial state)
        return view('search', ['results' => null]);
    }

    /**
     * Process search request and return filtered results
     * 
     * @param Request $request The HTTP request containing search parameters
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        // Validate the incoming search parameters
        $request->validate([
            'search' => 'nullable|string',         // Text search can be null or a string
            'low' => 'nullable|numeric|min:0',     // Min price can be null or a positive number
            'high' => 'nullable|numeric|min:0',    // Max price can be null or a positive number
        ]);

        // Extract search parameters from the request
        $search = $request->input('search');
        $low = $request->input('low');
        $high = $request->input('high');

        // Start building the database query
        $query = Inventory::query();

        // Add minimum price filter if provided
        if ($low !== null) {
            $query->where('price', '>=', $low);
        }

        // Add maximum price filter if provided
        if ($high !== null) {
            $query->where('price', '<=', $high);
        }

        // Add text search filter if a search term is provided
        if ($search) {
            // Use a nested where clause to search across multiple columns
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')          // Search in name
                  ->orWhere('description', 'like', '%' . $search . '%') // OR in description
                  ->orWhere('product_code', 'like', '%' . $search . '%'); // OR in product code
            });
        }

        // Execute the query and get the results
        $results = $query->get();

        // Return the search view with results and original search parameters
        // (to maintain the form state)
        return view('search', [
            'results' => $results,
            'search' => $search,
            'low' => $low,
            'high' => $high
        ]);
    }
}
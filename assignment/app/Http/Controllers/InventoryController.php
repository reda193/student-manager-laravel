<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

/**
 * Controller for managing inventory items (CRUD operations)
 */
class InventoryController extends Controller
{
    /**
     * Display a listing of all inventory items
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get all inventory items from the database
        $items = Inventory::all();
        // Return the manage view with items and form display flag set to false
        return view('manage', ['items' => $items, 'showForm' => false]);
    }
    
    /**
     * Show the form for creating a new inventory item
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Get all inventory items to display in the background table
        $items = Inventory::all();
        // Return the manage view with items and form display flag set to true
        return view('manage', ['items' => $items, 'showForm' => true]);
    }
    
    /**
     * Store a newly created inventory item in the database
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',          // Name must be a string with max 255 chars
            'description' => 'required|string',           // Description is required and must be a string
            'product_code' => 'required|string|max:50',   // Product code must be a string with max 50 chars
            'price' => 'required|numeric|min:0'           // Price must be a positive number
        ]);
        
        // Create a new inventory item with all request data
        Inventory::create($request->all());
        // Redirect to the inventory listing page
        return redirect()->route('manage.index');
    }
     
    /**
     * Show the form for editing the specified inventory item
     * 
     * @param  int  $id  The ID of the inventory item
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Get all inventory items to display in the background table
        $items = Inventory::all();
        // Find the specific item to edit or throw a 404 if not found
        $editItem = Inventory::findOrFail($id);
        // Return the manage view with all items and the specific item to edit
        return view('manage', ['items' => $items, 'editItem' => $editItem]);
    }
    
    /**
     * Update the specified inventory item in the database
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id  The ID of the inventory item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data (same rules as store)
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'product_code' => 'required|string|max:50',
            'price' => 'required|numeric|min:0'
        ]);
        
        // Find the specific item to update or throw a 404 if not found
        $item = Inventory::findOrFail($id);
        // Update the item with all the validated request data
        $item->update($request->all());
        
        // Redirect to the inventory listing page
        return redirect()->route('manage.index');
    }
    
    /**
     * Remove the specified inventory item from the database
     * 
     * @param  int  $id  The ID of the inventory item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the specific item to delete or throw a 404 if not found
        $item = Inventory::findOrFail($id);
        // Delete the item from the database
        $item->delete();
        
        // Redirect to the inventory listing page
        return redirect()->route('manage.index');
    }
}
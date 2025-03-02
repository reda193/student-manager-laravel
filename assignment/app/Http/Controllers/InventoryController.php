<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    public function index()
    {
        $items = Inventory::all();
        return view('manage', ['items' => $items, 'showForm' => false]);
    }

    public function create()
    {
        $items = Inventory::all();
        return view('manage', ['items' => $items, 'showForm' => true]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'product_code' => 'required|string|max:50',
            'price' => 'required|numeric|min:0'
        ]);

        Inventory::create($request->all());
        return redirect()->route('manage.index');
    }


    public function edit($id)
    {
        $items = Inventory::all();
        $editItem = Inventory::findOrFail($id);
        return view('manage', ['items' => $items, 'editItem' => $editItem]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'product_code' => 'required|string|max:50',
            'price' => 'required|numeric|min:0'
        ]);

        $item = Inventory::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('manage.index');
    }

    public function destroy($id)
    {
        $item = Inventory::findOrFail($id);
        $item->delete();

        return redirect()->route('manage.index');
    }
}
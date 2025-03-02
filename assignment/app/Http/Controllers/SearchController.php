<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function index()
    {
        return view('search', ['results' => null]);
    }


    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string',
            'low' => 'nullable|numeric|min:0',
            'high' => 'nullable|numeric|min:0',
        ]);

        $search = $request->input('search');
        $low = $request->input('low');
        $high = $request->input('high');

        $query = Inventory::query();

        if ($low !== null) {
            $query->where('price', '>=', $low);
        }

        if ($high !== null) {
            $query->where('price', '<=', $high);
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('product_code', 'like', '%' . $search . '%');
            });
        }

        $results = $query->get();

        return view('search', [
            'results' => $results,
            'search' => $search,
            'low' => $low,
            'high' => $high
        ]);
    }
}
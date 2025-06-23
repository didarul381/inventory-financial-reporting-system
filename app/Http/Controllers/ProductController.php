<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10); // Pagination
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validate input first
        $request->validate([
            'name' => 'required|string|max:255',
            'purchase_price' => 'required|numeric|min:0',
            'sell_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        try {
            Product::create($request->all());
            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            // Return back with error message and old input
            return back()->withErrors(['error' => 'Failed to create product. Please try again.'])->withInput();
        }
    }
}

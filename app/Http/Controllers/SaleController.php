<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Journal;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('product')->latest()->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'discount' => 'nullable|numeric|min:0',
            'customer_paid' => 'required|numeric|min:0',
        ]);
    
        try {
            $product = Product::findOrFail($request->product_id);
    
            if ($request->quantity > $product->stock) {
                return back()->withErrors(['quantity' => 'Not enough stock available.'])->withInput();
            }
    
            $discount = $request->discount ?? 0;
    
            $subtotal = $product->sell_price * $request->quantity;
            $totalAfterDiscount = $subtotal - $discount;
            $vat = $totalAfterDiscount * 0.05; // 5% VAT
            $total = $totalAfterDiscount + $vat;
            $due = $total - $request->customer_paid;
    
            $sale = Sale::create([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'discount' => $discount,
                'vat' => $vat,
                'customer_paid' => $request->customer_paid,
                'due' => $due,
            ]);
    
            // Deduct stock
            $product->decrement('stock', $request->quantity);
    
            // Create journal entries
            Journal::insert([
                ['type' => 'sales', 'amount' => $subtotal, 'sale_id' => $sale->id, 'created_at' => now(), 'updated_at' => now()],
                ['type' => 'discount', 'amount' => $discount, 'sale_id' => $sale->id, 'created_at' => now(), 'updated_at' => now()],
                ['type' => 'vat', 'amount' => $vat, 'sale_id' => $sale->id, 'created_at' => now(), 'updated_at' => now()],
                ['type' => 'payment', 'amount' => $request->customer_paid, 'sale_id' => $sale->id, 'created_at' => now(), 'updated_at' => now()],
            ]);
    
            return redirect()->route('sales.index')->with('success', 'Sale recorded successfully.');
    
        } catch (\Exception $e) {
    
            // Redirect back with error message and input
            return back()->withErrors(['error' => 'Failed to record sale. Please try again.'])->withInput();
        }
    }

}

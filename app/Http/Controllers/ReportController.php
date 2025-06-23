<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Journal;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
{
   $from = $request->from ?? \DB::table('sales')->min('created_at') ?? now()->subMonth();

    $to = $request->to ?? now();
    $sales = Sale::whereBetween('created_at', [$from, $to])->get();
    $journals = Journal::whereBetween('created_at', [$from, $to])->get();

    $totalSales = $journals->where('type', 'sales')->sum('amount');
    $totalDiscount = $journals->where('type', 'discount')->sum('amount');
    $totalVAT = $journals->where('type', 'vat')->sum('amount');
    $totalPaid = $journals->where('type', 'payment')->sum('amount');

    $profit = $sales->sum(function ($sale) {
        $cost = $sale->quantity * $sale->product->purchase_price;
        $revenue = $sale->quantity * $sale->product->sell_price;
        return $revenue - $cost - $sale->discount;
    });

    return view('reports.index', compact('totalSales', 'totalDiscount', 'totalVAT', 'totalPaid', 'profit', 'from', 'to'));
}

}

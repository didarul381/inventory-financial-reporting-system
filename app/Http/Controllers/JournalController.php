<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
   public function index()
{
    $journals = Journal::with('sale.product')->latest()->paginate(20);
    return view('journals.index', compact('journals'));
}
}

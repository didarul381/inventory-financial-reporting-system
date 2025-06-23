@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4"><i class="fas fa-book mr-2"></i> Accounting Journals</h2>

    <table class="table table-bordered table-striped shadow-sm bg-white">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Amount (৳)</th>
                <th>Product</th>
                <th>Sale ID</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($journals as $journal)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <span class="badge 
                            @if($journal->type == 'sales') badge-success 
                            @elseif($journal->type == 'discount') badge-warning 
                            @elseif($journal->type == 'vat') badge-info 
                            @elseif($journal->type == 'payment') badge-primary 
                            @else badge-secondary 
                            @endif">
                            {{ ucfirst($journal->type) }}
                        </span>
                    </td>
                    <td>{{ number_format($journal->amount, 2) }}</td>
                    <td>{{ $journal->sale->product->name ?? 'N/A' }}</td>
                    <td>{{ $journal->sale_id ?? 'N/A' }}</td>
                    <td>{{ $journal->created_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No journal entries found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        {{ $journals->links() }}
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Product List</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add New Product
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($products->count())
    <table class="table table-bordered table-striped table-hover shadow-sm">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Purchase Price (TK)</th>
                <th>Sell Price (TK)</th>
                <th>Stock</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->purchase_price, 2) }}</td>
                <td>{{ number_format($product->sell_price, 2) }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }} <!-- pagination if applicable -->

    @else
    <p class="text-center text-muted">No products found. <a href="{{ route('products.create') }}">Add a new product</a>.</p>
    @endif
</div>
@endsection

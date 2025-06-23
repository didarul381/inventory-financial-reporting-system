@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-primary"><i class="fas fa-cart-plus"></i> Create Sale</h2>

    <form id="salesForm" method="POST" action="{{ route('sales.store') }}" novalidate>
        @csrf

        <div class="form-group mb-3">
            <label for="product_id">Select Product</label>
            <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror" required>
                <option value="">-- Choose Product --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
            @error('product_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="quantity">Quantity</label>
            <input
                type="number"
                name="quantity"
                id="quantity"
                class="form-control @error('quantity') is-invalid @enderror"
                placeholder="Enter quantity"
                min="1"
                value="{{ old('quantity') }}"
                required
            >
            @error('quantity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="discount">Discount (TK)</label>
            <input
                type="number"
                name="discount"
                id="discount"
                class="form-control @error('discount') is-invalid @enderror"
                placeholder="Discount amount"
                min="0"
                step="0.01"
                value="{{ old('discount', 0) }}"
                required
            >
            @error('discount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="customer_paid">Customer Paid (TK)</label>
            <input
                type="number"
                name="customer_paid"
                id="customer_paid"
                class="form-control @error('customer_paid') is-invalid @enderror"
                placeholder="Amount paid by customer"
                min="0"
                step="0.01"
                value="{{ old('customer_paid') }}"
                required
            >
            @error('customer_paid')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary px-4">
            <i class="fas fa-paper-plane mr-2"></i> Submit
        </button>
    </form>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/common.js') }}"></script>
@endpush

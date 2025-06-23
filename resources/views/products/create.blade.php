@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fas fa-plus mr-2"></i> Create Product</h4>
        </div>
        <div class="card-body">
            <form id="productForm" method="POST" action="{{ route('products.store') }}">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input 
                        name="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        placeholder="Product Name" 
                        value="{{ old('name') }}"
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Purchase Price</label>
                    <input 
                        name="purchase_price" 
                        type="number" step="0.01" 
                        class="form-control @error('purchase_price') is-invalid @enderror" 
                        placeholder="Purchase Price" 
                        value="{{ old('purchase_price') }}"
                        required
                    >
                    @error('purchase_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Sell Price</label>
                    <input 
                        name="sell_price" 
                        type="number" step="0.01" 
                        class="form-control @error('sell_price') is-invalid @enderror" 
                        placeholder="Sell Price" 
                        value="{{ old('sell_price') }}"
                        required
                    >
                    @error('sell_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input 
                        name="stock" 
                        type="number" 
                        class="form-control @error('stock') is-invalid @enderror" 
                        placeholder="Stock" 
                        value="{{ old('stock') }}"
                        required
                    >
                    @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-success w-100"><i class="fas fa-save mr-2"></i> Save Product</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/common.js') }}"></script>
@endpush

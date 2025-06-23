@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-primary"><i class="fas fa-receipt"></i> Sales List</h2>

    @if($sales->isEmpty())
        <div class="alert alert-info">No sales found.</div>
    @else
        <div class="table-responsive shadow-sm rounded bg-white">
            <table class="table table-hover mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Paid</th>
                        <th scope="col">Due</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                    <tr>
                        <td>{{ $sale->product->name }}</td>
                        <td>{{ $sale->quantity }}</td>
                        <td>
                            <span class="badge badge-success">
                                TK {{ number_format($sale->customer_paid, 2) }}
                            </span>
                        </td>
                        <td>
                            @if($sale->due > 0)
                                <span class="badge badge-danger">
                                    TK {{ number_format($sale->due, 2) }}
                                </span>
                            @else
                                <span class="badge badge-secondary">No Due</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

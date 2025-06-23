@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-success"><i class="fas fa-chart-line"></i> Financial Report</h2>

    <form method="GET" class="form-inline mb-4">
        <div class="form-group mr-3">
            <label for="from" class="mr-2 font-weight-bold">From:</label>
            <input type="date" id="from" name="from" class="form-control" value="{{ request('from') }}">
        </div>

        <div class="form-group mr-3">
            <label for="to" class="mr-2 font-weight-bold">To:</label>
            <input type="date" id="to" name="to" class="form-control" value="{{ request('to') }}">
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-filter mr-1"></i> Filter
        </button>
    </form>

    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card border-primary shadow-sm">
                <div class="card-body text-primary text-center">
                    <h5>Total Sales</h5>
                    <h3>{{ number_format($totalSales, 2) }} TK</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card border-danger shadow-sm">
                <div class="card-body text-danger text-center">
                    <h5>Total Discount</h5>
                    <h3>{{ number_format($totalDiscount, 2) }} TK</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card border-info shadow-sm">
                <div class="card-body text-info text-center">
                    <h5>Total VAT</h5>
                    <h3>{{ number_format($totalVAT, 2) }} TK</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card border-success shadow-sm">
                <div class="card-body text-success text-center">
                    <h5>Total Paid</h5>
                    <h3>{{ number_format($totalPaid, 2) }} TK</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4 shadow-sm border-warning">
        <div class="card-body text-warning text-center">
            <h4>Profit</h4>
            <h2>{{ number_format($profit, 2) }} TK</h2>
        </div>
    </div>
</div>
@endsection

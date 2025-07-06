@extends('layouts.BackendLayout')
@section('title','Low Stock')
@section('backend')
    <div class="container mt-5">
        <h1>Product Inventory</h1>
        <p>Products marked in <span class="text-danger">red</span> are low on stock and require reordering.</p>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Current Stock (Quantity)</th>
                    <th>Reorder Point (Alert Qty)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="{{ $product->isLowOnStock() ? 'table-danger' : '' }}">
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->alert_qty }}</td>
                        <td>
                            @if ($product->isLowOnStock())
                                <span class="badge bg-danger">Low Stock</span>
                            @else
                                <span class="badge bg-success">In Stock</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <td colspan="5" class="text-center">No Low Stock Found</td>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

    
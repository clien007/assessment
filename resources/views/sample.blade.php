@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Stores</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th colspan=2>Brand</th>
                    <th>Store Number</th>
                    <th>Address</th>
                    <th>Total Revenue</th>
                    <th>Total Profit</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $store)
                    <tr>
                        <td>{{ $store->id }}</td>
                        <td><img src="{{asset('images/logo/'.$store->brand->logo)}} " alt="" width="50px"></td>
                        <td>{{ $store->brand->name }}</td>
                        <td>{{ $store->store_number }}</td>
                        <td>{{ $store->address }}</td>
                        <td>${{ number_format($store->total_revenue, 2) }}</td>
                        <td>${{ number_format($store->total_profit, 2) }}</td>
                        <td>
                            <a href="{{ route('stores.show', $store) }}" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

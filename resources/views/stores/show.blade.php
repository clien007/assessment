@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-4">
                <h1>Store Details</h1>
            </div>
            <div class="col-md-4 mb-4 text-right">
                <button type="button" class="btn btn-success" id="exportButton">
                    <span id="export-text">Export Financial Data</span>
                    <img src="{{asset('images/loader.gif')}}" alt="" width="50px" id="loading-image">
                </button>
                
            </div>
        </div>
        

        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h5 class="card-title">{{ $store->brand->name }} - {{ $store->store_number }}</h5>
                        <p class="card-text"><strong>Address:</strong> {{ $store->address }}</p>
                        <p class="card-text"><strong>Total Revenue:</strong> ${{ number_format($store->total_revenue, 2) }}</p>
                        <p class="card-text"><strong>Total Profit:</strong> ${{ number_format($store->total_profit, 2) }}</p>
                    </div>
                    <div class="col-4 text-right">
                        <img src="{{asset('images/logo/'.$store->brand->logo)}} " alt="" width="150px">
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <a href="{{ route('stores.index') }}" class="btn btn-primary">Back to Stores</a>
        </div>
        <h2>Store Financials</h2>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Revenue</th>
                        <th>Food Cost</th>
                        <th>Labor Cost</th>
                        <th>Profit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($store->financials as $financial)
                        <tr>
                            <td>{{ date('Y-m-d',strtotime($financial->date)) }}</td>
                            <td>${{ number_format($financial->revenue, 2) }}</td>
                            <td>${{ number_format($financial->food_cost, 2) }}</td>
                            <td>${{ number_format($financial->labor_cost, 2) }}</td>
                            <td>${{ number_format($financial->profit, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection

@section('scripts')
    <script>
        $("#export-text").show();
        $("#loading-image").hide();

        $(document).ready(function() {
            $('#exportButton').click(function() {
                var storeId = {{ $store->id }};
                $.ajax({
                    url: '/sample/export/' + storeId,
                    type: 'GET',
                    beforeSend: function() {
                        $("#export-text").hide();
                        $("#loading-image").show();
                    },
                    success: function(response) {
                        $("#export-text").show();
                        $("#loading-image").hide();
                        alert('Financial data exported successfully! Check your email for the download link.');
                    },
                    error: function(xhr, status, error) {
                        alert('Error exporting financial data: ' + error);
                    }
                });
            });
        });
    </script>
@endsection

@section('styles')
<style>
    .table-striped tbody tr:nth-of-type(odd){
        background-color:{{ $primary_color}}
    }

    .table-striped tbody tr:nth-of-type(even){
        background-color:{{ $secondary_color}}
    }

    .table tbody{
        color:{{$text_color}}
    }
</style>
@endsection

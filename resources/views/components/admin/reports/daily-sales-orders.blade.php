@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">
                         {{ date('F d', strtotime($day)) }} Orders
                    </h4>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Order Number #</th>
                                    <th>Income</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $dailyOrders)
                                    <tr>
                                        <td>{{ $dailyOrders->order_id }}</td>
                                        <td>₱{{ $dailyOrders->amount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a class="btn btn-outline-secondary" href="{{ route('daily.reports') }}">Back</a>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection

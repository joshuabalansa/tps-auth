@extends('layouts.app')
@section('content')
    <div class="row">
        {{-- <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Daily Sales</h4>
                    <form class="form-inline" method="GET" action="{{ route('dailySalesFilter') }}">
                        <div class="mb-3 form-group">
                            <label for="start_date" class="sr-only">Start Date:</label>
                            <input type="date" class="form-control" name="start_date" id="start_date"
                                placeholder="Start Date">
                        </div>

                        <div class="mb-3 form-group">
                            <label for="end_date" class="sr-only">End Date:</label>
                            <input type="date" class="form-control" name="end_date" id="end_date"
                                placeholder="End Date">
                        </div>

                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
            </div>
        </div> --}}
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">
                        Daily Sales
                    </h4>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Income</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dailySums as $day => $total)
                                    <tr>
                                        <td>
                                            <a
                                                href="{{ route('dailySalesOrders', $day) }}">{{ date('F d', strtotime($day)) }}</a>
                                        </td>
                                        <td>₱ {{ number_format($total, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

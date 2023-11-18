@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Monthly Sales</h4>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Income</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($yearlySums as $year => $total)
                                    <tr>
                                        <td><a
                                                href="{{ route('monthly.reports') }}">{{ date('Y', strtotime($year . '-01')) }}</a>
                                        </td>
                                        <td>₱ {{ number_format($total, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection

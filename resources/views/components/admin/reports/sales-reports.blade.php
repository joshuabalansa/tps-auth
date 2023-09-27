@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Monthly Sales</h4>
                <div class="table-responsive">
                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                        <thead>
                        <tr>
                            <th>Month</th>
                            <th>Income</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($monthlySums as $month => $total)
                                <tr>
                                    <td>{{ date('F Y', strtotime($month . '-01')) }}</td>
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
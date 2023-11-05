@extends('layouts.app')

@section('content')
    {{-- <!-- start page title -->
    <x-admin.dashboard.page-title />
    <!-- end page title -->  --}}

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-sm bg-blue rounded shadow-lg">
                                <i class="fe-aperture avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark my-1">₱<span data-plugin="counterup">12,14</span></h3>
                                <p class="text-muted mb-1 text-truncate">Income status</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-sm bg-success rounded shadow-lg">
                                <i class="fe-shopping-cart avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark my-1"><span data-plugin="counterup">1576</span></h3>
                                <p class="text-muted mb-1 text-truncate">January's Sales</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-sm bg-warning rounded shadow-lg">
                                <i class="fe-bar-chart-2 avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark my-1">$<span data-plugin="counterup">8947</span></h3>
                                <p class="text-muted mb-1 text-truncate">Payouts</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-sm bg-info rounded shadow-lg">
                                <i class="fe-cpu avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{ $stocks }}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Stocks</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

    {{-- <x-admin.dashboard.dashboard-analytics /> --}}

    <div class="row">
        {{-- <x-admin.dashboard.card-map /> --}}
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-bs-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false"
                            aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Top Selling</h4>
                    <div id="chart"></div>

                    <script>
                        // Get the monthly data from Blade template
                        var monthlySums = @json($monthlySums);
                        var transactionByMonth = @json($transactionByMonth);

                        var options = {
                            chart: {
                                type: 'line'
                            },
                            series: [{
                                name: 'Sales',
                                data: Object.values(monthlySums) // Use the monthly total sales data
                            }],
                            xaxis: {
                                categories: Object.keys(transactionByMonth) // Use the months as categories
                            }
                        };

                        var chart = new ApexCharts(document.querySelector("#chart"), options);

                        chart.render();
                    </script>
                </div> <!-- collapsed end -->
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->

    </div>
@endsection
{{-- 
<div id="chart"></div>

<script>
    console.log(sales)
    var options = {
        chart: {
            type: 'bar'
        },
        series: [{
            name: 'sales',
            data: {{ json_encode($totalSales) }}
        }],
        xaxis: {
            categories: {{ json_encode($byMonth) }}
        }
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
</script> --}}

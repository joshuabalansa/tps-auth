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
                                <h5 class="text-dark my-1">₱<span
                                        data-plugin="counterup">{{ number_format($currentMonthTotal, 2) }}</span>
                                </h5>
                                <p class="text-muted mb-1 text-truncate">This Month</p>
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
                                <h5 class="text-dark my-1"><span data-plugin="counterup">{{ $menuCount }}</span></h5>
                                <a href="{{ route('menu.index') }}" class="text-muted mb-1 text-truncate">Products</a>
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
                                <h5 class="text-dark my-1"><span data-plugin="counterup">{{ $categoryCount }}</span></h5>
                                <a href="{{ route('category.index') }}" class="text-muted mb-1 text-truncate">Categories</a>
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
                                <h5 class="text-dark my-1"><span data-plugin="counterup">{{ $stocks }}</span></h5>
                                <a href="{{ route('stocks.index') }}" class="text-muted mb-1 text-truncate">Stocks</a>
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
                        <h4 class="header-title mb-0">Sales Analytics</h4>
                        <div id="chart"></div>
                    </div> <!-- collapsed end -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

    <script>
        // Get the monthly data from Blade template
        var monthlySums = @json($monthlySums);
        var transactionByMonth = @json($transactionByMonth);

        // Define custom colors for the bars
        var customColors = ['#FF5733', '#FFC300', '#33FF57', '#5733FF', '#FF3357'];

        // Define the chart options
        var options = {
            chart: {
                type: 'area',
                height: 350,
            },
            series: [{
                name: 'Sales',
                data: Object.values(monthlySums), // Use the monthly total sales data
            }],
            xaxis: {
                categories: Object.keys(transactionByMonth), // Use the months as categories
            },
            plotOptions: {
                bar: {
                    colors: {
                        ranges: customColors,
                    },
                },
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return "₱" + value.toFixed(2); // Add "$" sign and format to two decimal places
                    },
                },
            },
        };

        // Create a new ApexCharts instance
        var chart = new ApexCharts(document.querySelector("#chart"), options);

        // Render the chart
        chart.render();
    </script>
@endsection

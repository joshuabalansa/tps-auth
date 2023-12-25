@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-3" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
            data-bs-title="Shows the lowest quantity of stocks">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle"> {{-- bg-success --}}
                                <i class="mdi mdi-trending-down font-22 avatar-title text-dark"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end" title="Product with low quantity">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $productQtyMin }}</span></h3>
                                <p class="text-muted mb-1 text-truncate">{{ optional($productLowQty)->name }}</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3" data-bs-toggle="tooltip" data-bs-placement="bottom"
            data-bs-custom-class="custom-tooltip" data-bs-title="Shows the Highest quantity of stocks">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle">
                                <i class="mdi mdi-trending-up font-22 avatar-title text-dark"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $productQtyMax }}</span></h3>
                                <p class="text-muted mb-1 text-truncate">{{ optional($productHighQty)->name }}</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
        <div class="col-md-6 col-xl-3" data-bs-toggle="tooltip" data-bs-placement="bottom"
            data-bs-custom-class="custom-tooltip" data-bs-title="Shows the total out of stocks">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle">
                                <i class="mdi mdi-close font-22 avatar-title text-dark"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $outOfStocks }}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Out of Stocks</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
        <div class="col-md-6 col-xl-3" data-bs-toggle="tooltip" data-bs-placement="bottom"
            data-bs-custom-class="custom-tooltip" data-bs-title="Shows the total of available stocks">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle">
                                <i class="mdi mdi-check font-22 avatar-title text-dark"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="mt-1"><span data-plugin="counterup">{{ $availableStocks }}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Available</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div>
    </div>

    <div class="row">

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-bs-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false"
                            aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Product Analytics</h4>
                    <div id="chart"></div>
                </div> <!-- collapsed end -->
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('stocks.create') }}" class="btn btn-sm btn-blue waves-effect waves-light float-end">
                    <i class="mdi mdi-plus-circle"></i> Add Product
                </a>
                <h4 class="header-title mb-4">Inventory Tracking</h4>
                <div class="table-responsive">
                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>Product</th>
                                {{-- <th>Description</th> --}}
                                <th>Category</th>
                                {{-- <th>Price</th> --}}
                                <th>Quantity Start</th>
                                <th>Quantity Sold</th>
                                <th>Quantity End</th>
                                <th>Product Price</th>
                                <th>Cost</th>
                                <th>Date</th>
                                <th>Status</th>
                                {{-- <th class="hidden-sm">Action</th> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($menus as $menu)
                                <tr>
                                    <td><b>{{ $menu->id }}</b></td>
                                    <td>
                                        {{ $menu->getName() }}
                                    </td>
                                    {{-- 
                                            <td>
                                                {{ $menu->getDescription() }}
                                            </td> --}}

                                    <td>
                                        @foreach ($menu->getCategory() as $category)
                                            {{ $category['category'] }}
                                        @endforeach
                                    </td>

                                    <td>
                                        {{ $menu->getQuantity() }}
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        {{ $menu->cost }}
                                    </td>
                                    <td>
                                        {{ $menu->purchase_date }}
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-{{ $menu->getStatus() == 'Available' ? 'success' : ($menu->getStatus() == 'Draft' ? 'warning' : 'danger') }}">
                                            {{ $menu->getStatus('status') }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Product Orders</h4>
                <p class="text-muted font-13 mb-4">
                    Shows the number of products ordered
                </p>

                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Num. of Orders</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($ordersByDayAndName as $date => $ordersByName)
                            @foreach ($ordersByName as $name => $orders)
                                <tr>
                                    <td>{{ $name }}</td>
                                    <td>{{ $orders->count() }}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('m-d-Y', $date)->format('F j, Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <script>
        // Get the data from the Blade template
        let ordersByDayAndName = {!! json_encode($ordersByDayAndName) !!};

        // Process the data to get the data for each product
        let seriesData = Object.keys(ordersByDayAndName).map(date => {
            let ordersByName = ordersByDayAndName[date];
            let dataForDate = [];

            for (let name in ordersByName) {
                dataForDate.push({
                    x: name,
                    y: ordersByName[name].length
                });
            }

            return {
                x: date,
                data: dataForDate
            };
        });

        // Flatten the seriesData array for plotting
        let flattenedData = seriesData.reduce((acc, curr) => {
            curr.data.forEach(item => {
                acc.push({
                    x: item.x,
                    y: item.y,
                    date: curr.x
                });
            });
            return acc;
        }, []);

        // Create the chart
        var options = {
            chart: {
                type: 'bar',
                height: 350,
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Num. or orders',
                data: flattenedData
            }],
            xaxis: {
                categories: flattenedData.map(item => item.x),
                title: {
                    text: 'Product Name'
                }
            },
            yaxis: {
                title: {
                    text: 'Count'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val;
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#chart"),
            options
        );

        chart.render();
    </script>


    {{--     
    <script>
        // Get the data from the Blade template
        let ordersByDayAndName = {!! json_encode($ordersByDayAndName) !!};
    
        // Process the data to get the highest count for each product
        let seriesData = Object.keys(ordersByDayAndName).map(date => {
            let ordersByName = ordersByDayAndName[date];
            let highestCount = Math.max(...Object.values(ordersByName).map(orders => orders.length));
            return { x: date, y: highestCount };
        });
    
        // Create the chart
        var options = {
            chart: {
                type: 'bar',
                height: 350,
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Highest Count',
                data: seriesData
            }],
            xaxis: {
                categories: seriesData.map(item => item.x),
            },
            yaxis: {
                title: {
                    text: 'Count'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
        }
    
        var chart = new ApexCharts(
            document.querySelector("#chart"),
            options
        );
    
        chart.render();
    </script> --}}
@endsection

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
                                <p class="text-muted mb-1 text-truncate">{{ $productLowQty->name }}</p>
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
                                <p class="text-muted mb-1 text-truncate">{{ $productHighQty->name }}</p>
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
                                    <th>Quantity</th>
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

                                        {{-- <td>
                                                {{ $menu->getPrice() }}
                                            </td> --}}
                                        <td>
                                            <span
                                                class="badge bg-{{ $menu->getStatus() == 'Available' ? 'success' : ($menu->getStatus() == 'Draft' ? 'warning' : 'danger') }}">
                                                {{ $menu->getStatus('status') }}
                                            </span>
                                        </td>

                                        {{-- <td>
                                                <div class="btn-group dropdown">
                                                    <a href="javascript: void(0);"
                                                        class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="mdi mdi-dots-horizontal"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item"
                                                            href="{{ route('stocks.edit', $stock->getId()) }}"><i
                                                                class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('stocks.destroy', $stock->getId()) }}"><i
                                                                class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                    </div>
                                                </div>
                                            </td> --}}
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

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Order Details</h4>
                   
                    <div class="table-responsive">
                        <h4>Total Amount:  ₱{{ $orders->pluck('price')->sum() }}</h4>
                        <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    {{-- <th>Status</th> --}}
                                    {{-- <th class="hidden-sm">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->menu }}</td>
                                        <td>{{ $order->category }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->price }}</td>
                                        {{-- <td>
                                    <span class="badge bg-success">{{ $transaction->status }}</span>
                                </td> --}}
                                        {{-- <td>
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit Staff</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>                                    </div>
                                        </div>
                                    </div>
                                </td> --}}
                                    </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                        <a href="{{ route('reports.orders') }}" class="btn btn-outline-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection

@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-info">
                            <i class="mdi mdi-hamburger font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark mt-1">₱<span data-plugin="counterup">{{ $transactions->sum('amount') }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Income</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
    
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-secondary">
                            <i class="dripicons-checklist font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $transactions->count() }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total orders</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-success">
                            <i class="fe-trash-2 font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $approvedOrders }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Approved</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                            <i class="ti-archive font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="mt-1"><span data-plugin="counterup">{{ $cancelledOrders }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Cancelled</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Order History</h4>
                <div class="table-responsive">
                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                        <thead>
                        <tr>
                            <th>Order ID #</th>
                            <th>Amount</th>
                            <th>Date</th>
                            {{-- <th>Status</th> --}}
                            {{-- <th class="hidden-sm">Action</th> --}}
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->order_id }}</td>
                                <td>₱{{ $transaction->amount }}</td>
                                <td>{{ $transaction->created_at }}</td>
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
                </div>
            </div>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->
@endsection
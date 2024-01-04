@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">
                        List of Added Stock
                    </h4>
                    <div class="table-responsive">
                        {{-- <input type="date" name="" class="form-control mb-3" style="width: 20rem"> --}}
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Quantity Added</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($restockProducts as $restockProduct)
                                    <tr>
                                        <td>{{ $restockProduct->product }}</td>
                                        <td>{{ $restockProduct->getCategory() }}</td>
                                        <td>{{ $restockProduct->quantity }}</td>
                                        <td>{{ $restockProduct->created_at }}</td>
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

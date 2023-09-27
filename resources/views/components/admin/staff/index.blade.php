@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('staff.create') }}" class="btn btn-sm btn-blue waves-effect waves-light float-end">
                    <i class="mdi mdi-plus-circle"></i> Add Staff
                </a>
                <h4 class="header-title mb-4">Staff</h4>
                <div class="table-responsive">
                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                        <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Salary</th>  
                            <th class="hidden-sm">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($staffs as $staff)
                        <tr>
                            <td><b>{{ $staff->id }}</b></td>
                            <td> 
                                {{ $staff->getFullname() }}
                            </td>

                            <td>
                              {{ $staff->getAddress() }}
                            </td>

                            <td>
                                {{ $staff->getPhone() }}
                            </td>

                            <td>
                               {{ $staff->getRole() }}
                            </td>
                            <td>
                               {{ $staff->getSalary() }}
                            </td>
                            {{-- <td>
                                <span class="badge bg-success">{{ $stock->getCost() }}</span>
                            </td> --}}
                            <td>
                                <div class="btn-group dropdown">
                                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ route('staff.edit', $staff->id) }}"><i class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit Staff</a>
                                        <a class="dropdown-item" href="{{ route('staff.destroy', $staff->id) }}"><i class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>                                    </div>
                                </div>
                            </td>
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
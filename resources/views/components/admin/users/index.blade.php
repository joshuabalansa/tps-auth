@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <a href="{{ route('user.create') }}" class="btn btn-sm btn-blue waves-effect waves-light float-end">
                        <i class="mdi mdi-plus-circle"></i> Add User
                    </a> --}}
                    <h4 class="header-title mb-4">Manage Users</h4>

                    <div class="table-responsive">
                        <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="hidden-sm">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr>

                                        <td>
                                            {{ $user->getName() }}
                                        </td>

                                        <td>
                                            {{ $user->getEmail() }}
                                        </td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $user->status === 'active' ? 'success' : 'danger' }}">{{ $user->status === 'active' ? 'Active' : 'Deactivated' }}</span>
                                        </td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <a href="javascript: void(0);"
                                                    class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item"
                                                        href="{{ route('user.deactivate', $user->id) }}">Deactivate</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('user.reactivate', $user->id) }}">Reactivate</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('user.destroy', $user->id) }}">Delete</a>
                                                </div>
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

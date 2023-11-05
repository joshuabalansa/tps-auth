@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-primary">
                                <i class="mdi mdi-hamburger font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">123</span></h3>
                                <p class="text-muted mb-1 text-truncate">Total Items</p>
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
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">123</span></h3>
                                <p class="text-muted mb-1 text-truncate">qwe</p>
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
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">123</span></h3>
                                <p class="text-muted mb-1 text-truncate">Available</p>
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
                                <h3 class="mt-1"><span data-plugin="counterup">123</span></h3>
                                <p class="text-muted mb-1 text-truncate">123</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div>
    </div>
    <!-- end row -->
    @if (session()->has('flash_notification.message'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "3000",
            };
            toastr["{{ session('flash_notification.level') }}"]("{{ session('flash_notification.message') }}");
        </script>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('reservation.create') }}"
                        class="btn btn-sm btn-blue waves-effect waves-light float-end">
                        <i class="mdi mdi-plus-circle"></i>Add Customer
                    </a>
                    <h4 class="header-title mb-4">Manage Customer</h4>

                    <div class="table-responsive">
                        <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>Name</th>
                                    <th>Phone </th>
                                    <th>Email</th>
                                    <th>Reservation Date</th>
                                    <th class="hidden-sm">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr>
                                        <td>
                                            {{ $reservation->id }}
                                        </td>
                                        <td>
                                            {{ $reservation->getName() }}
                                        </td>
                                        <td>
                                            {{ $reservation->getPhone() }}
                                        </td>
                                        <td>
                                            {{ $reservation->getEmail() }}
                                        </td>
                                        <td>
                                            {{ $reservation->getReservationDate() }}
                                        </td>
                                        {{-- <span class="badge bg-{{$menu->getStatus() == 'Available' ? 'success' : 'warning'}}">{{ $menu->getStatus('status') }}</span> --}}
                                        <td>
                                            <div class="btn-group dropdown">
                                                <a href="javascript: void(0);"
                                                    class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item"
                                                        href="{{ route('reservation.edit', $reservation->id) }}"><i
                                                            class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('reservation.destroy', $reservation->id) }}"><i
                                                            class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
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

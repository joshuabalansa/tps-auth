<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Cashier</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- plugin css -->
    <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('assets/css/config/material/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{ asset('assets/css/config/material/app.min.css') }}" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <link href="{{ asset('assets/css/config/material/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" />
    <link href="{{ asset('assets/css/config/material/app-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="loading" data-layout-mode="horizontal"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom mb-5">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-end mb-0">
                    <li class="dropdown d-none d-lg-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen"
                            href="#">
                            <i class="fe-maximize noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            {{-- <img src="../assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle"> --}}
                            <span class="pro-user-name ms-1">
                                Cashier <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>


                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                <i class="fe-log-out"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="#">
                        <span class="flex justify-center items-center">
                            <h2 class="text-white font-bold">Cashier</h2>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <!-- end Topbar -->
        <div class="container" style="margin-top: 110px;">
            <a href="{{ route('cashier.index') }}" class="btn btn-outline-info mb-3">Back</a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('reservation.create') }}"
                                class="btn btn-sm btn-blue waves-effect waves-light float-end">
                                <i class="mdi mdi-plus-circle"></i>Add Customer
                            </a>
                            <h4 class="header-title mb-4">Customer Reservations</h4>
        
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
                                            <th>Table</th>
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
                                                    {{ $reservation->table }}
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
                                                                href="#"><i
                                                                    class="mdi mdi-check me-2 text-muted font-18 vertical-middle"></i>Accept</a>
                                                            <a class="dropdown-item"
                                                                href="#"><i
                                                                    class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit</a>
                                                            <a class="dropdown-item"
                                                                href="#"><i
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
        </div>

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- Dashboard 2 init -->
    <script src="{{ asset('assets/js/pages/dashboard-2.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>

</html>

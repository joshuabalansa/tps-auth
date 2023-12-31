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
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Reserve a table</h5>
                            <form action="{{ route('cashier.reserve.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="firstname" class="form-label">Firstname <span
                                            class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('firstname') }}" name="firstname"
                                        id="firstname" class="form-control" placeholder="Enter customer firstname"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="lastname" class="form-label">Lastname <span
                                            class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('lastname') }}" name="lastname" id="lastname"
                                        class="form-control" placeholder="Enter customer lastname" required>
                                </div>


                                <div class="mb-3">
                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                    <input value="{{ old('phone') }}" maxlength="11" name="phone" type="text"
                                        class="form-control" id="phone" placeholder="Enter phone number"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input value="{{ old('email') }}" name="email" type="email"
                                        class="form-control" id="phone" placeholder="Enter email">
                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Special Request</label>
                                <textarea class="form-control" name="special_request" rows="3" placeholder="Please enter comment"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Reservation Date</label>
                                <input value="{{ old('reservation_date') }}" name="reservation_date" type="date"
                                    class="form-control" id="reservation_date" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Reservation Time</label>
                                <input value="{{ old('reservation_time') }}" name="reservation_time" type="time"
                                    class="form-control" id="reservation_time" required>
                            </div>
                            <div class="mb-3">
                                <label for="product-category" class="form-label">Assign Table <span
                                        class="text-danger">*</span></label>
                                <select name="table" class="form-control select2" id="product-table">
                                    <option value="">Select</option>
                                    @foreach ($tables as $table)
                                        <option value="{{ $table->getTableName() }}">{{ $table->getTableName() }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-3 mt-5">
                                <a href="{{ route('cashier.reservations') }}"
                                    class="btn w-sm btn-light waves-effect">Cancel</a>
                                <input type="submit" class="btn w-sm btn-success waves-effect waves-light"
                                    value="Submit" />
                                {{-- <button type="button" class="btn w-sm btn-danger waves-effect waves-light">Delete</button> --}}
                            </div>
                        </div> <!-- end col -->
                    </div>

                </div> <!-- end col-->
            </div>
            </form>



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

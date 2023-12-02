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
        <div class="navbar-custom">
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


        @php use Carbon\Carbon; @endphp
        {{-- Container code here --}}
        <div class="container mx-auto">
            <h1 class="display-4 font-weight-bold text-dark">
                Orders
            </h1>
            <a href="{{ route('cashier.reservations') }}" class="btn btn-primary waves-effect waves-light">
                <span class="btn-label">{{ $reservations->count() }}</i></span>Reservations
            </a>
            <input type="text" class="form-control my-3" id="searchInput" placeholder="Search for an order...">
            <div class="row">
                <div class="col-12 text-center">
                    @if (count($orders) < 1)
                        <h3 class="text-muted">There are no orders at the moment</h3>
                    @endif
                </div>
            </div>
            <div class="card-deck" id="content-loaded">
                @foreach ($groupedOrders as $orderNumber => $group)
                    <div class="card">
                        <div class="card-body">

                            <h2 class="card-title h4 font-weight-bold">Order #: {{ $orderNumber }}</h2>
                            <a href="{{ route('cashier.cancel', $orderNumber) }}" class="btn btn-sm btn-warning">Cancel
                                order</a>
                            {{-- <a href="{{ route('order.paid', $orderNumber) }}"
                                class="btn btn-sm btn-success">Checkout</a> --}}
                            <a href="{{ route('order.details', $orderNumber) }}"
                                class="btn btn-sm btn-success">Checkout</a>

                            <!-- List of orders -->
                            <ul class="list-unstyled mt-3">
                                @foreach ($group as $order)
                                    @php
                                        $carbonTimestamp = Carbon::parse($order['created_at']);
                                        $timeAgo = $carbonTimestamp->diffForHumans();
                                    @endphp
                                    <li class="mb-2">
                                        {{ $order['quantity'] }} {{ $order['menu'] }} ₱{{ $order['price'] }}
                                    </li>
                                @endforeach
                            </ul>
                            <hr>
                            <b>Total cost:</b> ₱{{ $group->sum('price') }}
                            <p class="mt-3">{{ $timeAgo }}</p>
                        </div>
                    </div>
                @endforeach
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

        <script>
            // Get a reference to the search input field
            const searchInput = document.getElementById('searchInput');

            // Get all order containers
            const orderContainers = document.querySelectorAll('.card');

            // Attach an event listener to the search input
            searchInput.addEventListener('input', () => {
                const searchTerm = searchInput.value.toLowerCase();

                // Loop through each order container
                orderContainers.forEach((container) => {
                    const orderText = container.textContent.toLowerCase();

                    // Check if the order text contains the search term
                    if (orderText.includes(searchTerm)) {
                        container.style.display = 'block'; // Show the container
                    } else {
                        container.style.display = 'none'; // Hide the container
                    }
                });
            });
        </script>
</body>

</html>

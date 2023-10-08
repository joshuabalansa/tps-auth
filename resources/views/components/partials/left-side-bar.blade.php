<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        {{-- <div class="user-box text-center">
            <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div> --}}

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>


                <li>
                    <a href="{{ route('admin') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>


                <li class="menu-title mt-2">Apps</li>
                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="fas fa-cart-plus"></i>
                        <span> Products </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('menu.index') }}">Products</a>
                            </li>
                            <li>
                                <a href="{{ route('category.index') }}">Categories</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ route('reports.orders') }}">
                        <i class="fas fa-credit-card"></i>
                        <span> Payments </span>
                    </a>
                </li>

                <li>
                    <a href="#payments" data-bs-toggle="collapse">
                        <i class="fas fa-chart-bar"></i>
                        <span> Reports </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="payments">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('daily.reports') }}">Daily Income</a>
                            </li>
                            <li>
                                <a href="{{ route('monthly.reports') }}">Monthly Income</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ route('stocks.index') }}">
                        <i class="mdi mdi-dropbox"></i>
                        <span> Stocks </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('staff.index') }}">
                        <i class="fas fa-user"></i>
                        <span> Staff </span>
                    </a>
                </li>
                <li>
                    <a href="#customers" data-bs-toggle="collapse">
                        <i class="fas fa-chart-bar"></i>
                        <span> Customers </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="customers">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('reservation.index') }}">Reservations</a>
                            </li>
                            <li>
                                <a href="{{ route('table.index') }}">Manage Tables</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="fas fa-user-friends"></i>
                        <span> Manage Users </span>
                    </a>
                </li>

                <li>
                    <a
                        href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fe-log-out"></i>
                        <span> Logout </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

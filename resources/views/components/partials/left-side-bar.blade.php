<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
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
        </div>

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
                        <i class="mdi mdi-hamburger"></i>
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
                    <a href="#">
                        <i class="mdi mdi-domain"></i>
                        <span> Tables </span>
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
                                <a href="{{ route('reports.orders') }}">Order History</a>
                            </li>
                            <li>
                                <a href="{{ route('reports.sales') }}">Monthly Sales</a>
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
                        <i class="fas fa-user-friends"></i>
                        <span> Staff </span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fas fa-chart-bar"></i>
                        <span> Payments </span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="mdi mdi-domain"></i>
                        <span> Reservations </span>
                    </a>
                </li>
  
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Rabbit Hole TPS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured transaction processing system" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        
      
        <!-- plugin css -->
        <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{ asset('assets/css/config/material/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{ asset('assets/css/config/material/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

        <link href="{{ asset('assets/css/config/material/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
        <link href="{{ asset('assets/css/config/material/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

        <!-- icons -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        {{-- Datatables --}}
        <!-- third party css -->
        <link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        {{-- Drag and drop --}}
        <!-- Plugins css-->
        <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <!-- body start -->
    <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
            <div id="wrapper">
                <!-- Topbar Start -->
                <x-partials.top-bar />
                <x-partials.left-side-bar />

                <!-- Start Page Content here -->
                <div class="content-page">
                    <div class="content">

                        <!-- Start Content-->
                        <div class="container-fluid">                 
                            <x-partials.page-title title="Dashboard" />
                                @yield('content')
                        </div> 

                    </div> 
                    {{-- <x-partials.footer /> --}}
                </div>
                    <!-- End Page content -->
            </div>
                    <!-- END wrapper -->
        <x-partials.right-side-bar />

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

        <!-- Plugins js-->
        <script src="{{ asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>

        <!-- Dashboard 2 init -->
        <script src="{{ asset('assets/js/pages/dashboard-2.init.js') }}"></script>

        <!-- App js-->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>

        {{-- Data tables JS --}}
        <!-- third party js -->
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
        <!-- third party js ends -->

        <!-- Tickets js -->
        <script src="{{ asset('assets/js/pages/tickets.js') }}"></script>

        {{-- Drag and drop - Menu Edit --}}
        <!-- Select2 js-->
        <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
        <!-- Dropzone file uploads-->
        <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>

        <!-- Quill js -->
        <script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>

        <!-- Init js-->
        <script src="{{ asset('assets/js/pages/form-fileuploads.init.js') }}"></script>

        <!-- Init js -->
        <script src="{{ asset('assets/js/pages/add-product.init.js') }}"></script>

        {{-- Footables Script --}}
        <script src="{{ asset('assets/libs/footable/footable.all.min.js') }}"></script>
        <!-- Init js -->
        <script src="{{ asset('assets/js/pages/foo-tables.init.js') }}"></script>

    </body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Cart</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{  asset('assets/images/favicon.ico') }}">

 	    <!-- App css -->
	    <link href="{{  asset('assets/css/config/material/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
	    <link href="{{  asset('assets/css/config/material/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
	    <link href="{{  asset('assets/css/config/material/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
	    <link href="{{  asset('assets/css/config/material/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

	    <!-- icons -->
	    <link href="{{  asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <!-- body start -->
    <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
        
            @yield('content')
        
        <!-- Vendor js -->
        <script src="{{  asset('assets/js/vendor.min.js') }}"></script>
        <!-- App js -->
        <script src="{{  asset('assets/js/app.min.js') }}"></script>
    </body>
</html>
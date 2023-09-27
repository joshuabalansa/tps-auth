<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Product Details | UBold - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

	    <!-- App css -->
	    <link href="{{ asset('assets/css/config/material/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
	    <link href="{{ asset('assets/css/config/material/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

	    <link href="{{ asset('assets/css/config/material/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
	    <link href="{{ asset('assets/css/config/material/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

	    <!-- icons -->
	    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
                    
            </style>
    </head>

    <!-- body start -->
    <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <div id="wrapper">
                    <!-- Start Content-->
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-5 d-flex align-items-center justify-content-center">
    
                                                <div class="tab-content pt-0">
                                                    <div class="tab-pane active show" id="product-1-item">
                                                        <img src="{{ asset('uploads/'. $menu->image) }}" alt="" class="img-fluid mx-auto d-block rounded">
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-lg-7">
                                                <div class="ps-xl-3 mt-3 mt-xl-0">
                                                    <h1 class="mb-3">{{ $menu->getName() }}</h1>
                                                    {{-- <p class="text-muted float-start me-3">
                                                        <span class="mdi mdi-star text-warning"></span>
                                                        <span class="mdi mdi-star text-warning"></span>
                                                        <span class="mdi mdi-star text-warning"></span>
                                                        <span class="mdi mdi-star text-warning"></span>
                                                        <span class="mdi mdi-star"></span>
                                                    </p>
                                                    <p class="mb-4"><a href="" class="text-muted">( 36 Customer Reviews )</a></p>
                                                    <h6 class="text-danger text-uppercase">20 % Off</h6>
                                                     --}}
                                                    <h4 class="mb-4">Price : <b>₱{{ $menu->getPrice() }}</b></h4>
                                                    <h4><span class="badge bg-soft-success text-success mb-4">{{ $menu->getStatus() }}</span></h4>
                                                    <p class="text-muted mb-4">{{ $menu->description }}</p>

                                                    <form action="{{ route('cart.store', $menu->id) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="name" value="{{ $menu->getName() }}">
                                                    <div class="d-flex flex-wrap align-items-center mb-4">
                                                        <label class="my-1 me-2" for="quantityinput">Quantity</label>
                                                        <div class="me-3">
                                                            <select name="qty" class="form-select my-1" id="quantityinput">
                                                                @for($i = 1; $i <= 10; $i++)
                                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
    
                                                    <div class="d-flex justify-around align-items-center">
                                                        <a href="{{ route('customer.index') }}" class="btn btn-outline-secondary me-2">Back</a>
                                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                                            <span class="btn-label"><i class="mdi mdi-cart"></i></span>Add to Order
                                                        </button>
                                                    </div>
                                                </form>

                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->
            </div>
        </div>
        <!-- END wrapper -->
    {{-- Vendor js --}}
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        
    </body>
</html>
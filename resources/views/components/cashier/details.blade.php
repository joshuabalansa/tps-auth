<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Order Details | UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

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
    <link href="{{ asset('assets/css/icons.min.css" rel="stylesheet" type="text/css') }}" />

</head>

<!-- body start -->

<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Order Details</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Order Status</h4>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mt-0">Order ID:</h5>
                                        <p>#{{ $orderNumber }}</p>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mt-0">Tracking ID:</h5>
                                        <p>894152012012</p>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="track-order-list">
                                <ul class="list-unstyled">
                                    <li class="completed">
                                        <h5 class="mt-0 mb-1">Order Placed</h5>
                                        <p class="text-muted">{{ $createdTime }}</p>
                                    </li>
                                    {{-- <li class="completed">
                                        <h5 class="mt-0 mb-1">Packed</h5>
                                        <p class="text-muted">April 22 2019 <small class="text-muted">12:16
                                                AM</small></p>
                                    </li>
                                    <li>
                                        <span class="active-dot dot"></span>
                                        <h5 class="mt-0 mb-1">Shipped</h5>
                                        <p class="text-muted">April 22 2019 <small class="text-muted">05:16
                                                PM</small></p>
                                    </li>
                                    <li>
                                        <h5 class="mt-0 mb-1"> Delivered</h5>
                                        <p class="text-muted">Estimated delivery within 3 days</p>
                                    </li> --}}
                                </ul>
                                <div class="mb-3">
                                    <input type="text" name="payment" id="payment" class="form-control"
                                        placeholder="Enter the Cash Payment">
                                </div>
                                <div class="text-center mt-4">
                                    <a href="{{ route('cashier.index') }}" class="btn btn-outline-secondary">Back</a>
                                    <a href="{{ route('cashier.cancel', $orderNumber) }}" class="btn btn-danger">Cancel
                                        order</a>
                                    <a href="{{ route('order.paid', $orderNumber) }}" class="btn btn-success">Place
                                        Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Items from Order</h4>

                            <div class="table-responsive">
                                <table class="table table-bordered table-centered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Product name</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderDetails as $order)
                                            <tr>
                                                <th scope="row">{{ $order->menu }}</th>
                                                <td><img class="rounded-circle"
                                                        src="{{ asset('uploads/' . $order->image) }}"
                                                        alt="{{ $order->menu }}-image" height="32"></td>
                                                <td>{{ $order->quantity }}</td>
                                                <td>₱39</td>
                                                <td>₱{{ $order->price }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th scope="row" colspan="4" class="text-end">Total :
                                            </th>
                                            <td>
                                                <div class="fw-bold">₱{{ $totalPrice }}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="4" class="text-end">Change :</th>
                                            <td>
                                                <div class="fw-bold">
                                                    <span id="display"></span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            {{-- <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Shipping Information</h4>

                            <h5 class="font-family-primary fw-semibold">Brent Jones</h5>

                            <p class="mb-2"><span class="fw-semibold me-2">Address:</span> 3559 Roosevelt
                                Wilson Lane San Bernardino, CA 92405</p>
                            <p class="mb-2"><span class="fw-semibold me-2">Phone:</span> (123) 456-7890</p>
                            <p class="mb-0"><span class="fw-semibold me-2">Mobile:</span> (+01) 12345 67890
                            </p>

                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Billing Information</h4>

                            <ul class="list-unstyled mb-0">
                                <li>
                                    <p class="mb-2"><span class="fw-semibold me-2">Payment Type:</span>
                                        Credit Card</p>
                                    <p class="mb-2"><span class="fw-semibold me-2">Provider:</span> Visa
                                        ending in 2851</p>
                                    <p class="mb-2"><span class="fw-semibold me-2">Valid Date:</span>
                                        02/2020</p>
                                    <p class="mb-0"><span class="fw-semibold me-2">CVV:</span> xxx</p>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Delivery Info</h4>

                            <div class="text-center">
                                <i class="mdi mdi-truck-fast h2 text-muted"></i>
                                <h5><b>UPS Delivery</b></h5>
                                <p class="mb-1"><span class="fw-semibold">Order ID :</span> xxxx235</p>
                                <p class="mb-0"><span class="fw-semibold">Payment Mode :</span> COD</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const paymentInput = document.getElementById("payment")
            const displaySpan = document.getElementById("display")


            paymentInput.addEventListener("input", function() {
                var amount = displaySpan.textContent = {{ json_encode($totalPrice) }}
                displaySpan.textContent = paymentInput.value - amount
            });
        });
    </script>
    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

</body>

</html>

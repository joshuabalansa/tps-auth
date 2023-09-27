<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-widgets">
                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                <a data-bs-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false" aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
            </div>
            <h4 class="header-title mb-0">Top Selling Menu</h4>

            <div id="cardCollpase5" class="collapse pt-3 show">
                <div class="table-responsive">
                    <table class="table table-hover table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menus as $menu)
                            <tr>
                                <td>{{ $menu->getName() }}</td>
                                <td>{{ $menu->getPrice() }}</td>
                                <td>82</td>
                                <td>$6,518.18</td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div> <!-- end table responsive-->
            </div> <!-- collapsed end -->
        </div> <!-- end card-body -->
    </div> <!-- end card-->
</div> <!-- end col -->
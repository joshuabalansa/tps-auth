<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-widgets">
                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                <a data-bs-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false"
                    aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
            </div>
            <h4 class="header-title mb-0">Top Selling</h4>

            <div id="cardCollpase5" class="collapse pt-3 show">
                @dump($monthlySums)
                <div id="chart"></div>
                <script>
                    var options = {
                        chart: {
                            type: 'bar'
                        },
                        series: [{
                            name: 'sales',
                            data: [30, 40, 45, 50, 49, 60, 70, 91, 125]
                        }],
                        xaxis: {
                            categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
                        }
                    }

                    var chart = new ApexCharts(document.querySelector("#chart"), options);

                    chart.render();
                </script>
            </div> <!-- collapsed end -->
        </div> <!-- end card-body -->
    </div> <!-- end card-->
</div> <!-- end col -->

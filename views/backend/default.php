<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Dashboard
        <small>Shop Mobile</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Biểu đồ hóa đơn 7 ngày gần đây</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-content">
                        <div style="width:100%; height:100%;">
                            <div>
                                <canvas id="ChartIcy" height="150" width="600"></canvas>
                            </div>
                        </div>
                        Chú thích:
                        <img src="<?php echo home; ?>/images/totalchart.png" alt=""><font color="#00A65A">  - Tổng số hóa đơn</font>
                        <img src="<?php echo home; ?>/images/chartcomplete.png" alt=""><font color="#D2D6DE"> - Hóa Đơn đã hoàn thành</font>
                    </div>
                    <!-- ./box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bài bạn đã đăng</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tên</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày đăng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                    foreach ($getProductbyUser as $key) {
                      echo "<tr>";
                       echo "<td>".$key->Id."</td>";
                       echo "<td>".$key->Product_Name."</td>";
                       echo '<td>';
                          if ($key->Status == 0) {
                            echo '<span class="btn-danger btn-sm">Đã xóa</span></td>';
                          } else {
                            echo '<span class="btn-success btn-sm">Xuất hiện</span></td>';
                          }
                        echo '</td>';
                        echo "<td>".$key->Created."</td>";
                      echo "</tr>";
                    }
                   ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <script>
    $(function() {
        var areaChartData = {
            labels: [<?php echo $arrDay; ?>],
            datasets: [{
                label: "Electronics",
                fillColor: "rgba(210, 214, 222, 1)",
                strokeColor: "rgba(210, 214, 222, 1)",
                pointColor: "rgba(210, 214, 222, 1)",
                pointStrokeColor: "#c1c7d1",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [<?php echo $ArrOrderComplete; ?>]
            }, {
                label: "Digital Goods",
                fillColor: "rgba(60,141,188,0.9)",
                strokeColor: "rgba(60,141,188,0.8)",
                pointColor: "#3b8bba",
                pointStrokeColor: "rgba(60,141,188,1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(60,141,188,1)",
                data: [<?php echo $ArrOrder; ?>]
            }]
        };
        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $("#ChartIcy").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;
        barChartData.datasets[1].fillColor = "#00a65a";
        barChartData.datasets[1].strokeColor = "#00a65a";
        barChartData.datasets[1].pointColor = "#00a65a";
        var barChartOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);
    });
    </script>
    <!-- /.content -->
    <!-- /.content-wrapper -->

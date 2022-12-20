<?php
$title = "Dashboard";
$page = "DASHBOARD";
session_start();
include "components/header.php";
require_once 'components/flash_msg.php';
if (!isset($_SESSION["login"])) {
    header("location: login.php");
}
include "components/menu.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard Pinjaman</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-bill"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Pinjaman</span>
                            <span class="info-box-number">
                                <?php
                                $total_pinj = 0;
                                $sql_total_pinjaman = "SELECT SUM(pinjaman_pokok) as total_pinjaman FROM nasabah";
                                $result_total_pinjaman = mysqli_query($koneksi, $sql_total_pinjaman);
                                while ($total = mysqli_fetch_object($result_total_pinjaman)) {
                                    $total_pinj = $total->total_pinjaman;
                                    echo "Rp. " . number_format($total->total_pinjaman, 2, ',', '.');
                                }
                                ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-dollar-sign"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Keuntungan</span>
                            <span class="info-box-number">
                                <?php
                                $sql_total_profit = "SELECT SUM(round(pinjaman_pokok*bunga/100,2)) as profit FROM nasabah";
                                $result_total_profit = mysqli_query($koneksi, $sql_total_profit);
                                while ($total = mysqli_fetch_object($result_total_profit)) {
                                    echo "Rp. " . number_format($total->profit, 2, ',', '.');
                                }
                                ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-coins"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Fintech</span>
                            <span class="info-box-number">
                                <?php
                                $sql_fintech = "SELECT * FROM fintech";
                                $result_fintech = mysqli_query($koneksi, $sql_fintech);
                                echo mysqli_num_rows($result_fintech);
                                ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Nasabah</span>
                            <span class="info-box-number">
                                <?php
                                $sql_nasabah = "SELECT * FROM nasabah";
                                $result_nasabah = mysqli_query($koneksi, $sql_nasabah);
                                echo mysqli_num_rows($result_nasabah);
                                ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="col-6">
                    <!-- PIE CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-chart-pie"></i>&nbsp;Porsi Fintech</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-6">
                    <!-- Bar chart -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="far fa-chart-bar"></i>&nbsp;
                                Total Pinjaman 30 hari terakhir
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="bar-chart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-success">
                        <div class="card-header">

                            <h3 class="card-title"><i class="far fa-chart-bar"></i>&nbsp;Transaksi 30 Hari Terakhir</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<?php
include "components/footer.php";
?>
</div>
<!-- ./wrapper -->


<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>



<?php
$fintech_arr = array();
$data_fintech = array();
while ($fintech = mysqli_fetch_assoc($result_fintech)) {
    $fintech_arr[$fintech['id_fintech']] = $fintech['nama_fintech'];
    $sql_pinjaman = "SELECT SUM(pinjaman_pokok) as total_pinjaman FROM nasabah WHERE fintech=" . $fintech['id_fintech'];
    $result_pinjaman = mysqli_query($koneksi, $sql_pinjaman);
    while ($jumlah = mysqli_fetch_object($result_pinjaman)) {
        $data_fintech[$fintech['id_fintech']] = $jumlah->total_pinjaman / $total_pinj * 100;
    }
}
?>
<script>
$(function() {
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    var data_label = [];
    var bgcolor = [];


    var dynamicColors = function(opacity) {
        var r = 100 + Math.floor(Math.random() * 255);
        var g = 100 + Math.floor(Math.random() * 255);
        var b = 100 + Math.floor(Math.random() * 255);
        return "rgba(" + r + "," + g + "," + b + "," + opacity + ")";
    };
    <?php
        foreach ($fintech_arr as $key => $value) {
            echo "data_label.push('" . $value . "');";
        }
        ?>
    for (let i = 0; i < data_label.length; i++) {
        var color = dynamicColors(0.5);
        if (!bgcolor.includes(color)) {
            bgcolor.push(color);
        }

    }
    var pieData = {
        labels: data_label,
        datasets: [{
            data: [<?php
                        foreach ($data_fintech as $key => $value) {
                            echo "Math.round(" . $value . "),";
                        }
                        ?>],
            borderColor: 'rgba(255, 255, 255, 0.75)',
            hoverBorderColor: 'rgba(255, 255, 255, 1)',
            backgroundColor: bgcolor,
        }]
    }
    var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            labels: {
                fontColor: '#c2c7d0'
            }
        }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
        type: 'doughnut',
        data: pieData,
        options: pieOptions
    })
    // ----------------
    // - END PIECHART - 
    // ----------------

    //-------------
    //- BAR CHART ALL FINTECH -
    //-------------
    var label_30days = [];
    var data_30days = [];
    <?php
        $label_30days = array();
        $sql_30days = "SELECT DISTINCT tanggal_cair FROM nasabah WHERE DATE(tanggal_cair) >= DATE(NOW()) - INTERVAL 30 DAY ORDER BY tanggal_cair";
        $result_30days = mysqli_query($koneksi, $sql_30days);
        while ($row_30days = mysqli_fetch_assoc($result_30days)) {
            echo "label_30days.push('" . date('d M', strtotime($row_30days["tanggal_cair"])) . "');";
            array_push($label_30days, $row_30days["tanggal_cair"]);
        }
        foreach ($fintech_arr as $key => $value) {
            echo "var temp_data = [];";
            for ($i = 0; $i < count($label_30days); $i++) {
                $sql_pinjaman = "SELECT SUM(pinjaman_pokok) as total_pinjaman FROM nasabah WHERE fintech=" . $key . " and tanggal_cair ='" . $label_30days[$i] . "'";
                $result_pinjaman = mysqli_query($koneksi, $sql_pinjaman);
                if (mysqli_num_rows($result_pinjaman) > 0) {
                    while ($jumlah = mysqli_fetch_object($result_pinjaman)) {
                        if ($jumlah->total_pinjaman == null) {
                            echo "temp_data.push(0);";
                        } else {
                            echo "temp_data.push(" . $jumlah->total_pinjaman . ");";
                        }
                    }
                }
            }

            echo "data_30days.push(temp_data);";
        }
        ?>
    var areaChartData = {
        labels: label_30days,
        datasets: [
            <?php
                $indeks = 0;
                foreach ($fintech_arr as $key => $value) {
                ?> {
                label: data_label[<?php echo $indeks; ?>],
                backgroundColor: bgcolor[<?php echo $indeks; ?>],
                borderColor: 'rgba(255,255,255,1)',
                borderWidth: 1,
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: data_30days[<?php echo $indeks; ?>]
            },
            <?php
                    $indeks++;
                }
                ?>
        ]
    }

    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    barChartData.datasets[0] = areaChartData.datasets[1];
    barChartData.datasets[1] = areaChartData.datasets[0];

    var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false,
        legend: {
            labels: {
                fontColor: '#c2c7d0'
            }
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: true,
                },
                ticks: {
                    fontColor: "#c2c7d0", // this here
                },
            }],
            yAxes: [{
                gridLines: {
                    display: true,
                },
                ticks: {
                    fontColor: "#c2c7d0", // this here
                },
            }]
        },
    }
    new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
    })

    //-------------
    //- END BAR CHART ALL FINTECH -
    //-------------

    //-------------
    //- BAR CHART TOTAL PINJAMAN NASABAH 30 HARI -
    //-------------
    var dataAll_30days = [];
    <?php
        for ($i = 0; $i < count($label_30days); $i++) {
            $sql_pinjaman = "SELECT SUM(pinjaman_pokok) as total_pinjaman FROM nasabah WHERE tanggal_cair ='" . $label_30days[$i] . "'";
            $result_pinjaman = mysqli_query($koneksi, $sql_pinjaman);
            if (mysqli_num_rows($result_pinjaman) > 0) {
                while ($jumlah = mysqli_fetch_object($result_pinjaman)) {
                    echo "dataAll_30days.push(" . $jumlah->total_pinjaman . ");";
                }
            }
        }
        ?>
    var areaChartData2 = {
        labels: label_30days,
        datasets: [{
            label: 'Total Pinjaman',
            backgroundColor: 'rgba(0, 227, 236,0.5)',
            borderColor: 'rgba(255,255,255,1)',
            borderWidth: 1,
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: dataAll_30days
        }]
    }

    var barChartCanvas2 = $('#bar-chart').get(0).getContext('2d')
    var barChartData2 = $.extend(true, {}, areaChartData2)
    barChartData2.datasets[0] = areaChartData2.datasets[0]
    new Chart(barChartCanvas2, {
        type: 'bar',
        data: barChartData2,
        options: barChartOptions
    })
    //-------------
    //- BAR CHART TOTAL PINJAMAN NASABAH 30 HARI -
    //-------------
});
</script>
<?php
get_msg();
?>
</body>

</html>
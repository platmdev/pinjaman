<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login.php");
}
$title = "Detail Nasabah";
$page = "DETAIL NASABAH";

include "components/header.php";
include "components/menu.php";

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard Detail Nasabah</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Detail Nasabah</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <!-- PIE CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-chart-pie"></i>&nbsp;Nasabah</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Pilih Fintech</label>
                            <select class="form-control select2" style="width: 100%;" name="fintech" id="fintech">
                                <option value=0 selected>----- Pilih Fintech -----</option>
                                <?php
                                $sql = "SELECT * FROM fintech";
                                $result2 = mysqli_query($koneksi, $sql);
                                if (mysqli_num_rows($result2) > 0) {
                                    $no = 1;
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                        echo '<option value=' . $row2['id_fintech'] . '>' . $row2['nama_fintech'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class='col-12' id='wrap-fintech' style="display: none;">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" id="title-table"></h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="datanasabah" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">No</th>
                                                <th class="align-middle">Nomor Nasabah</th>
                                                <th class="align-middle">Nama Nasabah</th>
                                                <th class="align-middle">Alamat</th>
                                                <th class="align-middle">Pinjaman Pokok</th>
                                                <th class="align-middle">Bunga (%)</th>
                                                <th class="align-middle">Tanggal Cair</th>
                                                <th class="align-middle">Jangka Waktu (Bulan)</th>
                                            </tr>
                                        </thead>
                                        <tbody id='content-table'>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="align-middle">No</th>
                                                <th class="align-middle">Nomor Nasabah</th>
                                                <th class="align-middle">Nama Nasabah</th>
                                                <th class="align-middle">Alamat</th>
                                                <th class="align-middle">Pinjaman Pokok</th>
                                                <th class="align-middle">Bunga (%)</th>
                                                <th class="align-middle">Tanggal Cair</th>
                                                <th class="align-middle">Jangka Waktu (Bulan)</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-chart-pie"></i>&nbsp;Grafik Detail</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <canvas id="pieChart2"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
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

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script>
$(function() {
    // fungsi untuk create warna random
    var dynamicColors = function(opacity) {
        var r = 100 + Math.floor(Math.random() * 255);
        var g = 100 + Math.floor(Math.random() * 255);
        var b = 100 + Math.floor(Math.random() * 255);
        return "rgba(" + r + "," + g + "," + b + "," + opacity + ")";
    };
    // CREATE PIECHART
    var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            labels: {
                fontColor: '#c2c7d0'
            }
        }
    };

    var pieChartCanvas2 = $('#pieChart2').get(0).getContext('2d');

    var myChart = new Chart(pieChartCanvas2, {
        type: 'pie',
        data: {
            labels: [],
            datasets: [{
                data: [],
                borderColor: 'rgba(255, 255, 255, 0.75)',
                hoverBorderColor: 'rgba(255, 255, 255, 1)',
                backgroundColor: [],
            }]
        },
        options: pieOptions
    });


    // FUNGSI SAAT COMBO BOX DIPILIH
    $('#fintech').select2({});
    $('#fintech').on('select2:selecting', function(e) {
        var id = e.params.args.data.id;
        if (id == 0) {
            $('#wrap-fintech').hide();
        } else {
            $('#wrap-fintech').show();
            $('#fintech').select2('close');
            $('#fintech').val(id)
                .change();
            var temp_label = [];
            var temp_bgcolor = [];
            var temp_data = [];
            $.ajax({
                data: {
                    id_fintech_detail: id
                },
                type: 'POST',
                url: 'get_data.php',
                success: function(response) {
                    response = JSON.parse(response);
                    console.log(response);
                    var data_table = "";
                    var nama_fintech = response[0][10];
                    for (let i = 0; i < response.length; i++) {
                        var tgl_cair = response[i][6].split("-");
                        data_table += '<tr><td class="align-middle text-center">' + (i + 1);
                        data_table += '</td><td class="align-middle">' + response[i][0];
                        data_table += '</td><td class="align-middle">' + response[i][1];
                        data_table += '</td><td class="align-middle">' + response[i][2];
                        data_table += '</td><td class="align-middle">Rp. ' + formatRupiah(
                            response[i][3]);
                        data_table += '</td><td class="align-middle text-center">' +
                            response[i]
                            [4];
                        data_table += '</td><td class="align-middle text-center">' +
                            tgl_cair[
                                2] + '/' + tgl_cair[1] + '/' + tgl_cair[0];
                        data_table += '</td><td class="align-middle text-center">' +
                            response[i]
                            [7] + '</td></tr>';
                        temp_label.push(response[i][1]);
                        temp_data.push(parseInt(response[i][3]));
                    }
                    $("#title-table").html("Detail Nasabah - " + nama_fintech);
                    $("#content-table").html(data_table);
                    for (let i = 0; i < temp_label.length; i++) {
                        var color = dynamicColors(0.5);
                        if (!temp_bgcolor.includes(color)) {
                            temp_bgcolor.push(color);
                        }
                    }
                    $('#datanasabah').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": true,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                    });
                    myChart.data.labels = temp_label;
                    myChart.data.datasets[0].backgroundColor = temp_bgcolor;
                    myChart.data.datasets[0].data = temp_data;
                    myChart.update();
                }
            });
            $("#datanasabah").dataTable().fnDestroy();
        }
    });

})
</script>
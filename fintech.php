<?php
$title = "Fintech";
$page = "FINTECH";
session_start();
include "components/header.php";
require_once 'components/flash_msg.php';
include "components/menu.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Fintech</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Fintech</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-primary" id="tambahData">Tambah Fintech</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datafintech" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center">No</th>
                                        <th class="align-middle text-center">Nama Fintech</th>
                                        <th class="align-middle text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM fintech";
                                    $result = mysqli_query($koneksi, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<tr>
                                        <td class="align-middle text-center">' . $no . '</td>
                                        <td class="align-middle">' . $row['nama_fintech'] . '</td>
                                        <td class="align-middle">
                                            <div class="margin">
                                                <button type="button" class="btn btn-block btn-success" id="editData" data-id=' . $row['id_fintech'] . '>Edit</button>
                                                <a href="hapus_data.php?id_fintech=' . $row['id_fintech'] . '" class="btn btn-block btn-danger" id="delete" data-id=' . $row['id_fintech'] . '>Hapus</a>
                                            </div>
                                        </td>
                                    </tr>';
                                            $no++;
                                        }
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="align-middle text-center">No</th>
                                        <th class="align-middle text-center">Nama Fintech</th>
                                        <th class="align-middle text-center">Opsi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="form_fintech">
                    <div class="modal-body">
                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_fintech">Nama Fintech</label>
                                    <input type="text" class="form-control" name="nama_fintech" id="nama_fintech"
                                        placeholder="Masukkan Nama Fintech">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="id_fintech" name="id_fintech">
                            <input type="hidden" id="data" name="">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" id="simpan">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<?php
include 'components/footer.php';
?>

</div>
<!-- ./wrapper -->


<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

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


<!-- Page specific script -->
<script>
$(document).ready(function() {
    // combo box fintech
    // tabel Fintech
    $('#datafintech').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
    // FUNSGI SAAT TOMBOL EDIT DI KLIK
    $(document).on('click', "#editData", function() {
        var id = $(this).data('id');
        console.log(id);
        $.ajax({
            data: {
                id_fintech: id
            },
            type: 'POST',
            url: 'get_data.php',
            success: function(response) {
                response = JSON.parse(response);
                $('#id_fintech').val(response.id_fintech);
                $('#nama_fintech').val(response.nama_fintech);
                $('#ModalLabel').text('Ubah Data Fintech');
                $('#form_fintech').attr('action', 'edit_data.php');
                $('#data').attr('name', 'edit_fintech');
            }
        })

        $('#Modal').modal('show');
    });
    // FUNGSI SAAT TOMBOL TAMBAH DI KLIK
    $(document).on('click', "#tambahData", function() {
        $('#form_fintech').attr('action', 'tambah_data.php');
        $('#form_fintech')[0].reset();
        $('#ModalLabel').text('Tambah Data fintech');
        $('#data').attr('name', 'tambah_fintech');
        $('#Modal').modal('show');
    });
    // FUNGSI SAAT TOMBOL HAPUS DI KLIK
    $(document).on('click', "#delete", function() {
        return confirm('Hapus data fintech?');
    })
});
</script>
<?php
// FUNGSI UNTUK MEMUNCULKAN NOTIF
get_msg();
?>
</body>

</html>
<?php
$title = "Nasabah";
$page = "NASABAH";
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
                    <h1>Data Nasabah</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Nasabah</li>
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
                            <button class="btn btn-primary" id="tambahData">Tambah Nasabah</button>
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
                                        <th class="align-middle">Nama Fintech</th>
                                        <th class="align-middle">Tanggal Cair</th>
                                        <th class="align-middle">Jangka Waktu (Bulan)</th>
                                        <th class="align-middle">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM nasabah, fintech WHERE id_fintech = fintech";
                                    $result = mysqli_query($koneksi, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $tanggal_cair = explode("-", $row['tanggal_cair']);
                                            echo '<tr>
                                        <td class="align-middle text-center">' . $no . '</td>
                                        <td class="align-middle">' . $row['nomor_nasabah'] . '</td>
                                        <td class="align-middle">' . $row['nama'] . '</td>
                                        <td class="align-middle">' . $row['alamat'] . '</td>
                                        <td class="align-middle">Rp. ' . number_format($row['pinjaman_pokok'], 0, ',', '.') . '</td>
                                        <td class="align-middle text-center">' . $row['bunga'] . '</td>
                                        <td class="align-middle">' . $row['nama_fintech'] . '</td>
                                        <td class="align-middle text-center">' . $tanggal_cair[2] . '/' . $tanggal_cair[1] . '/' . $tanggal_cair[0] . '</td>
                                        <td class="align-middle text-center">' . $row['jangka_waktu'] . '</td>
                                        <td class="align-middle">
                                            <div class="margin">
                                                <button type="button" class="btn btn-block btn-success" id="editData" data-nomor=' . $row['nomor_nasabah'] . '>Edit</button>
                                                <a href="hapus_data.php?nomor_nasabah=' . $row['nomor_nasabah'] . '" class="btn btn-block btn-danger" id="delete" data-nomor=' . $row['nomor_nasabah'] . '>Hapus</a>
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
                                        <th class="align-middle">No</th>
                                        <th class="align-middle">Nomor Nasabah</th>
                                        <th class="align-middle">Nama Nasabah</th>
                                        <th class="align-middle">Alamat</th>
                                        <th class="align-middle">Pinjaman Pokok</th>
                                        <th class="align-middle">Bunga (%)</th>
                                        <th class="align-middle">Nama Fintech</th>
                                        <th class="align-middle">Tanggal Cair</th>
                                        <th class="align-middle">Jangka Waktu (Bulan)</th>
                                        <th class="align-middle">Opsi</th>
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
                <form action="" method="POST" id="form_nasabah">
                    <div class="modal-body">
                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nomor_nasabah">Nomor Nasabah</label>
                                    <input type="text" class="form-control" name="nomor_nasabah" id="nomor_nasabah"
                                        placeholder="Masukkan Nomor Nasabah">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Nasabah</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        placeholder="Masukkan Nama Nasabah">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat"
                                        placeholder="Masukkan Alamat Nasabah">
                                </div>
                                <div class="form-group">
                                    <label for="pinjaman_pokok">Pinjaman Pokok</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp. </span>
                                        </div>
                                        <input type="text" class="form-control" name="pinjaman_pokok"
                                            id="pinjaman_pokok" placeholder="Masukkan Pinjaman Pokok">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bunga">Bunga</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="bunga" id="bunga"
                                            placeholder="Masukkan Bunga">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Fintech</label>
                                    <select class="form-control select2" style="width: 100%;" name="fintech"
                                        id="fintech">
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
                                <div class="form-group">
                                    <label>Tanggal Cair</label>
                                    <div class="input-group date" id="tanggal_cair" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            data-target="#tanggal_cair" name="tgl_cair" id="tgl_cair"
                                            placeholder="Pilih Tanggal" />
                                        <div class="input-group-append" data-target="#tanggal_cair"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jangka_waktu">Jangka Waktu</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="jangka_waktu" id="jangka_waktu"
                                            placeholder="Masukkan Jangka Waktu">
                                        <div class="input-group-append">
                                            <span class="input-group-text">bulan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
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
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>

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
    $('#fintech').select2({
        dropdownParent: $("#Modal")
    });

    //Date picker​
    $('#tanggal_cair').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    // format angka saat input pinjaman pokok
    $("#pinjaman_pokok").keyup(function() {
        $("#pinjaman_pokok").val(formatRupiah($(this).val()));
    });
    // tabel nasabah
    $("#datanasabah").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo(
        '#datanasabah_wrapper .col-md-6:eq(0)');
    // FUNGSI SAAT TOMBOL EDIT DI KLIK
    $(document).on('click', "#editData", function() {
        var nomor = $(this).data('nomor');
        $.ajax({
            data: {
                nomor_nasabah: nomor
            },
            type: 'POST',
            url: 'get_data.php',
            success: function(response) {
                response = JSON.parse(response);
                $('#nomor_nasabah').val(response
                    .nomor_nasabah);
                $('#nama').val(response.nama);
                $('#alamat').val(response.alamat);
                $("#pinjaman_pokok").val(formatRupiah(
                    response.pinjaman_pokok));
                $('#bunga').val(response.bunga);
                $('#alamat').val(response.alamat);
                $('#fintech').val(response.id_fintech)
                    .change();
                var tgl_split = response.tanggal_cair.split(
                    '-');
                $('#tgl_cair').val(tgl_split[2] + '/' +
                    tgl_split[1] + '/' + tgl_split[0]);
                $('#jangka_waktu').val(response
                    .jangka_waktu);
                $('#ModalLabel').text('Ubah Data Nasabah');
                $('#form_nasabah').attr('action',
                    'edit_data.php');
                $('#data').attr('name', 'edit_nasabah');
                $('#Modal').modal('show');
            }
        })
    });

    // FUNGSI SAAT TOMBOL TAMBAH DI KLIK
    $(document).on('click', "#tambahData", function() {
        $('#form_nasabah').attr('action', 'tambah_data.php');
        $('#form_nasabah')[0].reset();
        $('#ModalLabel').text('Tambah Data Nasabah');
        $('#data').attr('name', 'tambah_nasabah');
        $('#Modal').modal('show');
    });
    // FUNGSI SAAT TOMBOL HAPUS DI KLIK
    $(document).on('click', "#delete", function() {
        var nomor = $(this).data('nomor');
        return confirm('Hapus data nasabah ' + nomor + '?');
    })
});
</script>
<?php
// UNTUK MENAMPILKAN NOTIF BERHASIL ATAU ERROR
get_msg();
?>
</body>

</html>
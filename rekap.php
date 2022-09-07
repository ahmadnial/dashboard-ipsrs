<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location: http://192.168.10.7:277/IT-portal/index.php");
  exit;
}

include 'template/header.php'; ?>

<!-- <div class="content-wrapper"> -->

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <!-- <h1>Dashboardnya Bu kesekretariatan</h1> -->
      </div>
      <div class="col-sm">
        <ol class="breadcrumb float-sm-right">
          <!-- <li class="breadcrumb-item"><a href="#">Soon</a></li>
          <li class="breadcrumb-item active">Soon</li> -->
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

        <!-- /.card-header -->
        <div class="card">
          <div class="card-header bg-primary">
            <h3 class="card-title">Rekap Order Perbaikan IPSRS</h3>
          </div>
          <!-- /.card-header -->

          <div class="container-fluid">
            <form action="" method="post">
              <div class="form-gruop mb-3 mt-3">
                <div class="form-inline">
                  <input type="date" class="form-control  mr-1" name="start" value="" />
                  <a>s/d</a>
                  <input type="date" class="form-control ml-1" name="end" value="" />
                  <!-- <button type="submit" name="cari" class="btn btn-primary ml-3">Search</button> -->

                  <div class="form-gruop  col-5">
                    <!-- <label for="" class="form-label">Pilih Layanan/Unit/Instalasi</label> -->
                    <div class="form-inline">
                      <!-- <select class="custom-select" name="keterangan" required>
                              <option selected>--Choose--</option>
                              <option value="1">Belum Terisi</option>
                              <option value="">Sudah Terisi</option>
                            </select> -->
                      <button type="submit" name="cari" class="btn btn-primary ml-3">Search</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <table id="example1" class="table table-bordered table-striped">
              <thead class="bg-info">
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Unit/Ins</th>
                  <th>Nama Barang</th>
                  <th>jenis/Tipe</th>
                  <th>Des. kerusakan</th>
                  <th>Ket.</th>
                  <th>Pelapor</th>
                  <th>Status</th>
                  <th>Jenis Kerusakan</th>
                  <th>Identifikasi</th>
                  <th>RTL</th>
                  <th>Target Pengerjaan</th>
                  <th>Tanggal Selesai</th>
                  <th>Petugas</th>
                  <th>Biaya</th>
                  <th>Ket.</th>
                  <th>Pencetan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "conn.php";

                if (isset($_POST['cari'])) {
                  $start = $_POST['start'];
                  $end = $_POST['end'];
                  // $ket = $_POST['keterangan'];

                  $sql = " SELECT * FROM  order_perbaikan where tanggal between '$start' and '$end' ";
                  $no = 1;
                  $query = sqlsrv_query($conn, $sql) or die(sqlsrv_errors());;
                  while ($data = sqlsrv_fetch_array($query)) {
                ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['tanggal']; ?></td>
                      <td><?php echo $data['layanan']; ?></td>
                      <td><?php echo $data['nm_brg']; ?></td>
                      <td><?php echo $data['jenis_tipe']; ?></td>
                      <td><?php echo $data['jenis_kerusakan']; ?></td>
                      <td><?php echo $data['keterangan']; ?></td>
                      <td><?php echo $data['pelapor']; ?></td>
                      <td class="text-danger"><?php echo $data['status']; ?></td>
                      <td><?php echo $data['jenis_kerusakan2']; ?></td>
                      <td><?php echo $data['identifikasi']; ?></td>
                      <td><?php echo $data['rtl']; ?></td>
                      <td><?php echo $data['target']; ?></td>
                      <td><?php echo $data['selesai']; ?></td>
                      <td><?php echo $data['petugas']; ?></td>
                      <td><?php echo $data['biaya']; ?></td>
                      <td><?php echo $data['ket']; ?></td>
                      <td>
                        <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalMadil<?php echo $data['id']; ?>">Click Me!</button>
                        <button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#ModalStatus<?php echo $data['id']; ?>">Status &nbsp;&nbsp;&nbsp;&nbsp;</button>
                      </td>
                    </tr>
                    <!-- MODAL -->
                    <div class="modal fade" id="ModalMadil<?php echo $data['id']; ?>">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header bg-warning">
                            <h5 class="modal-title " id="Label">Edit Data</h5>
                            <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
                          </div>
                          <div class="modal-body">
                            <form action="" method="post" name="" id="">
                              <div class="f-group">
                                <!-- <label for=""></label> -->
                                <input type="hidden" name="id" required value="<?php echo $data['id']; ?>">
                              </div>
                              <div class="f-group">
                                <label for="">Tanggal</label>
                                <input type="date" id="" name="tgl" placeholder="" class="form-control" required value="<?php echo $data['tanggal']; ?>" readonly>
                              </div>
                              <div class="f-group mt-1">
                                <label for="">Unit/Ins</label>
                                <input type="text" id="" name="layanan" placeholder="" class="form-control" required value="<?php echo $data['layanan']; ?>" readonly>
                              </div>
                              <div class="f-group mt-1">
                                <label for="">Nama Barang</label>
                                <input type="text" id="" name="nm_brg" placeholder="" class="form-control" required value="<?php echo $data['nm_brg']; ?>" readonly>
                              </div>

                              <!-- Add IPSRS -->

                              <div class="mb-3 mt-3">
                                <label for="alamat" class="form-label">Jenis Kerusakan</label>
                                <textarea class="form-control" name="jenis_kerusakan2" id="" rows="3" required="Silahkan lengkapi dulu!" placeholder="Tuliskan Jenis Kerusakan"><?php echo $data['jenis_kerusakan2']; ?></textarea>
                              </div>
                              <div class="mb-3 mt-3">
                                <label for="alamat" class="form-label">identifikasi</label>
                                <textarea class="form-control" name="identifikasi" id="" rows="2" placeholder="Tuliskan Identifikasi"><?php echo $data['identifikasi']; ?></textarea>
                              </div>
                              <div class="mb-3 mt-3">
                                <label for="alamat" class="form-label">Rencana Tindak Lanjut (RTL)</label>
                                <textarea class="form-control" name="rtl" id="" rows="4" required="Silahkan lengkapi dulu!" placeholder="Tuliskan Rencana tindak lanjut"><?php echo $data['rtl']; ?></textarea>
                              </div>
                              <div class="mb-3 mt-3">
                                <label for="">Target Pengerjaan</label>
                                <input type="date" id="" name="target" placeholder="" class="form-control" required value="<?php echo $data['target']; ?>">
                              </div>
                              <div class="mb-3 mt-3">
                                <label for="">Tanggal Selesai Pengerjaan</label>
                                <input type="date" id="" name="selesai" placeholder="" class="form-control" required value="<?php echo $data['selesai']; ?>">
                              </div>
                              <div class="mb-3 mt-3">
                                <label for="alamat" class="form-label">Petugas</label>
                                <textarea class="form-control" name="petugas" id="" rows="2" placeholder=""><?php echo $data['petugas']; ?></textarea>
                              </div>
                              <div class="mb-3 mt-3">
                                <label for="alamat" class="form-label">Biaya</label>
                                <textarea class="form-control" name="biaya" id="" rows="1" placeholder=""><?php echo $data['biaya']; ?></textarea>
                              </div>
                              <div class="mb-3 mt-3">
                                <label for="alamat" class="form-label">Keterangan</label>
                                <textarea class="form-control" name="ket" id="" rows="2" placeholder=""><?php echo $data['ket']; ?></textarea>
                              </div>

                              <button type="submit" name="update" id="update" class="btn btn-success mt-3 ml-2 float-right">Update</button>
                              <button type="button" class="btn btn-danger mt-3 float-right" data-dismiss="modal">Close</button>
                          </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                      </div>
                    </div>

                    <!-- MODAL -->
                    <div class="modal fade" id="ModalStatus<?php echo $data['id']; ?>">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header bg-warning">
                            <h5 class="modal-title " id="Label">Input Status Ndeng!</h5>
                            <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
                          </div>
                          <div class="modal-body">
                            <form action="" method="post" name="" id="">
                              <div class="f-group">
                                <!-- <label for=""></label> -->
                                <input type="hidden" name="id" required value="<?php echo $data['id']; ?>">
                              </div>
                              <div class="f-group">
                                <label for="">Status</label>
                                <input type="text" id="" name="status" placeholder="" class="form-control" required value="<?php echo $data['status']; ?>">
                              </div>
                              <button type="submit" name="input-status" id="input-status" class="btn btn-success mt-3 ml-2 float-right">Update</button>
                              <button type="button" class="btn btn-danger mt-3 float-right" data-dismiss="modal">Close</button>
                          </div>
                          </form>
                        </div>
                        <div class="modal-footer">

                        <?php } ?>
                      <?php } ?>
                      <?php include 'edit.php' ?>
                      <?php include 'inputStatus.php' ?>
                      </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
</section>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="float-right d-none d-sm-inline">
    We serve, Anything you want
    <strong>Copyright &copy; 2022 <a href="">IT-RSNR</a>.</strong> All rights reserved.
</footer>


<!-- jQuery -->
<script src="dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="dashboard/plugins/jszip/jszip.min.js"></script>
<script src="dashboard/plugins/pdfmake/pdfmake.min.js"></script>
<script src="dashboard/plugins/pdfmake/vfs_fonts.js"></script>
<script src="dashboard/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="dashboard/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dashboard/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>
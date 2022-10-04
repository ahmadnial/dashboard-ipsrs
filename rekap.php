<?php

// session_start();

// if (!isset($_SESSION["login"])) {
//   header("location: http://192.168.10.7:277/IT-portal/index.php");
//   exit;
// }

include 'template/header.php'; ?>
<style>
  /* .notif {
    -webkit-animation: invalid 1s infinite;

    -moz-animation: invalid 1s infinite;

    -o-animation: invalid 1s infinite;

    animation: invalid 1s infinite;

  } */
  .notif {
    /* background-color: blueviolet; */
    font-style: oblique;
  }

  blink {
    animation: 1s linear infinite condemned_blink_effect;
  }

  @keyframes condemned_blink_effect {
    0% {
      visibility: hidden;
    }

    50% {
      visibility: hidden;
    }

    100% {
      visibility: visible;
    }
  }
</style>
<link rel="stylesheet" href="dashboard/plugins/select2/css/select2.min.css">




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
                      <button type="submit" name="cari" class="btn btn-success ml-3">Search</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <table id="example1" class="table table-bordered table-striped">
              <thead class="bg-gray">
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>jam</th>
                  <th>Unit/Ins</th>
                  <th>Nama Barang</th>
                  <th>jenis/Tipe</th>
                  <th>Des. kerusakan</th>
                  <th>Ket.</th>
                  <th>Pelapor</th>
                  <th>Status</th>
                  <th>Waktu Respon</th>
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
                      <td><?php echo $data['jam']; ?></td>
                      <td><?php echo $data['layanan']; ?></td>
                      <td><?php echo $data['nm_brg']; ?></td>
                      <td><?php echo $data['jenis_tipe']; ?></td>
                      <td><?php echo $data['jenis_kerusakan']; ?></td>
                      <td><?php echo $data['keterangan']; ?></td>
                      <td><?php echo $data['pelapor']; ?></td>
                      <td class="notif bg-warning" id="statuss">
                        <blink><b><?php echo $data['status']; ?></b></blink>
                      </td>
                      <td><?php echo $data['jam_respon']; ?></td>
                      <td><?php echo $data['jenis_kerusakan2']; ?></td>
                      <td><?php echo $data['identifikasi']; ?></td>
                      <td><?php echo $data['rtl']; ?></td>
                      <td><?php echo $data['target']; ?></td>
                      <td><?php echo $data['selesai']; ?></td>
                      <td><?php echo $data['petugas']; ?></td>
                      <td><?php echo $data['biaya']; ?></td>
                      <td><?php echo $data['ket']; ?></td>
                      <td>
                        <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalMadil<?php echo $data['id']; ?>">Edit / Add</button>
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

                              <div class="f-group mt-2">
                                <label for="">Jam</label>
                                <input type="time" id="" name="jam_respon" placeholder="" class="form-control" required value="<?php echo $data['jam_respon']; ?>">
                              </div>
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
                              <!-- <div class="mb-3 mt-3">
                                <label for="alamat" class="form-label">Petugas</label>
                                <textarea class="form-control" name="petugas" id="" rows="2" placeholder=""><?php echo $data['petugas']; ?></textarea>
                              </div> -->
                              <div class="mb-3 mt-3">
                                <label>Petugas</label>
                                <div class="select2-purple">
                                  <select class="select2" name="timlist[]" multiple="multiple" data-placeholder="Select a Man" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                    <option value="Suko Prasojo">Suko</option>
                                    <option value="Tri Adi N">Si Tri</option>
                                    <option value="Setyo Yulianto">Setyo</option>
                                    <option value="Mujiharjo">Mujex</option>
                                    <option value="Yeni Debora">Debora</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 mt-3">
                                <label for="alamat" class="form-label">Biaya</label>
                                <input type="text" class="form-control" name="biaya" id="biaya" value="" data-type="currency" placeholder="Auto Currency" value="<?php echo $data['biaya']; ?>">
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

<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="float-right d-none d-sm-inline">
    <strong>Copyright &copy; 2022 <a href="">IT-RSNR</a></strong> | Anything U Want.
</footer>


<!-- jQuery -->
<script src="dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="dashboard/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="dashboard/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="dashboard/plugins/moment/moment.min.js"></script>
<script src="dashboard/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src=dashboard/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src=dashboard/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="dashboard/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="dashboard/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="dashboard/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dashboard/dist/js/adminlte.min.js"></script>

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

<!-- BS-Stepper -->
<script src="dashboard/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="dashboard/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dashboard/dist/js/adminlte.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<script src="js/sweetalert2.all.js"></script>
<script src="js/autoDate.js"></script>

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

  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });

  //blinking

  $(function() {
    var on = false;
    window.setInterval(function() {
      on = !on;
      if (on) {
        $('.notif').addClass('valid-blink')
      } else {
        $('.valid-blink').removeClass('valid-blink')
      }
    }, 2000);
  });


  //currency format

  $("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() {
      formatCurrency($(this), "blur");
    }
  });


  function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
  }


  function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.

    // get input value
    var input_val = input.val();

    // don't validate empty input
    if (input_val === "") {
      return;
    }

    // original length
    var original_len = input_val.length;

    // initial caret position 
    var caret_pos = input.prop("selectionStart");

    // check for decimal
    if (input_val.indexOf(".") >= 0) {

      // get position of first decimal
      // this prevents multiple decimals from
      // being entered
      var decimal_pos = input_val.indexOf(".");

      // split number by decimal point
      var left_side = input_val.substring(0, decimal_pos);
      var right_side = input_val.substring(decimal_pos);

      // add commas to left side of number
      left_side = formatNumber(left_side);

      // validate right side
      right_side = formatNumber(right_side);

      // On blur make sure 2 numbers after decimal
      if (blur === "blur") {
        right_side += "00";
      }

      // Limit decimal to only 2 digits
      right_side = right_side.substring(0, 2);

      // join number by .
      input_val = "Rp" + left_side + "." + right_side;

    } else {
      // no decimal entered
      // add commas to number
      // remove all non-digits
      input_val = formatNumber(input_val);
      input_val = "Rp" + input_val;

      // final formatting
      // if (blur === "blur") {
      //   input_val += ".00";
      // }
    }

    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
  }
</script>
</body>

</html>
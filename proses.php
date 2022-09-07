<?php
include "conn.php";

error_reporting(E_ERROR | E_PARSE);

if (isset($_POST['save'])) {

    $tanggal = $_POST['tgl'];
    $rm = $_POST['rm'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jaminan = $_POST['jaminan'];
    $diagnosa_pre = $_POST['diag_pre_op'];
    $tindakan = $_POST['tindakan'];
    $diagnosa_pasca = $_POST['diag_pas_op'];
    $teknik = $_POST['teknik_anestesi'];
    $konversi = $_POST['konversi_t_a'];
    $droperator = $_POST['dr_operator'];
    $dranestesi = $_POST['dr_anestesi'];
    $penata = $_POST['penata_anestesi'];
    $mulai = $_POST['start_time'];
    $selesai = $_POST['end_time'];
    $durasi = $_POST['durasi'];
    $timlist = $_POST['timlist'];

    // foreach ($timlist as $tim) {
    // $tim = json_encode($timlist);
    // $tim = array($_POST['timlist']);

    // $ketTanggal = '*Tanggal : ';
    // $ketLayanan = '*Layanan : ';
    // $ketNmBrg = '*Nama Barang : ';
    // $ketKerusakan = '*Kerusakan : ';
    // $ketKet = '*Keterangan : ';
    // $ketPelapor = '*Pelapor : ';
    // $text = $_POST[''];

    $sql = "INSERT INTO register_ibs (tanggal,no_rm,nama,umur,jaminan,diagnosa_pre,tindakan,diagnosa_pasca,
    teknik_anestesi,konversi_anestesi,dr_operator,dr_anestesi,penata_anestesi,tim,jam_mulai,jam_selesai,durasi_jam) VALUES ('$tanggal','$rm','$nama','$umur','$jaminan','$diagnosa_pre',
    '$tindakan','$diagnosa_pasca','$teknik','$konversi','$droperator','$dranestesi','$penata','*$timlist[0]<br>*$timlist[1]<br>*$timlist[2]<br>*$timlist[3]<br>*$timlist[4]<br>*$timlist[5]<br>*$timlist[6]','$mulai','$selesai','$durasi')";
    // var_dump($tim);
    // die();
    // }
    $query = sqlsrv_query($conn, $sql);

    if ($query) {
        //redirect ke halaman index
        echo "<script> alert(
            'Sip,sampun Kesimpen sri!') </script>";
    } else {
        // var_dump();
        die(print_r(sqlsrv_errors(), true));
    }
}

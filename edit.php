
                                                    <?php
                                                    include "conn.php";

                                                    error_reporting(E_ERROR | E_PARSE);

                                                    if (isset($_POST['update'])) {
                                                        $jr = $_POST['jam_respon'];
                                                        $jk = $_POST['jenis_kerusakan2'];
                                                        $iden = $_POST['identifikasi'];
                                                        $rtl = $_POST['rtl'];
                                                        $target = $_POST['target'];
                                                        $selesai = $_POST['selesai'];
                                                        // $petugas = $_POST['petugas'];
                                                        $timlist = $_POST['timlist'];
                                                        $biaya = $_POST['biaya'];
                                                        $ket = $_POST['ket'];
                                                        $id = $_POST['id'];

                                                        $sql2 = " UPDATE order_perbaikan set jam_respon='$jr', jenis_kerusakan2='$jk', identifikasi='$iden', rtl='$rtl', target='$target', selesai='$selesai', 
                                                        petugas='-$timlist[0]<br>-$timlist[1]<br>-$timlist[2]<br>-$timlist[3]<br>-$timlist[4]', biaya='$biaya', ket='$ket' where id='$id' ";

                                                        $query2 = sqlsrv_query($conn, $sql2);

                                                        if ($query2) {
                                                            //redirect ke halaman index
                                                            // header("location: inventory.php");
                                                            echo "<script> alert(
                                                                    'Sip,Berhasil update lek!',
                                                                    'Mantap Sekali',
                                                                    'success') </script>";
                                                            // echo '<script language="javascript">document.location="rekap-pelaporan.php";</script>';
                                                        } else {
                                                            die(print_r(sqlsrv_errors(), true));
                                                        }
                                                    }
                                                    ?>
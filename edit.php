
                                                    <?php
                                                    include "conn.php";

                                                    if (isset($_POST['update'])) {
                                                        $jk = $_POST['jenis_kerusakan2'];
                                                        $iden = $_POST['identifikasi'];
                                                        $rtl = $_POST['rtl'];
                                                        $target = $_POST['target'];
                                                        $selesai = $_POST['selesai'];
                                                        $petugas = $_POST['petugas'];
                                                        $biaya = $_POST['biaya'];
                                                        $ket = $_POST['ket'];
                                                        $id = $_POST['id'];
                                                        $sql2 = " UPDATE order_perbaikan set jenis_kerusakan2='$jk', identifikasi='$iden', rtl='$rtl', target='$target', selesai='$selesai', 
                                                        petugas='$petugas', biaya='$biaya', ket='$ket' where id='$id' ";
                                                        $query2 = sqlsrv_query($conn, $sql2) or die(sqlsrv_errors());;
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
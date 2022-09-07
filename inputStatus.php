
                                                    <?php
                                                    include "conn.php";

                                                    if (isset($_POST['input-status'])) {
                                                        $status = $_POST['status'];
                                                        $id = $_POST['id'];
                                                        $sql2 = " UPDATE order_perbaikan set status='$status' where id='$id' ";
                                                        $query2 = sqlsrv_query($conn, $sql2) or die(sqlsrv_errors());;
                                                        if ($query2) {
                                                            //redirect ke halaman index
                                                            // header("location: inventory.php");
                                                            echo "<script> alert(
                                                                    'Jos,Berhasil ngisi status!',
                                                                    'Mantap Sekali',
                                                                    'success') </script>";
                                                            // echo '<script language="javascript">document.location="rekap-pelaporan.php";</script>';
                                                        } else {
                                                            die(print_r(sqlsrv_errors(), true));
                                                        }
                                                    }
                                                    ?>
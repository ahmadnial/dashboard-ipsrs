<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IPSRS | RSNR</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Asses SB-Admin -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="dashboard/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dashboard/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <script src="js/ajax.jquery.min"></script>
    <!-- dropzonejs -->
    <link rel="stylesheet" href="dashboard/plugins/dropzone/min/dropzone.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="dashboard/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="dashboard/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <style>
        html,
        body {
            height: 100%;
        }

        .card-body {
            display: flex;
            margin: ;
            float: center;
            text-align: left;
            align-items: center;
        }
    </style>

</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-light">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">
                    <img src="img/paypal2.png" alt="">
                    <span class="brand-text font-weight-light">Dashboard IPSRS</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="index.php" class="nav-link">Form Register</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Rekap</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <!-- <li><a href="#" class="dropdown-item"></a></li> -->
                                <li><a href="rekap.php" class="dropdown-item">Rekap Pelaporan</a></li>

                                <!-- <li class="dropdown-divider"></li>


                                <li class="dropdown-submenu dropdown-hover">
                                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                        <li>
                                            <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                                        </li>


                                        <li class="dropdown-submenu">
                                            <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                                            <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                                            </ul>
                                        </li>


                                        <li><a href="#" class="dropdown-item">level 2</a></li>
                                        <li><a href="#" class="dropdown-item">level 2</a></li>
                                    </ul>
                                </li> -->

                            </ul>
                        </li>
                    </ul>

                    <!-- SEARCH FORM -->
                    <!-- <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div> -->
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <figure>
                                <h1 class="blockquote mb-3">
                                    <p>Instalasi Pemeliharaan Sarana Rumah Sakit (IPSRS)</p>
                                </h1>
                                <figcaption class="blockquote-footer">
                                    RS Nur Rohmah &nbsp;<cite title="Source Title">yoi</cite>
                                </figcaption>
                            </figure>
                            <!-- <h1 class="m-0">  <small>RS Nur Rohmah</small></h1> -->
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">自宅</a></li>
                                <li class="breadcrumb-item"><a href="#">近日公開</a></li>
                                <li class="breadcrumb-item active">近日公開</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
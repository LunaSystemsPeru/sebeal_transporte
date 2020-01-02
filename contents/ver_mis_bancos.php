<?php
session_start();

require '../models/Banco.php';
$c_banco = new Banco();

?>
<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:57:38 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>Mis Bancos - Mi Agente - desarrollado por Luna Systems Peru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="../public/assets/images/favicon.ico">

    <!-- Sweet Alert-->
    <link href="../public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css"/>

    <!-- c3 plugin css -->
    <link rel="stylesheet" type="text/css" href="../public/assets/libs/c3/c3.min.css">

    <!-- App css -->
    <link href="../public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../public/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="../public/assets/css/app.min.css" rel="stylesheet" type="text/css"/>

</head>

<body>

<!-- Navigation Bar-->
<?php require '../fixed/header.php' ?>
<!-- End Navigation Bar-->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="wrapper">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">inicio</a></li>
                            <li class="breadcrumb-item active">Mis Bancos</li>
                        </ol>
                    </div>
                    <h3 class="page-title"></h3>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="page-title col-md-12" style="text-align: center;">Bancos</h2>
                        <a href="reg_banco.php">
                            <button style="margin-bottom: 10px;" type="button" class="btn btn-info waves-effect waves-light"><i class="dripicons-plus mr-1">
                                </i><span>Nuevo Banco</span></button>
                        </a>
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover">
                                <caption></caption>
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Efectivo</th>
                                    <th scope="col">Virtual Agente</th>
                                    <th scope="col">Suma Total</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $c_banco->setIdEmpresa($_SESSION['id_empresa']);
                                $a_bancos = $c_banco->verFilas();
                                $item = 1;
                                $suma_total = 0;
                                foreach ($a_bancos as $fila) {
                                    $suma_banco = $fila['efectivo'] +  $fila['virtual'];
                                    $suma_total += $suma_banco;
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $item?></th>
                                        <td><?php echo $fila['nombre']?></td>
                                        <td class="text-right"><?php echo number_format($fila['efectivo'],2)?></td>
                                        <td class="text-right"><?php echo number_format($fila['virtual'], 2)?></td>
                                        <td class="text-right"><?php echo number_format($suma_banco, 2)?></td>
                                        <td class="text-center">
                                            <a href="ver_movimientos_banco.php?id_banco=<?php echo $fila['id_banco']?>" class="btn btn-icon waves-effect waves-light btn-success"><i class="dripicons-view-list"></i></a>
                                            <button class="btn btn-icon waves-effect waves-light btn-primary"><i class="dripicons-pencil"></i></button>
                                            <button class="btn btn-icon waves-effect waves-light btn-danger" id="sa-warning"><i class="dripicons-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php
                                    $item ++;
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th scope="row" colspan="4"></td>
                                    <td class="text-right"><?php echo number_format($suma_total, 2)?></td>
                                    <td class="text-center"></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- end container-fluid -->
</div>
<!-- end wrapper -->

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


<!-- Footer Start -->
<?php require '../fixed/footer.php' ?>
<!-- end Footer -->

<!-- Right Sidebar -->
<?php require '../fixed/right-sidebar.php' ?>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>


<!-- Vendor js -->
<script src="../public/assets/js/vendor.min.js"></script>

<!-- plugins -->
<script src="../public/assets/libs/c3/c3.min.js"></script>
<script src="../public/assets/libs/d3/d3.min.js"></script>

<!-- dashboard init -->
<script src="../public/assets/js/pages/dashboard.init.js"></script>

<!-- Sweet Alerts js -->
<script src="../public/assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- App js -->
<script src="../public/assets/js/app.min.js"></script>

</body>

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:59:12 GMT -->
</html>
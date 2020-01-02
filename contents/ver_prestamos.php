<?php
session_start();

require '../models/Prestamo.php';
$c_prestamos = new Prestamo();
?>
<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:57:38 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>Mis Prestamos - Mi Agente - desarrollado por Luna Systems Peru</title>
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
                            <li class="breadcrumb-item active">Mis Prestamos</li>
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
                        <h2 class="page-title col-md-12" style="text-align: center;">Prestamos</h2>
                        <p class="text-muted">Aqui se alimentara el monto de los retiros de dinero o pagos de servicios fiados, tener en cuenta que este dinero sera descontado dle total efectivo, cada vez que realicen pagos aumentara segun el monto devuelto.</p>
                        <a href="reg_prestamo.php">
                            <button style="margin-bottom: 10px;" type="button" class="btn btn-info waves-effect waves-light"><i class="dripicons-plus mr-1">
                                </i><span>Nuevo Prestamo</span></button>
                        </a>
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover">
                                <caption></caption>
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Banco Origen</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Pagado</th>
                                    <th scope="col">Saldo</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $a_prestamos = $c_prestamos->verFilas($_SESSION['id_empresa']);
                                $item = 1;
                                $total_ingresos = 0;
                                $total_egresos = 0;
                                $total_saldo = 0;
                                foreach ($a_prestamos as $fila) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $item ?></th>
                                        <td><?php echo $fila['fecha'] ?></td>
                                        <td><?php echo $fila['observaciones'] ?></td>
                                        <td><?php echo $fila['nombanco'] ?></td>
                                        <td class="text-right"><?php echo $fila['monto'] ?></td>
                                        <td class="text-right"><?php echo $fila['devuelto'] ?></td>
                                        <td class="text-right"><?php echo number_format($fila['monto'] - $fila['devuelto'], 2) ?></td>
                                        <td class="text-center">
                                            <a href="ver_movimientos_prestamo.php?id_prestamo=<?php echo $fila['id_prestamo'] ?>" class="btn btn-icon waves-effect waves-light btn-success"><i class="dripicons-view-list"></i></a>
                                            <button class="btn btn-icon waves-effect waves-light btn-danger" id="sa-warning"><i class="dripicons-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php
                                    $item++;
                                    $total_ingresos += $fila['monto'];
                                    $total_egresos += $fila['devuelto'];
                                    $total_saldo += $fila['monto'] - $fila['devuelto'];
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th scope="row" colspan="4">
                                    </td>
                                    <td class="text-right"><?php echo number_format($total_ingresos, 2) ?></td>
                                    <td class="text-right"><?php echo number_format($total_egresos, 2) ?></td>
                                    <td class="text-right"><?php echo number_format($total_saldo, 2) ?></td>
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
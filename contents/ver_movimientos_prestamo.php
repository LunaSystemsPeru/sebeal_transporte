<?php
session_start();

require '../models/MovimientoPrestamo.php';
require '../models/Prestamo.php';
require '../models/Banco.php';

$c_prestamo = new Prestamo();
$c_banco = new Banco();
$c_movimientos = new MovimientoPrestamo();

$c_prestamo->setIdPrestamo(filter_input(INPUT_GET, 'id_prestamo'));
$c_prestamo->obtenerDatos();

$c_banco->setIdBanco($c_prestamo->getIdBanco());
$c_banco->obtenerDatos();

$c_movimientos->setIdPrestamo($c_prestamo->getIdPrestamo());
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
            <div class="col-lg-3">
                <div class="member-card">
                    <h4 class="mb-1"><?php echo $c_prestamo->getObservaciones() ?></h4>
                    <p class="text-muted mb-3"><a class="text-pink"><?php echo $c_banco->getNombre() ?></a></p>
                    <p class="text-muted">
                        <b>Deuda Total: </b>S/ <?php echo number_format($c_prestamo->getMonto(), 2) ?>
                    </p>

                    <p class="text-muted">
                        <b>Pagado: </b> S/ <?php echo number_format($c_prestamo->getDevuelto(), 2) ?>
                    </p>

                </div>
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <h2 class="page-title col-md-12" style="text-align: center;">Detalle del Prestamo (Pagos y Retiro)</h2>
                        <p class="text-muted">se registra los pagos hechos o se aumentan la deuda, todo es acumulativo por banco</p>
                        <button style="margin-bottom: 10px;" type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target=".bs-add-movimiento"><i class="dripicons-plus mr-1"></i><span>Nuevo Movimiento</span></button>
                        <a href="ver_prestamos.php">
                            <button style="margin-bottom: 10px;" type="button" class="btn btn-warning waves-effect waves-light"><i class="dripicons-backspace"> </i><span> ver Mis Prestamos</span></button>
                        </a>

                        <div class="table-responsive">
                            <table class="table mb-0 table-hover">
                                <caption></caption>
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Detalle</th>
                                    <th scope="col">Paga</th>
                                    <th scope="col">Deuda</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $a_movimientos = $c_movimientos->verFilas();
                                $item = 1;
                                $total_ingresos = 0;
                                $total_egresos = 0;
                                foreach ($a_movimientos as $fila) {
                                    $total_ingresos += $fila['ingresa'];
                                    $total_egresos += $fila['egresa'];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $item ?></th>
                                        <td><?php echo $fila['fecha'] ?></td>
                                        <td><?php echo $fila['descripcion'] ?></td>
                                        <td class="text-right"><?php echo number_format($fila['ingresa'], 2) ?></td>
                                        <td class="text-right"><?php echo number_format($fila['egresa'], 2) ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-icon waves-effect waves-light btn-danger" id="sa-warning" onclick="eliminarMovimientoPrestamo('<?php echo $fila['id_movimientos']?>', '<?php echo $c_prestamo->getIdPrestamo()?>')" ><i class="dripicons-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php
                                    $item++;
                                }
                                ?>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td scope="row" colspan="3"></td>
                                    <td class="text-right"><?php echo number_format($total_ingresos, 2) ?></td>
                                    <td class="text-right"><?php echo number_format($total_egresos, 2) ?></td>
                                    <td class="text-center"></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-add-movimiento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title mt-0" id="myLargeModalLabel">Agregar Movimiento</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="" method="post" action="../controller/movimiento_prestamo.php">
                            <div class="form-group row">
                                <label class="col-md-3" for="inputCliente">Cliente</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" id="inputCliente" name="inputCliente" class="form-control" value="<?php echo $c_prestamo->getObservaciones()?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3" for="inputBanco">Banco</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" id="inputBanco" name="inputBanco" class="form-control" value="<?php echo $c_banco->getNombre()?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3" for="inputFecha">Fecha</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="date" id="inputFecha" name="inputFecha" class="form-control" value="<?php echo date("Y-m-d") ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3" for="selectMovimiento">Tipo Movimiento</label>
                                <div class="col-md-8">
                                    <div class="input-group" id="selectMovimiento" >
                                        <select class="form-control" name="selectMovimiento">
                                            <option value="1">AUMENTA DEUDA</option>
                                            <option value="2">PAGAR DEUDA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3" for="inputMonto">Monto</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" id="inputMonto" name="inputMonto" class="form-control text-right" placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="inputIdPrestamo" value="<?php echo $c_prestamo->getIdPrestamo()?>">
                            <input type="hidden" name="inputidBanco" value="<?php echo $c_banco->getIdBanco()?>">
                            <button type="submit" class="btn btn-purple waves-effect waves-light mt-3">Guardar</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
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
<script src="../public/assets/js/sweet-alerts.init.js"></script>

</body>

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:59:12 GMT -->
</html>
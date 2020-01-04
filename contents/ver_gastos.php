<?php
session_start();

require '../models/Gasto.php';
require '../models/Banco.php';
require '../models/Clasificacion.php';

$c_gasto = new Gasto();
$c_banco = new Banco();
$c_clasificacion = new Clasificacion();

$periodo = filter_input(INPUT_GET, 'periodo');

if (!$periodo) {
    $periodo = date("Ym");
}

?>
<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:57:38 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>Gastos - Sebeal Transporte - desarrollado por Luna Systems Peru</title>
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
                            <li class="breadcrumb-item active">Mis Gastos no Documentados</li>
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
                        <h2 class="page-title col-md-12" style="text-align: center;">Mis Gastos no Documentados</h2>
                                <button style="margin-bottom: 10px;" type="button" data-toggle="modal" data-target="#modal-add-bank"  class="btn btn-info waves-effect waves-light"><i class="dripicons-plus mr-1">
                                    </i><span>Nuevo Gastos</span></button>
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover">
                                <caption></caption>
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Caja/Banco</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Clasificacion</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $a_movimientos = $c_gasto->verFilas($periodo);
                                $item = 1;
                                $suma = 0;
                                foreach ($a_movimientos as $fila) {
                                    $suma += $fila['sale'];
                                    ?>
                                    <tr>
                                        <td style=""><?php echo $item?></td>
                                        <td style="text-align: center; "><?php echo $fila['fecha']?></td>
                                        <td style="text-align: center; "><?php echo $fila['banco']?></td>
                                        <td style="text-align: left; "><?php echo $fila['descripcion']?></td>
                                        <td style="text-align: right; "><?php echo number_format($fila['sale'],2)?></td>
                                        <td style="text-align: center; "><?php echo $fila['clasificacion']?></td>
                                        <td style="text-align: center; ">
                                            <button type="button" onclick="eliminar(47)" class="btn btn-sm btn-icon btn-danger"
                                                    title="Eliminar Gasto"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php
                                    $item++;
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th scope="row" colspan="4"></td>
                                    <td class="text-right"><?php echo number_format($suma, 2)?></td>
                                    <td class="text-center"></td>
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


<!-- modales-->
<div class="modal fade" id="modal-add-bank" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0">Agregar Gasto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="../controller/gastos.php" >
            <div class="modal-body">
                <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Fecha</label>
                            <input type="date" class="form-control" name="inputFecha" value="<?php echo date("Y-m-d")?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Banco</label>
                            <select class="form-control" name="selectBanco">
                                <?php
                                $a_bancos = $c_banco->verFilas();
                                foreach ($a_bancos as $fila) {
                                    ?>
                                    <option value="<?php echo $fila['id_banco'] ?>"><?php echo $fila['nombre'] . " - S/ " . $fila['monto']?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Descripcion</label>
                            <input type="text" class="form-control" name="inputDescripcion" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Monto</label>
                            <input type="text" class="form-control" name="inputMonto" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Clasificacion</label>
                            <select class="form-control" name="selectClasificacion">
                                <?php
                                $a_clasificacion = $c_clasificacion->verFilas();
                                foreach ($a_clasificacion as $fila) {
                                    ?>
                                    <option value="<?php echo $fila['id_clasificacion'] ?>"><?php echo $fila['nombre']?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>

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
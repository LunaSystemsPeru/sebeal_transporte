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
                            <li class="breadcrumb-item active">Mis Compras</li>
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
                        <h2 class="page-title col-md-12" style="text-align: center;">Lista de Compras</h2>
                            <a href="reg_compra.php">
                                <button style="margin-bottom: 10px;" type="button" class="btn btn-info waves-effect waves-light"><i class="dripicons-plus mr-1">
                                    </i><span>Agregar Compra</span></button>
                            </a>


                        <div class="table-responsive">
                            <table id="tabla-ingresos" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th width="8%">Id.</th>
                                    <th width="11%">Fecha</th>
                                    <th width="25%">Proveedor</th>
                                    <th width="15%">Documento</th>
                                    <th width="11%">Usuario</th>
                                    <th width="10%">Total</th>
                                    <th width="10%">Pagado</th>
                                    <th width="18%">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>201903001</td>
                                    <td class="text-center">2019-03-15</td>
                                    <td>10469932091 | OYANGUREN GIRON LUIS ENRIQUE</td>
                                    <td>FT | F001-25</td>
                                    <td class="text-center">loyangureng</td>
                                    <td class="text-right">570.00</td>
                                    <td class="text-right">570.00</td>
                                    <td class="text-center">
                                        <button class="btn btn-info btn-sm" title="Ver Documento"><i class="fa fa-eye-slash"></i></button>
                                        <button class="btn btn-danger btn-sm" title="Eliminar Documento"><i class="dripicons-trash"></i></button>
                                    </td>
                                </tr>
                                </tbody>
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
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header custom-modal-title" style="padding: 15px;">
                <h4 class="custom-modal-title">Registrar</h4>

            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <form id="reg-banco">
                        <div class="form-group">
                            <label class="control-label">Nombre</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nro. Cuenta</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Monto</label>
                            <input type="text" class="form-control">
                        </div>
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
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
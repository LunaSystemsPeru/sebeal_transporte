<?php
session_start();

require '../models/Destino.php';
$c_destino = new Destino();

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
            <h1 class="page-title col-md-1" style="text-align: center; margin-bottom: 25px;">DESTINOS:</h1>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="page-title col-md-12" style="text-align: center;">Destinos</h2>

                        <button data-toggle="modal" data-target="#modal-add-bank" style="margin-bottom: 10px;"
                                type="button" class="btn btn-info waves-effect waves-light"><i
                                class="dripicons-plus mr-1">
                            </i><span>Nuevo Destino</span></button>
                        <div class="table-responsive">
                            <table id="table-proveedores" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Id.</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Ubigeo</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $a_destino = $c_destino->verFilas();
                                foreach ($a_destino as $fila){
                                    ?>
                                    <tr>
                                        <td><?php echo $fila['id_destino']?></td>
                                        <td class="text-center"><?php echo $fila['nombre']?></td>
                                        <td><?php echo $fila['direccion']?></td>
                                        <td><?php echo $fila['ubigeo']?></td>
                                        <td class="text-center">
                                            <button data-toggle="modal" data-target="#modal-add-bank" style="margin-bottom: 10px;"
                                                    title="Editar Destino" type="button" class="btn btn-success btn-sm"><i
                                                    class="fa fa-edit">
                                                </i></button>
                                            <button data-toggle="modal" data-target="#modal-add-bank" style="margin-bottom: 10px;"
                                                    title="Editar Destino" type="button" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-trash">
                                                </i></button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
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
                    <form id="reg-destino" method="post" action="../controller/reg_destino.php">
                        <div class="form-group">
                            <label class="control-label">Nombre</label>
                            <input type="text" class="form-control" name="inputNombre" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Direccion</label>
                            <input type="text" class="form-control" name="inputDireccion" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ubigeo</label>
                            <input type="text" class="form-control" name="inputUbigeo" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>

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
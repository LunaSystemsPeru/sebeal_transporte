<?php
session_start();
require '../models/Cliente.php';

$c_cliente = new Cliente();
?>
<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:57:38 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>Mis Bancos - Sebeal Transporte - desarrollado por Luna Systems Peru</title>
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
                            <li class="breadcrumb-item active">Clientes</li>
                        </ol>
                    </div>
                    <h3 class="page-title"></h3>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <h1 class="page-title col-md-1" style="text-align: center; margin-bottom: 25px;">CLIENTES</h1>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="page-title col-md-12" style="text-align: center;">Mis Clientes (Remitentes - Destinatarios)</h2>
                        <div class="table-responsive">
                            <table id="table-clientes" class="table m-0">
                                <thead>
                                <tr>
                                    <th>Id.</th>
                                    <th>Documento</th>
                                    <th>Nombre / Razon Social</th>
                                    <th>Direccion de factura</th>
                                    <th>Telefono</th>
                                    <th>Tipo de Cliente</th>
                                    <th>Ult. Envio</th>
                                    <th>Costo Kilo</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $a_cliente = $c_cliente->verFilas();
                                foreach ($a_cliente as $fila){
                                ?>
                                <tr>
                                    <td><?php echo  $fila ['id_clientes']?></td>
                                    <td class="text-center"><?php echo $fila ['documento']?></td>
                                    <td><?php echo $fila['razon_social']?></td>
                                    <td><?php echo $fila['direccion_factura'] ?></td>
                                    <td><?php echo $fila['telefono']?></td>
                                    <td><?php echo $fila['tipo_cliente']?></td>
                                    <td><?php echo $fila['ultimo_envio'] ?></td>
                                    <td><?php echo $fila['costo_kilo'] ?></td>
                                    <td><?php echo $fila['costo_caja'] ?></td>
                                    <td class="text-center">
                                        <a href="reg_proveedor.php?id_proveedor=" class="btn btn-success btn-sm" title="Editar Proveedor"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-info btn-sm" title="Ver Documentos"><i class="fa fa-bolt"></i></button>
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
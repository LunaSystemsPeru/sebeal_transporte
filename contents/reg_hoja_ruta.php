<?php
session_start();

require '../models/Envio.php';
require '../tools/cl_varios.php';

$c_envio = new Envio();
$c_varios = new cl_varios();
?>
<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:57:38 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Crear Hoja de Ruta - Mi Agente - desarrollado por Luna Systems Peru</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../public/assets/images/favicon.ico">

        <!-- Bootstrap select pluings -->
        <link href="../public/assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

        <!-- c3 plugin css -->
        <link rel="stylesheet" type="text/css" href="../public/assets/libs/c3/c3.min.css">

        <!-- App css -->
        <link href="../public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/assets/css/app.min.css" rel="stylesheet" type="text/css" />


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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                                    <li class="breadcrumb-item active"><a href="ver_proveedor.php">Banco</a></li>
                                    <li class="breadcrumb-item active">Registrar</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Crear Hoja de Ruta</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="page-title col-md-12" style="text-align: center; margin-bottom: 25px;">Datos del Documento</h2>
                                <form class="" method="post" action="../controller/banco.php">
                                    <div class="form-group row">
                                        <label class="col-md-2"  for="inputProveedor">Proveedor</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input class="form-control" id="input_razon_social" placeholder="Buscar Empresa de Transporte" required>
                                                <input type="hidden" id="hidden_id_proveedor" name="hiddent_id_proveedor">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="btn btn-info btn-sm" href="reg_proveedor.php" target="_blank" id="btn_crear_proveedor"><i class="fa fa-plus"></i> Reg. Proveedor</a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-1"  for="inputVehiculo">Vehiculo</label>
                                        <div class="col-md-2">
                                            <input class="form-control" id="input_placa" name="input_placa" placeholder="Nro Placa">
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control" id="input_marca" name="input_marca" placeholder="Marca y Modelo" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control" id="input_mtc" name="input_mtc" placeholder="MTC" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" id="btn_crear_vehiculo" class="btn btn-info btn-sm" disabled=true><i class="fa fa-plus"></i>  Crear Vehiculo</button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-1 control-label">Chofer</label>
                                        <div class="col-md-2">
                                            <input class="form-control" id="input_brevete" name="input_brevete" placeholder="Nro Brevete">
                                        </div>
                                        <div class="col-md-5">
                                            <input class="form-control" id="input_datos" name="input_datos" placeholder="Apellidos y Nombres del Chofer" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <input class="form-control" id="input_vcto" name="input_vcto" placeholder="Vcto Brevete" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" id="btn_crear_vehiculo" class="btn btn-info btn-sm" disabled=true><i class="fa fa-plus"></i>  Agr. Chofer</button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-1 control-label">Destino</label>
                                        <div class="col-md-3">
                                            <select class="form-control" name="select_ciudad" id="select_ciudad">

                                            </select>
                                        </div>
                                        <label class="col-md-1 control-label">Fecha</label>
                                        <div class="col-md-2">
                                            <input id="input_fecha" name="input_fecha" class="form-control text-center" value="<?php echo date("d/m/Y") ?>" readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="" method="post" action="../controller/re_hoja_ruta.php">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-hover">
                                            <caption></caption>
                                            <thead>
                                            <tr>
                                                <th>Seleccionar</th>
                                                <th width="8%">Fecha</th>
                                                <th width="11%">Doc. Remision</th>
                                                <th >Remitente</th>
                                                <th >Destinatario</th>
                                                <th >Direccion</th>
                                                <th width="6%">Usuario</th>
                                                <th width="5%">Estado</th>
                                                <th width="10%">Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php


                                            foreach ($c_envio->verFilas() as $fila) {
                                                $doc_remision = $fila['abreviatura'] . " | " . $c_varios->zerofill($fila['serie'], 4) . " - " . $c_varios->zerofill($fila['numero'], 4);
                                                ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox[]" value="<?php echo $fila['id']?>">
                                                        </div>
                                                    </td>
                                                    <td><?php echo $fila['fecha_recepcion']?></td>
                                                    <td class="text-center"><?php echo $doc_remision?></td>
                                                    <td><?php echo $fila['remitente']?></td>
                                                    <td><?php echo $fila['destinatario']?></td>
                                                    <td><?php echo $fila['destino'] . " - " . $fila['direntrega']?></td>
                                                    <td><?php echo $fila['usuario']?></td>
                                                    <td><span class="badge badge-success">Activo</span></td>
                                                    <td class="text-center">
                                                        <a href="ver_detalle_pago_frecuente.php"><button type="button"class="btn btn-success"><i class="fa fa-eye"></i></button></a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button class="btn btn-info"><i class="fa font-family-secondary"></i><spam>Generear Hoja de Ruta</spam></button>
                                </form>
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
        <?php require '../fixed/footer.php'?>
        <!-- end Footer -->

        <!-- Right Sidebar -->
        <?php require '../fixed/right-sidebar.php'?>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>


        <!-- Vendor js -->
        <script src="../public/assets/js/vendor.min.js"></script>

        <!-- Bootstrap select plugin -->
        <script src="../public/assets/libs/bootstrap-select/bootstrap-select.min.js"></script>

        <!-- plugins -->
        <script src="../public/assets/libs/c3/c3.min.js"></script>
        <script src="../public/assets/libs/d3/d3.min.js"></script>

        <!-- dashboard init -->
        <script src="../public/assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="../public/assets/js/app.min.js"></script>

    </body>

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:59:12 GMT -->
</html>
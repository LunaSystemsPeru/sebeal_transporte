<?php
session_start();

require '../models/Contrato.php';
require '../models/Clasificacion.php';

$c_contrato = new Contrato();
$clasificacion=new Clasificacion();
$listaClasi=$clasificacion->verFilas();
?>
<!DOCTYPE html>
<html lang="es">
    
<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:57:38 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Agregar Prestamo - Mi Agente - desarrollado por Luna Systems Peru</title>
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
                                    <li class="breadcrumb-item active"><a href="ver_contratos.php">Contrato</a></li>
                                    <li class="breadcrumb-item active">Registrar</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Registro de Contrato</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">

                                        <form class="form-horizontal" method="post" action="../controller/reg_contrato.php">

                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Proveedor</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                        </div>
                                                        <input autocomplete="off" type="text" id="input-b-proveedor" name="Proveedor" class="form-control" placeholder="Proveedor">
                                                        <input type="hidden" value="" id="id_proveedor" name="id_proveedor">
                                                        <span class="input-group-append">
                                                            <a href="reg_proveedor.php">
                                                        <button type="button" class="btn waves-effect waves-light btn-primary"><i class="fa fa-plus"></i></button>
                                                    </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="Servicio">Servicio</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="Servicio" name="servicio" class="form-control" placeholder="Servicio">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Fecha Inicio</label>
                                                <div class="col-md-4">
                                                    <input required name="fecha-inicio" type="date" class="form-control" placeholder="">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Fecha Fin</label>
                                                <div class="col-md-4">
                                                    <input name="fecha-final" type="date" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Duracion</label>
                                                <div class="col-md-4">
                                                    <input name="duracion" type="number" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Monto</label>
                                                <div class="col-md-4">
                                                    <input name="monto" type="number" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="Servicio">Clasificacion</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="select_clasificacion">
                                                        <?php
                                                        foreach ($listaClasi as $item) {
                                                            echo "<option value='{$item['id_clasificacion']}'>{$item['nombre']}</option>";
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <button  type="submit" class="btn btn-purple waves-effect waves-light mt-3">Guardar</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
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


        <!-- plugins
        <script src="../public/assets/libs/c3/c3.min.js"></script>
        <script src="../public/assets/libs/d3/d3.min.js"></script>-->

        <!-- dashboard init
        <script src="../public/assets/js/pages/dashboard.init.js"></script> -->

        <!-- App js -->
        <script src="../public/assets/js/app.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        </script>
    <script>
        $( document ).ready(function() {
            $( "#input-b-proveedor" ).autocomplete({
                source: "../controller/ajax/buscar_proveedor.php",
                minLength: 2,
                select: function (event, ui) {
                    event.preventDefault();
                    console.log(ui);
                    $("#id_proveedor").val(ui.item.id);
                }
            });
        });
    </script>
        
    </body>

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:59:12 GMT -->
</html>
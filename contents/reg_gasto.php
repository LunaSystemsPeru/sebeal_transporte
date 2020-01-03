<?php
session_start();

require '../models/Banco.php';

$c_banco = new Banco();
$c_banco->setIdEmpresa($_SESSION['id_empresa']);
?>
<!DOCTYPE html>
<html lang="en">
    
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
                            <h4 class="page-title">Registro de gastos</h4>
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

                                        <form class="form-horizontal">

                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Caja/Banco</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="mdi mdi-silo"></i></span>
                                                        </div>
                                                        <select class="form-control">
                                                            <option>Caja 2</option>
                                                            <option>Caja 3</option>
                                                            <option>BCP</option>
                                                            <option>Interback</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="Servicio">Descripcion</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="Servicio" name="Servicio" class="form-control" placeholder="Descripcion">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Fecha Recordatorio</label>
                                                <div class="col-md-4">
                                                    <input type="date" class="form-control" placeholder="">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Monto</label>
                                                <div class="col-md-4">
                                                    <input type="number" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="Servicio">Clasificacion</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="select_clasificacion">
                                                        <option value="4">ALIMENTACION</option>
                                                        <option value="12">COMISION VENTA</option>
                                                        <option value="11">CUOTA PRESTAMO</option>
                                                        <option value="8">DIEZMO</option>
                                                        <option value="14">EQUIPOS Y MOVILIARIOS</option>
                                                        <option value="9">GERENCIA</option>
                                                        <option value="10">HOSTING Y DOMINIO</option>
                                                        <option value="2">INGRESO PRESTAMO</option>
                                                        <option value="13">MANTENIMIENTO</option>
                                                        <option value="6">PAGO PERSONAL</option>
                                                        <option value="7">PUBLICIDAD</option>
                                                        <option value="5">SERVICIOS BASICOS</option>
                                                        <option value="15">SUBCONTRATO</option>
                                                        <option value="3">TRANSPORTE</option>
                                                        <option value="1">VENTA</option>
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
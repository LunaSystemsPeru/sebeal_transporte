<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:57:38 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>Registrar Envio - Sebeal Transport - desarrollado por Luna Systems Peru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="../public/assets/images/favicon.ico">

    <!-- Bootstrap select pluings -->
    <link href="../public/assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>

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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                            <li class="breadcrumb-item active"><a href="ver_envios.php">Encomiendas</a></li>
                            <li class="breadcrumb-item active">Registrar</li>
                        </ol>
                    </div>
                    <h4 class="page-title">DETALLE DEL CONTRATO</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="panel-title">DATOS DEL CONTRATO</h4>
                        <div class="col-md-4 offset-0">
                            <button type="button" class="btn btn-success" id="btn_add_producto" onclick="addProductos()"><i class="fa fa-place-of-worship"></i> Ver Contratos</button>
                        </div>

                        <form>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="inputFecha"></label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" id="inputFecha" name="inputFecha" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="inputDocumento"></label>
                                <div class="col-md-8">
                                    <select class="form-control" name="select_documento" id="select_documento">
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="inputSerie"></label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="txt" id="inputNumero" name="inputNumero" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="txt" id="inputSerie" name="inputSerie" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="inputDocumento"></label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <select class="form-control" name="select_documento" id="select_documento">
                                            <option></option>
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="hpanel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">DATOS DE CONTRATO</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="input_remitente"></label>
                                        <div class="col-md-1">
                                            <a class="btn btn-success" type="button" href="reg_cliente.php" target="_blank"><i class="fa fa-plus"></i> </a>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="" class="form-control" id="input_remitente" name="input_remitente">
                                            <input type="hidden" id="hidden_id_remitente" name="hidden_id_remitente" value="0">
                                            <input type="hidden" id="hidden_ruc_remitente" name="hidden_ruc_remitente" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="input_remitente"></label>
                                        <div class="col-md-1">
                                        <a class="btn btn-success" type="button" href="reg_cliente.php" target="_blank"><i class="fa fa-plus"></i> </a>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="" class="form-control" id="input_destinatario" name="input_destinatario">
                                            <input type="hidden" id="hidden_id_destinatario" name="hidden_id_destinatario" value="0">
                                            <input type="hidden" id="hidden_ruc_destinatario" name="hidden_ruc_destinatario" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="input_remitente"></label>
                                        <div class="col-md-10">
                                            <input type="text" placeholder="" class="form-control" id="input_destino" name="input_destino">
                                            <input type="hidden" id="hidden_id_destino" name="hidden_id_destino" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="inputPeso"></label>
                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <input type="txt" id="inputPeso" name="inputPeso" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="inputTotal"></label>
                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <input type="txt" id="inputTotal" name="inputTotal" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<?php require '../fixed/footer.php' ?>
<!-- end Footer -->

<!-- Right Sidebar -->
<?php require '../fixed/right-sidebar.php' ?>
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
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
                    <h4 class="page-title">DETALLE DE PAGO FRECUENTE</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detalle de Pago Frecuente</h4>
                        <div class="">
                            <a href="ver_detalle_pago_frecuente.php"
                               class="btn btn-info"><i class="fa fa-arrow-left"></i>ver Contratos
                            </a>
                            <button data-toggle="modal" data-target="#modal_pago_frecuente"
                                    class="btn btn-info"><i class="fa fa-edit"></i>Modificar Pago
                            </button>
                            <button onclick=""
                                    class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar
                            </button>
                        </div>
                        <div class="card-body">
                            <label for="" class="font-weight-bold">Codigo Contrato:</label>
                            <label for=""></label>

                                <div class="form-group">
                                    <label for="" class="font-weight-bold">Proveedor:</label>
                                    <label for=""></label>
                                </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Duracion:</label>
                                <label for=""> dias</label>
                            </div>
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Servicio:</label>
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Fecha Inicio:</label>
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Fecha de termino:</label>
                                <label for=""></label>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Total a Pagar:</label>
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Total Pagado:</label>
                                <label for=""></label>
                            </div>
                            <div class="form-group">
                            <label for="" class="font-weight-bold">Faltante:</label>
                            <label for=""></label>
                            </div>
                            <div class="form-group">
                                <label for="" class="font-weight-bold">Estado:</label>
                                <label class='badge badge-success badge-lg' >Activo</label>
                                <label class='badge badge-danger badge-lg' >Finalizado</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ver detalle de Pago Frecuente</h4>
                        <div class="card-body">
                            <span data-toggle="modal" data-target="#modal_pago_fre" class="btn btn-success"><i class="fa fa-plus"></i>Agregar</span>

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Banco</th>
                                    <th>Monto</th>
                                    <th>Deuda</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td class="text-center">2020-01-20</td>
                                        <td>efectivo</td>
                                        <td class="text-right">500</td>
                                        <td class="text-right">100</td>
                                        <td class="text-center">
                                            <button class="btn btn-icons btn-danger" title="Eliminar Pago"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-bold">Ver Todos los Pagos</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Banco</th>
                                <th>Monto</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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

<div class="modal fade" id="modal_pago_fre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formulario_modal_pago" action="../controller/" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Agregar Pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_pago" value="">
                    <div class="form-group">
                        <label for="banco" class="col-form-label">Banco:</label>
                        <select name="id_banco" class="form-control" id="banco">
                            <option value="1">sss</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="monto" class="col-form-label">Monto total:</label>
                        <input type="text" name="monto_total" value="" class="form-control" id="monto_total" readonly>
                    </div>
                    <div class="form-group">
                        <label for="monto" class="col-form-label">Monto Pagado:</label>
                        <input type="text" name="monto_pagado" value="" class="form-control" id="monto_pagado" readonly>
                    </div>
                    <div class="form-group">
                        <label for="monto" class="col-form-label">Monto:</label>
                        <input required type="number" name="monto" class="form-control" id="monto">
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="col-form-label">Fecha:</label>
                        <input type="date" value="" name="fecha" class="form-control"
                               id="fecha">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_contrato" value="">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
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
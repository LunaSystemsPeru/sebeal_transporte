<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:57:38 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Registrar Envio - Mi Agente - desarrollado por Luna Systems Peru</title>
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
                            <h4 class="page-title">Registro de Envio</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="page-title col-md-12" style="text-align: center; margin-bottom: 25px;">Datos de Envio</h2>
                                <form class="" method="post" action="../controller/banco.php">
                                    <div class="form-group row">
                                        <label class="col-md-4"  for="inputFecha">Fecha</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="date" id="inputFecha" name="inputFecha" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4"  for="inputDocumento">Documento</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <select class="form-control" name="select_documento" id="select_documento">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2"  for="inputSerie">Serie</label>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="txt" id="inputSerie" name="inputSerie" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <label class="col-md-3"  for="inputNumero">Numero</label>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="txt" id="inputNumero" name="inputNumero" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4"  for="inputDocumento">Destino</label>
                                        <div class="col-md-7">
                                            <div class="input-group">
                                                <select class="form-control" name="select_documento" id="select_documento">

                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <input type="hidden" value="0" name="inputCodigo">
                                    <button  type="submit" class="btn btn-purple waves-effect waves-light mt-3">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                        <form role="form" class="form-horizontal" name="frm_envio" id="frm_envio" method="post" action="procesos/reg_envio.php">

                            <div class="hpanel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">DATOS DE ENVIO</h4>
                                </div>
                                <div class="panel-body">


                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Remitente</label>
                                        <div class="col-lg-4">
                                            <a class="btn btn-success" type="button" href="reg_cliente.php" target="_blank"><i class="fa fa-plus"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <input type="text" placeholder="buscar Remitente" class="form-control" id="input_remitente" name="input_remitente">
                                            <input type="hidden" id="hidden_id_remitente" name="hidden_id_remitente" value="0">
                                            <input type="hidden" id="hidden_ruc_remitente" name="hidden_ruc_remitente" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Destinatario</label>
                                        <div class="col-lg-2">
                                            <a class="btn btn-success" type="button" href="reg_cliente.php" target="_blank"><i class="fa fa-plus"></i> </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <input type="text" placeholder="buscar Destinatario" class="form-control" id="input_destinatario" name="input_destinatario">
                                            <input type="hidden" id="hidden_id_destinatario" name="hidden_id_destinatario" value="0">
                                            <input type="hidden" id="hidden_ruc_destinatario" name="hidden_ruc_destinatario" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Direccion de Entrega</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <input type="text" placeholder="Direccion entrega" class="form-control" id="input_destino" name="input_destino">
                                            <input type="hidden" id="hidden_id_destino" name="hidden_id_destino" value="0">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-md-2"  for="inputPeso">Peso</label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="txt" id="inputPeso" name="inputPeso" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <label class="col-md-2"  for="inputTotal">Total</label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="txt" id="inputTotal" name="inputTotal" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            </div>

                        </form>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Agregar item</h4>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" name="frm_buscar">
                                        <div class="form-group row">
                                            <label class="col-md-1"  for="inputCantidad">Cantidad</label>
                                            <div class="col-md-2">
                                                <div class="input-group">
                                                    <input type="txt" id="inputCantidad" name="inputCantidad" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <label class="col-md-2"  for="inputDescripcion">Descripcion</label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="txt" id="inputDescripcion" name="inputDescripcion" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 control-label" >Und. Med</label>
                                            <div class="col-md-3">
                                                <select class="form-control" name="select_und_medida" id="select_und_medida">

                                                </select>
                                            </div>
                                            <label class="col-md-2"  for="inputPeso">Kgs.</label>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <input type="txt" id="inputPeso" name="inputTotal" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 control-label">P. Unit.</label>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control text-center" id="input_unitario" name="input_unitario">
                                            </div>
                                            <label class="col-md-2 control-label">Sub Total</label>
                                            <div class="col-md-2">
                                                <div class="input-group">
                                                    <input type="text" class="form-control text-right" id="input_subtotal" name="input_subtotal" required readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-md-offset-1">
                                                <button type="button" class="btn btn-success btn-sm" id="btn_add_producto" onclick="addProductos()"><i class="fa fa-plus"></i> Agregar Item</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                                    <!-- end panel -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Ver Productos Agregados</h4>
                                </div>
                                <div class="panel-body">
                                    <table id="tabla-detalle" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th width="4%">Item</th>
                                            <th width="40%">Descripcion</th>
                                            <th width="11%">Cantidad</th>
                                            <th width="10%">Peso Total</th>
                                            <th width="10%">P. Unit.</th>
                                            <th width="10%">Parcial</th>
                                            <th width="11%">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
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
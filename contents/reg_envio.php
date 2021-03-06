<?php
session_start();
$_SESSION['enviodetalle'] = array();

require '../models/Destino.php';
require '../models/UnidadMedida.php';

$c_destino = new Destino();
$c_unidad = new UnidadMedida();
$c_destino->setId($_SESSION['id_origen']);
?>
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


    <!-- Sweet Alert-->
    <link href="../public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="../public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../public/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="../public/assets/css/app.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

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
                    <h4 class="page-title">Recepcion de Encomienda</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="panel-title">DATOS DEL DOCUMENTO</h4>
                        <form>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="inputFecha">Fecha</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="date" id="inputFecha" name="inputFecha" class="form-control" value="<?php echo date("Y-m-d")?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="inputDocumento">Documento</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="select_documento" id="select_documento" onchange="obtenerMisDocumentosSunat()">
                                        <option value="4">Nota de Recepcion</option>
                                        <option value="5">Guia de Remision</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="inputSerie">Serie - Numero</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="txt" id="inputSerie" name="inputSerie" class="form-control text-center" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="txt" id="inputNumero" name="inputNumero" class="form-control text-center" placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="selectDestino">Destino</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <select class="form-control" name="selectDestino" id="selectDestino">
                                            <?php
                                            foreach ($c_destino->verOtrosDestino() as $fila) {
                                                ?>
                                                <option value="<?php echo $fila['id_destino']?>"><?php echo $fila['nombre']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <input type="hidden" value="0" name="inputCodigo">
                            <button type="button" onclick="guardarEnvio()" class="btn btn-purple waves-effect waves-light mt-3">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="hpanel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">DATOS DE ENVIO</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="input_remitente">Remitente</label>
                                        <div class="col-md-1">
                                            <a class="btn btn-success" type="button" href="reg_cliente.php" target="_blank"><i class="fa fa-plus"></i> </a>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="buscar Remitente" class="form-control" id="input_remitente" name="input_remitente">
                                            <input type="hidden" id="hidden_id_remitente" name="hidden_id_remitente" value="0">
                                            <input type="hidden" id="hidden_ruc_remitente" name="hidden_ruc_remitente" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="input_remitente">Destinatario</label>
                                        <div class="col-md-1">
                                        <a class="btn btn-success" type="button" href="reg_cliente.php" target="_blank"><i class="fa fa-plus"></i> </a>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="buscar Destinatario" class="form-control" id="input_destinatario" name="input_destinatario">
                                            <input type="hidden" id="hidden_id_destinatario" name="hidden_id_destinatario" value="0">
                                            <input type="hidden" id="hidden_ruc_destinatario" name="hidden_ruc_destinatario" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="input_remitente">Direccion</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="select_direccion" id="select_direccion">
                                                <option>Seleccionar cliente</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-info"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="inputReferencia">Referemcia</label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="text" id="inputReferencia" name="inputReferencia" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="inputPeso">Peso</label>
                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <input type="text" id="inputPeso" name="inputPeso" class="form-control text-right" placeholder="" value="0">
                                            </div>
                                        </div>

                                        <label class="col-md-2 col-form-label" for="inputTotal">Total</label>
                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <input type="text" id="inputTotal" name="inputTotal" class="form-control" placeholder="" value="0">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="panel-heading">
                            <h4 class="panel-title">AGREGAR ITEM</h4>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" name="frm_buscar">
                                <div class="form-group row">
                                    <label class="col-md-1 col-form-label" for="inputCantidad">Descripcion </label>
                                    <div class="col-md-11">
                                        <!--<textarea class="form-control"></textarea>-->
                                        <input type="text" class="form-control" name="inputDescripcion" id="inputDescripcion">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-1 col-form-label" for="inputCantidad">Cantidad</label>
                                    <div class="col-md-2">
                                            <input type="text" id="inputCantidad" name="inputCantidad" class="form-control" placeholder="">
                                    </div>
                                    <label class="col-md-1 col-form-label">Und. Med</label>
                                    <div class="col-md-2">
                                        <select class="form-control" name="select_und_medida" id="select_und_medida">
                                            <?php
                                            foreach ($c_unidad->verFilas() as $fila) {
                                                echo "<option value='".$fila['id_und']."'>".$fila['descripcion']."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <label class="col-md-1 col-form-label" for="inputPeso">Kgs. Total</label>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control text-center" id="inputPesoItem" name="inputPesoItem" value="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-1 col-form-label">P. Unit.</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control text-center" id="input_unitario" name="input_unitario" value="0" onkeyup="calcular_subtotal()">
                                    </div>
                                    <label class="col-md-1 col-form-label">Sub Total</label>
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control text-right" id="input_subtotal" name="input_subtotal" value="0" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 offset-4">
                                        <button type="button" class="btn btn-success" id="btn_add_producto" onclick="agregarDetalle()"><i class="fa fa-plus"></i> Agregar Item</button>
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
                            <h4 class="panel-title">ITEMS AGREGADOS</h4>
                        </div>
                        <div class="panel-body table-responsive">
                            <table id="tabla-detalle" class="table m-0">
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

<!-- App js -->
<script src="../public/assets/js/app.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src="../public/assets/js/funciones_venta.js"></script>


<!-- Sweet Alerts js -->
<script src="../public/assets/libs/sweetalert2/sweetalert2.min.js"></script>

</body>

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:59:12 GMT -->
</html>
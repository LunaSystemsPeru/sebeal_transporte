<?php
require '../models/Cliente.php';
require '../models/Banco.php';
require '../models/Envio.php';
require '../models/EnvioCobro.php';
require '../models/DocumentoSunat.php';
require '../models/ClienteDireccion.php';
require '../models/Destino.php';
require '../models/HojaRutaEnvio.php';
require '../tools/cl_varios.php';

$banco = new Banco();
$cliente = new Cliente();
$destinatario = new Cliente();
$remitente = new Cliente();
$envio = new Envio();
$cobro = new EnvioCobro();
$sunat = new DocumentoSunat();
$direccion = new ClienteDireccion();
$origen = new Destino();
$destino = new Destino();
$hojarutaenvio = new HojaRutaEnvio();
$tools = new cl_varios();

$idenvio = filter_input(INPUT_GET, 'envio');
$envio->setIdEnvio($idenvio);
$envio->obtenerDatos();

$sunat->setIdDocumento($envio->getIdDocumento());
$sunat->obtenerDatos();

$destinatario->setIdCliente($envio->getIdDestinatario());
$destinatario->obtenerDatos();

$direccion->setIdDireccion($envio->getIdDireccion());
$direccion->setIdCliente($envio->getIdDestinatario());
$direccion->obtenerDatos();

$remitente->setIdCliente($envio->getIdRemitente());
$remitente->obtenerDatos();

$cliente->setIdCliente($envio->getIdCliente());
$cliente->obtenerDatos();

$origen->setId($envio->getIdAorigen());
$origen->obtenerDatos();

$destino->setId($envio->getIdAdestino());
$destino->obtenerDatos();

$hojarutaenvio->setIdenvio($idenvio);
$hojarutaenvio->validarIdEnvio();

$listaBancos = $banco->verFilas();

$cobro->setIdEnvio($envio->getIdEnvio());
$listaPagos = $cobro->verFilas();
?>
<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:57:38 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>Ver Detalle de Cobros de Envio - Sebeal Transport - desarrollado por Luna Systems Peru</title>
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
    <link href="../public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css"/>

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
                            <li class="breadcrumb-item active"><a href="ver_envios.php">Envios</a></li>
                            <li class="breadcrumb-item active">Cobros</li>
                        </ol>
                    </div>
                    <h4 class="page-title">DETALLE DE COBROS DE ENVIO</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Envio / Recepcion de Encomienda</h4>
                        <div class="">
                            <a href="ver_cobranzas.php"
                               class="btn btn-success"><i class="fa fa-arrow-left"></i> Ver Cobranzas
                            </a>
                            <button data-toggle="modal" data-target="#modal_contrato"
                                    class="btn btn-info"><i class="fa fa-edit"></i> Modificar Pago
                            </button>
                            <a href="../reports/rpt_hoja_ruta.php?id=<?php echo $hojarutaenvio->getIdHojaRuta()?>" target="_blank"
                                    class="btn btn-warning"><i class="fa fa-file-pdf"></i> Ver Hoja de Ruta
                            </a>
                        </div>
                        <div class="card-body">
                            <div>
                                <label for="" class="font-weight-bold">Nro Envio:</label>
                                <label for=""><?php echo $envio->getIdEnvio() ?></label>
                            </div>
                            <div>
                                <label for="" class="font-weight-bold">Nro Doc Envio:</label>
                                <label for=""><?php echo $sunat->getAbreviatura() . " | " . $envio->getSerie() . " - " . $envio->getNumero()  ?></label>
                            </div>
                            <br>
                            <div>
                                <label for="" class="font-weight-bold">Remitente:</label>
                                <label for=""><?php
                                    echo $remitente->getRazonSocial();
                                    ?></label>
                            </div>
                            <div>
                                <label for="" class="font-weight-bold">Referencia:</label>
                                <label for=""><?php
                                    echo "GR # " . $envio->getReferencia();
                                    ?></label>
                            </div>
                            <div>
                                <label for="" class="font-weight-bold">Destinatario:</label>
                                <label for=""><?php
                                    echo $destinatario->getRazonSocial();
                                    ?></label>
                            </div>
                            <div>
                                <label for="" class="font-weight-bold">Direccion Entrega:</label>
                                <label for=""><?php
                                    echo $direccion->getDireccion();
                                    ?></label>
                            </div>

                            <br>
                            <div>
                                <label for="" class="font-weight-bold">Fecha Recepcion:</label>
                                <label for=""><?php echo $tools->fecha_mysql_web($envio->getFechaRecepcion()) ?></label>
                            </div>
                            <div>
                                <label for="" class="font-weight-bold">Fecha Envio:</label>
                                <label for=""><?php echo $tools->fecha_mysql_web($envio->getFechaEnvio()) ?></label>
                            </div>
                            <div>
                                <label for="" class="font-weight-bold">RUTA:</label>
                                <label for=""><?php echo $origen->getNombre() ." A " . $destino->getNombre() ?></label>
                            </div>
                            <br>
                            <div>
                                <label for="" class="font-weight-bold">Total Pactado:</label>
                                <label for=""><?php echo number_format($envio->getTotalPactado(),2) ?></label>
                            </div>
                            <div>
                                <label for="" class="font-weight-bold">Total Pagado:</label>
                                <label for=""><?php echo number_format($envio->getTotalPagado(),2) ?></label>
                            </div>
                            <div>
                                <label for="" class="font-weight-bold">Total a Pagar:</label>
                                <label for=""><?php echo number_format($envio->getTotalPactado() - $envio->getTotalPagado(),2) ?></label>
                            </div>
                            <div>
                                <label for="" class="font-weight-bold">Total Factura SUNAT:</label>
                                <label for=""><?php echo number_format($envio->getTotalFacturado(),2) ?></label>
                            </div>
                            <br>
                            <div>
                                <label for="" class="font-weight-bold">Estado:</label>
                                <?php
                                if ($envio->getTotalPagado() == $envio->getTotalPactado()) {
                                    echo "<label class='badge badge-success badge-lg' >Pagado</label>";
                                } else {
                                    echo "<label class='badge badge-danger badge-lg' >Pendiente de Cobro</label>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4  class="card-title">Ver detalle de Pago </h4>
                        <button data-toggle="modal" data-target="#modal_pago_fre" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</button>

                        <div class="card-body">
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

                                <?php
                                $saldo = $envio->getTotalPagado();
                                foreach ($listaPagos as $fila) {
                                    $saldo -= $fila['sale'];
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $tools->fecha_mysql_web($fila['fecha']) ?></td>
                                        <td><?php echo $fila['nombre'] ?></td>
                                        <td class="text-right"><?php echo number_format($fila['sale'], 2) ?></td>
                                        <td class="text-right"><?php echo number_format($saldo, 2) ?></td>
                                        <td class="text-center">
                                            <button onclick="eliminarPago(<?php echo $contrato->getId() . "," . $fila["id_movimiento"] ?>)" class="btn btn-icons btn-danger" title="Eliminar Pago"><i class="fa fa-trash"></i></button>
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

<div class="modal fade" id="modal_pago_fre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formulario_modal_pago" action="../controller/reg_envio_cobro.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-4">Agregar Pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="id_contrato" type="hidden" name="id_contrato" value="<?php echo $envio->getIdEnvio() ?>">
                    <div class="form-group">
                        <label for="banco" class="col-form-label">Banco:</label>
                        <select name="id_banco" class="form-control" id="banco">
                            <?php
                            foreach ($listaBancos as $item) {
                                echo "<option value=\"{$item['id_banco']}\">{$item['nombre']} - S/.{$item['monto']}</option>";
                            }
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="monto" class="col-form-label">Monto total:</label>
                        <input type="text" name="monto_total" value="<?php echo $envio->getTotalPactado() ?>" class="form-control" id="monto_total" readonly>
                    </div>
                    <div class="form-group">
                        <label for="monto" class="col-form-label">Monto Pagado:</label>
                        <input type="text" name="monto_pagado" value="<?php echo $envio->getTotalPagado() ?>" class="form-control" id="monto_pagado" readonly>
                    </div>
                    <div class="form-group">
                        <label for="monto" class="col-form-label">Monto:</label>
                        <input required type="number" name="monto" class="form-control" id="monto">
                    </div>
                    <div class="form-group">
                        <label for="fecha" class="col-form-label">Fecha:</label>
                        <input type="date" value="<?php echo date("Y-m-d"); ?>" name="fecha" class="form-control"
                               id="fecha">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_contrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-4">Cobranza</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario_modal_mod_pago" method="post">

                    <input type="hidden" name="idContrato" value="<?php echo $idenvio ?>">
                    <div class="form-group">
                        <label for="monto" class="col-form-label">Monto:</label>
                        <input value="<?php echo $envio->getTotalPactado() ?>" required type="number" name="monto" class="form-control" id="montoUDt">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="">Registrar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
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

<!-- Bootstrap select plugin -->
<script src="../public/assets/libs/bootstrap-select/bootstrap-select.min.js"></script>

<!-- plugins
<script src="../public/assets/libs/c3/c3.min.js"></script>
<script src="../public/assets/libs/d3/d3.min.js"></script>-->

<!-- dashboard init
<script src="../public/assets/js/pages/dashboard.init.js"></script> -->

<!-- App js -->
<script src="../public/assets/js/app.min.js"></script>
<script src="../public/assets/libs/sweetalert2/sweetalert2.min.js"></script>
<script>
    function isnumero(numero) {
        return !isNaN(parseInt(numero));
    }

    function actualizarFrecuencia() {
        if (isnumero($("#montoUDt").val())) {
            $.ajax({
                type: "POST",
                url: "../controller/upd_contrato.php",
                data: $("#formulario_modal_mod_pago").serialize(),
                success: function (data) {
                    console.log(data);
                    if (IsJsonString(data)) {
                        location.reload();

                    } else {
                        Swal.fire(
                            'Error al actualizar el pago frecuente'
                        );
                    }
                }
            });
        } else {
            Swal.fire(
                'Monto no valido'
            );
        }


    }


    function eliminarPago(idC, idM) {

        Swal.fire({
            title: '¿Desea eliminar el pago?',
            text: "escoja una opcion",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "../controller/del_pago_contrato.php",
                    data: {id_movimiento: idM, id_contrato: idC},
                    success: function (data) {
                        console.log(data);
                        if (IsJsonString(data)) {
                            location.reload();
                        }
                    }
                });
            }
        })
    }

    function IsJsonString(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }
</script>
</body>

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:59:12 GMT -->
</html>
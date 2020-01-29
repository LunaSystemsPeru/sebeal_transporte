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
    <meta charset="utf-8"/>
    <title>Mis Cobranzas - Sebeal Transporte - desarrollado por Luna Systems Peru</title>
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
                            <li class="breadcrumb-item active">Mis Cobros</li>
                        </ol>
                    </div>
                    <h3 class="page-title"></h3>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="page-title col-md-12" style="text-align: center;">COBRANZAS</h2>
                        <button data-toggle="modal" data-target="#modalbuscar" style="margin-bottom: 10px;" type="button" class="btn btn-warning waves-effect waves-light"><i class="dripicons-search mr-1">
                            </i><span>Busca Documento</span></button>
                        <a href="ver_clientes_cobranza.php" style="margin-bottom: 10px;" type="button" class="btn btn-success waves-effect waves-light"><i class="dripicons-search mr-1">
                            </i><span>Ver Clientes por Cobrar</span></a>
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover">
                                <caption></caption>
                                <thead>
                                <tr>
                                    <th width="8%">Fecha</th>
                                    <th width="11%">Doc. Remision</th>
                                    <th>Cliente</th>
                                    <th width="11%">Doc Remite</th>
                                    <th>M. Facturado</th>
                                    <th>M. Pactado</th>
                                    <th>M. Deuda</th>
                                    <th width="6%">Usuario</th>
                                    <th width="5%">Estado</th>
                                    <th width="10%">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $suma_pactado = 0;
                                $suma_deuda = 0;
                                foreach ($c_envio->verFilasCobranzas() as $fila) {
                                    $suma_pactado +=$fila['total_pactado'];
                                    $suma_deuda += ($fila['total_pactado'] - $fila['total_pagado']);
                                    $doc_remision = $fila['abreviatura'] . " | " . $c_varios->zerofill($fila['serie'], 4) . " - " . $c_varios->zerofill($fila['numero'], 4);
                                    $label_estado = '<span class="badge badge-warning">por Cobrar</span>';
                                    if ( $fila['total_pagado'] ==  $fila['total_pactado']) {
                                        $label_estado = '<span class="badge badge-success">Pagado</span>';
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $fila['fecha_recepcion'] ?></td>
                                        <td class="text-center">
                                            <a href="../reports/rpt_ticket_recepcion.php?id_envio=<?php echo $fila['id'] ?>" target="_blank">
                                                <?php echo $doc_remision ?>
                                            </a>
                                        </td>
                                        <td><?php echo $fila['destinatario'] ?></td>
                                        <td><?php echo "GR | " . $fila['referencia'] ?></td>
                                        <td class="text-right"><?php echo number_format($fila['total_facturado'], 2) ?></td>
                                        <td class="text-right"><?php echo number_format($fila['total_pactado'], 2) ?></td>
                                        <td class="text-right"><?php echo number_format($fila['total_pactado'] - $fila['total_pagado'], 2) ?></td>
                                        <td><?php echo $fila['usuario'] ?></td>
                                        <td class="text-center"><?php echo $label_estado?></td>
                                        <td class="text-center">
                                            <a href="ver_detalle_cobranza.php?envio=<?php echo $fila['id'] ?>" class="btn btn-info" onclick="">
                                                <i class="fa fa-dollar-sign"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5" class="text-right"> Suma total</td>
                                    <td class="text-right"><?php echo number_format($suma_pactado, 2) ?></td>
                                    <td class="text-right"> <?php echo number_format($suma_deuda, 2) ?></td>
                                </tr>
                                </tfoot>

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
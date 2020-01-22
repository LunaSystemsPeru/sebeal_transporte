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
    <title>Mis Envios - Sebeal Transporte - desarrollado por Luna Systems Peru</title>
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
                            <li class="breadcrumb-item active">Mis Bancos</li>
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
                        <h2 class="page-title col-md-12" style="text-align: center;">Recepcion de Mercaderia en Agencia: <?php echo $_SESSION['nombre_origen']?></h2>
                        <a href="reg_envio.php" style="margin-bottom: 10px;" type="button" class="btn btn-success waves-effect waves-light"><i class="dripicons-box mr-1">
                            </i><span>Recibir Encomienda</span></a>
                        <a href="reg_hoja_ruta.php" style="margin-bottom: 10px;" type="button" class="btn btn-info waves-effect waves-light"><i class="dripicons-cart mr-1">
                            </i><span>Asignar a Vehiculo</span></a>
                        <button data-toggle="modal" data-target="#modalbuscar" style="margin-bottom: 10px;" type="button" class="btn btn-warning waves-effect waves-light"><i class="dripicons-search mr-1">
                            </i><span>Asignar a Vehiculo</span></button>
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover">
                                <caption></caption>
                                <thead>
                                <tr>
                                    <th width="8%">Fecha</th>
                                    <th width="11%">Doc. Remision</th>
                                    <th>Remitente</th>
                                    <th width="11%">Doc Remite</th>
                                    <th>Destinatario</th>
                                    <th>Destino</th>
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
                                        <td><?php echo $fila['fecha_recepcion'] ?></td>
                                        <td class="text-center"><?php echo $doc_remision ?></td>
                                        <td><?php echo $fila['remitente'] ?></td>
                                        <td><?php echo "GR | " . $fila['referencia'] ?></td>
                                        <td><?php echo $fila['destinatario'] ?></td>
                                        <td><?php echo $fila['destino'] ?></td>
                                        <td><?php echo $fila['usuario'] ?></td>
                                        <td><span class="badge badge-success">por Enviar</span></td>
                                        <td class="text-center">
                                            <a href="ver_preimpresion_envio.php?id_envio=<?php echo $fila['id'] ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                            <button class="btn btn-danger" onclick="eliminar('<?php echo $fila['id']?>')"><i class="fa fa-trash"></i></button>
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
<script src="../public/assets/libs/vue-swal/vue-swal.js"></script>

<script>
    function eliminar (id) {
        swal({
            title: "¿Desea eliminar este documento?",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $(location).attr('href',"../controller/del_envio.php?id="+id);
                } else {
                }
            });

    }
</script>
</body>

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:59:12 GMT -->
</html>
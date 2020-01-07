<?php
session_start();

require '../models/Banco.php';
require '../models/CompraSunat.php';
$c_banco = new Banco();

$compra=new CompraSunat();

$listaCompra=$compra->verFilas_mostrar();
?>
<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:57:38 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>Mis Bancos - Mi Agente - desarrollado por Luna Systems Peru</title>
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
    <link href="../public/assets/libs/sweetalert2/sweetalert2.min.css"/>

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
                            <li class="breadcrumb-item active">Mis Compras</li>
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
                        <h2 class="page-title col-md-12" style="text-align: center;">Lista de Compras</h2>
                            <a href="reg_compra.php">
                                <button style="margin-bottom: 10px;" type="button" class="btn btn-info waves-effect waves-light"><i class="dripicons-plus mr-1">
                                    </i><span>Agregar Compra</span></button>
                            </a>


                        <div class="table-responsive">
                            <table id="tabla-ingresos" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th width="6%">Id.</th>
                                    <th width="11%">Fecha</th>
                                    <th width="48%">Proveedor</th>
                                    <th width="10%">Documento</th>
                                    <th width="10%">Total</th>
                                    <th width="23%">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <?php  foreach ($listaCompra as $item){?>
                                    <tr>
                                        <td><?php echo $item["id_compras"] ;?></td>
                                        <td class="text-center"><?php echo $item["fecha"] ;?></td>
                                        <td><?php echo $item["documento"] . " | ". $item["razon_social"] ;?></td>
                                        <td><?php echo $item["serie"] . " | ". $item["numero"] ;?></td>
                                        <td class="text-right"><?php echo $item["total"] ;?></td>
                                        <td class="text-center">
                                            <button class="btn btn-info btn-sm" title="Ver Documento"><i class="fa fa-eye-slash"></i></button>
                                            <button onclick="eliminar (<?php echo $item["id_compras"] ;?>)" class="btn btn-danger btn-sm" title="Eliminar Documento"><i class="dripicons-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php    } ?>


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

<!-- plugins
<script src="../public/assets/libs/c3/c3.min.js"></script>
<script src="../public/assets/libs/d3/d3.min.js"></script> -->

<!-- dashboard init
<script src="../public/assets/js/pages/dashboard.init.js"></script>-->

<!-- Sweet Alerts js -->
<script src="../public/assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- App js -->
<script src="../public/assets/js/app.min.js"></script>
<script src="../public/assets/libs/vue-swal/vue-swal.js"></script>

<script>
    function eliminar (id) {
        swal({
            title: "¿Desea eliminar esta compra?",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $(location).attr('href',"../controller/del_compra_sunat.php?id="+id);
                    /*swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                    window.location.href = href;*/
                } else {
                    //swal("Your imaginary file is safe!");
                }
            });
        /*swal({
            title: "Compra",
            text: "¿Desea eliminar este compra?",
            type: "success",
            showCancelButton: false,
            //cancelButtonClass: 'btn-secondary ',
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ver Ticket",
            //cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            //closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {


            }
        });*/
    }
</script>
</body>

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:59:12 GMT -->
</html>
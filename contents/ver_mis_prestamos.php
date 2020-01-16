<?php
session_start();

require '../models/Prestamo.php';
$prestamo = new Prestamo();

$listaPrestamos=$prestamo->verFilas();
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
                        <h2 class="page-title col-md-12" style="text-align: center;">Lista de Prestamos</h2>
                            <a href="reg_prestamo.php">
                                <button style="margin-bottom: 10px;" type="button" class="btn btn-info waves-effect waves-light"><i class="dripicons-plus mr-1">
                                    </i><span>Agregar Prestamo</span></button>
                            </a>


                        <div class="table-responsive">
                            <table id="tabla-ingresos" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th width="11%">ID</th>
                                    <th width="11%">Fecha</th>
                                    <th width="20%">Proveedor</th>
                                    <th width="10%">Monto</th>
                                    <th width="6%">Cuotas</th>
                                    <th width="10%">M. Cuoto</th>
                                    <th width="10%">T. Pagado</th>
                                    <th width="10%">Estado</th>
                                    <th width="34%">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($listaPrestamos as $item){?>
                                    <tr>
                                        <td class="text-center"><?php echo $item["id_prestamo"]?></td>
                                        <td class="text-center"><?php echo $item["fecha"]?></td>
                                        <td><?php echo $item["razon_social"]?></td>
                                        <td class="text-center"><?php echo $item["monto"]?></td>
                                        <td class="text-center"><?php echo $item["tot_cuotas"]?></td>
                                        <td class="text-center"><?php echo $item["monto_cuota"]?></td>
                                        <td class="text-center"><?php echo $item["total_pagado"]?></td>
                                        <td class="text-center"><?php
                                            if($item["estado"]==1){
                                                echo '<span class="badge badge-warning">Por Pagar</span>';
                                            }else{
                                                echo '<span class="badge badge-success">Pagado</span>';
                                            } ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="ver_detalle_prestamo.php?prestamo=<?php echo $item["id_prestamo"]?>" class="btn btn-info btn-sm" title="Ver Detalle" ><i class="fa fa-eye-slash"></i></a>
                                            <!--<button class="btn btn-success btn-sm" title="Ver Pagos"><i class="fa fa-money"></i></button>-->
                                            <button onclick="eliminar(<?php echo $item["id_prestamo"]?>)" class="btn btn-icon btn-sm waves-effect waves-light btn-danger" id="sa-warning"><i class="dripicons-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php  }
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


<!-- modales-->
<div class="modal fade" id="modal-add-bank" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header custom-modal-title" style="padding: 15px;">
                <h4 class="custom-modal-title">Registrar</h4>

            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <form id="reg-banco">
                        <div class="form-group">
                            <label class="control-label">Nombre</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nro. Cuenta</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Monto</label>
                            <input type="text" class="form-control">
                        </div>
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
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
<script>
    function eliminar(idC) {

        Swal.fire({
            title: '¿Desea eliminar este Prestamo?',
            text: "escoja una opcion",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText:'Cancelar',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "../controller/del_prestamo.php",
                    data: {inputIdPrestamo:idC},
                    success: function (data) {
                        console.log(data);
                        if (IsJsonString(data)){
                            Swal.fire(
                                'Eliminado!',
                                'El contrato fue eliminado con Exito',
                                'success'
                            ).then((result) => {
                                location.href="ver_mis_prestamos.php";
                            });

                        }else{
                            Swal.fire("Este Contrato no se puede eliminar!!");
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

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:59:12 GMT -->
</html>
<?php
session_start();

/*require '../models/Banco.php';

$c_banco = new Banco();
$c_banco->setIdEmpresa($_SESSION['id_empresa']);*/
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:57:38 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>Agregar Prestamo - Mi Agente - desarrollado por Luna Systems Peru</title>
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                            <li class="breadcrumb-item active"><a href="ver_contratos.php">Compras</a></li>
                            <li class="breadcrumb-item active">Registrar</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Registro de Compra</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <form id="redistro_compra" action="#" novalidate="novalidate">
                            <div role="application" class="wizard clearfix" id="steps-uid-1">
                                <div class="row">
                                    <div class="content clearfix col-md-8" style="border-right: #BFBFBF solid 1px;">

                                        <section id="steps-uid-1-p-0" role="tabpanel" aria-labelledby="steps-uid-1-h-0"
                                                 class="body current" aria-hidden="false">
                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label "
                                                       for="userName2">Proveedor </label>
                                                <div class="col-lg-3">
                                                    <input v-on:keyup.enter="validar_documento" v-model="documento"
                                                           class="form-control" id="documento" name="documento"
                                                           type="text">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input v-model="razon_social" disabled class="form-control"
                                                           id="razon_social" name="razon_social" type="text">
                                                </div>
                                                <div class="col-lg-1">
                                                    <a href="reg_proveedor.php">
                                                        <button type="button"
                                                                class="btn waves-effect waves-light btn-primary"><i
                                                                    class="fa fa-plus"></i></button>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label " for="password2">
                                                    Direccion</label>
                                                <div class="col-lg-9">
                                                    <input v-model="direccion" id="direccion" disabled name="direccion"
                                                           type="text"
                                                           class="form-control">

                                                </div>
                                                <div class="col-lg-1">
                                                    <button type="button"
                                                            class="btn waves-effect waves-light btn-success"><i
                                                                class="mdi mdi-file-document-edit-outline"></i></button>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label " for="confirm2">Documento</label>
                                                <div class="col-lg-3">
                                                    <select id="select_documento" name="select_documento"
                                                            class="form-control">
                                                        <option value="4">Nota de venta</option>
                                                        <option value="3">Guia de Remision</option>
                                                        <option value="3">Factura</option>
                                                        <option value="3">Boleta</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-2">
                                                    <input id="" name="" type="text"
                                                           class="required form-control">

                                                </div>
                                                <div class="col-lg-3">
                                                    <input id="" name="" type="text"
                                                           class="required form-control">

                                                </div>
                                                <div class="col-lg-2">
                                                    <button class="btn btn-warning">Validar</button>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label ">Fecha</label>
                                                <div class="col-lg-4">
                                                    <input id="" name="" type="date"
                                                           class="required form-control">

                                                </div>
                                                <label class="col-lg-2 control-label ">Clasificacion</label>
                                                <div class="col-lg-4">

                                                    <select id="select_documento" name="select_documento"
                                                            class="form-control">
                                                        <option value="4">Nota de venta</option>
                                                        <option value="3">Guia de Remision</option>
                                                        <option value="3">Factura</option>
                                                        <option value="3">Boleta</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </section>

                                    </div>
                                    <div class="content clearfix col-md-4">
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label">Total</label>
                                            <div class="col-lg-7">
                                                <input id="" name="" type="text"
                                                       class="required form-control">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label">IGV</label>
                                            <div class="col-lg-7">
                                                <input id="" name="" type="text"
                                                       class="required form-control">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label">Sub Total</label>
                                            <div class="col-lg-7">
                                                <input id="" name="" type="text"
                                                       class="required form-control">

                                            </div>
                                        </div>
                                        <div class="actions clearfix">
                                            <button type="button"
                                                    class="btn btn-primary btn-rounded waves-effect waves-light form-control">
                                                Guardar
                                            </button>
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

<script src="../public/assets/libs/vue-swal/vue-swal.js"></script>

<script src="../public/assets/libs/Vue/vue.js"></script>

<script>
    const app = new Vue({
        el: "#redistro_compra",
        data: {
            documento: "",
            razon_social: "",
            direccion:""

        },
        methods: {
            validar_documento() {
                if (this.documento.length == 11) {
                    $.ajax({
                        type: "POST",
                        url: "../controller/ajax/validar_documento.php",
                        data: {"numero": this.documento},
                        success: function (data) {
                        }
                    });
                }else{
                    alerta("SOLO PUEDEN INGRESAR RUC DE 11 DIGITOS");
                }
            }
        }
    }
    )
    ;
</script>

</body>

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:59:12 GMT -->
</html>
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:57:38 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>Agregar Vehiculo - Sebeal Transporte - desarrollado por Luna Systems Peru</title>
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
                    <h4 class="page-title">Registro de Vehiculo</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row justify-content-md-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <form id="fmr_registro_chofer" method="post" action="../controller/.php">
                            <div role="application" class="wizard clearfix" id="steps-uid-1">
                                <div class="row">
                                    <div class="content clearfix col-md-12">

                                        <section id="steps-uid-1-p-0" role="tabpanel" aria-labelledby="steps-uid-1-h-0"
                                                 class="body current" aria-hidden="false">

                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label " for="userName2">Numero de
                                                    Placa</label>
                                                <div class="col-lg-3">
                                                    <input  required class="form-control" id=""
                                                           name="documento"
                                                           type="text">
                                                </div>
                                                <div class="col-lg-2">
                                                    <button type="button"
                                                            class="btn waves-effect waves-light btn-primary">Validar
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label " for="password2">Marca:</label>
                                                <div class="col-lg-9">
                                                    <input name="razon_social" type="text"
                                                           class="required form-control">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label " for="">Modelo:</label>
                                                <div class="col-lg-2">
                                                    <input  id="modelo"
                                                           name="modelo" type="text"
                                                           class="required form-control">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label "
                                                       for="">Mtc:</label>
                                                <div class="col-lg-9">
                                                    <input  name="direccion" type="text"
                                                           class="required form-control">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label " for="">Capacidad:</label>
                                                <div class="col-lg-2">
                                                    <input name="direccion" type="number"
                                                           class="required form-control">
                                                </div>
                                            </div>
                                        </section>
                                        <button type="button"  class="btn btn-purple waves-effect waves-light mt-3">
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


<!-- Vendor js-->
<script src="../public/assets/js/vendor.min.js"></script>
<!-- Bootstrap select plugin -->
<script src="../public/assets/libs/bootstrap-select/bootstrap-select.min.js"></script>

<!-- plugins
<script src="../public/assets/libs/c3/c3.min.js"></script>
<script src="../public/assets/libs/d3/d3.min.js"></script>-->

<!-- dashboard init
<script src="../public/assets/js/pages/dashboard.init.js"></script>-->

<!-- App js -->
<script src="../public/assets/js/app.min.js"></script>
<script src="../public/assets/libs/vue-swal/vue-swal.js"></script>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


<script>

    /*
    * estado
    *   0 => inactivo
    *   1 => procesando
    *   2 => error
    * */
    const alerta = swal;
    var estado = false;


    $(document).ready(function(){
        $("#fmr_registro_proveedor").submit(function (e) {
           // e.preventDefault();
            console.log("........");
            return estado;

            //resto código

        });
    });


    const app = new Vue({
        el: "#fmr_registro_proveedor",
        data: {
            documento: "",
            razon_social: "",
            nombre_comercial: "",
            direcion: "",
            estado_consulta: 0
        },
        methods: {
            enviarFormulario(){
                estado=true;
                $("#fmr_registro_proveedor").submit();
            },
            validar_documento() {
                if (app._data.documento.length == 8 || app._data.documento.length == 11) {
                    this.estado_consulta = 1;
                    $.ajax({
                        type: "POST",
                        url: "../controller/ajax/validar_documento.php",
                        data: {"numero": this.documento},
                        success: function (data) {
                            console.log(data);
                            var json = JSON.parse(data);
                            if (app._data.documento.length == 11) {


                                if (json.success === false) {
                                    app._data.estado_consulta = 2;
                                }
                                if (json.success === true) {
                                    app._data.estado_consulta = 0;
                                    app._data.razon_social = json.result.RazonSocial;
                                    app._data.nombre_comercial = json.result.NombreComercial;
                                    app._data.direcion = json.result.Direccion;
                                }
                            } else {
                                if (json.success === false) {
                                    app._data.estado_consulta = 2;
                                }
                                if (json.success === true) {
                                    app._data.estado_consulta = 0;
                                    app._data.razon_social = json.result.apellidos + " " + json.result.Nombres;
                                    app._data.nombre_comercial = "";
                                    app._data.direcion = "";
                                }

                            }


                        },
                        error: function () {
                            app._data.estado_consulta = 3;
                            $("#nombre_comercial").focus();
                        }
                    });
                } else {
                    alerta("SOLO PUEDEN INGRESAR 11 O 8 DIGITOS");
                }

            }
        }
    });
</script>

</body>
</html>
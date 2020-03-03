<?php
session_start();
require "../models/Clasificacion.php";
require "../models/DocumentoSunat.php";
require "../models/Banco.php";

$clasificacion = new Clasificacion();
$documentoSunat = new DocumentoSunat();
$banco = new Banco();

$listaClasificaciones = $clasificacion->verFilas();
$listaDocumento = $documentoSunat->verFilas();
$listaBancos = $banco->verFilas();
/*require '../models/Banco.php';

$c_banco = new Banco();
$c_banco->setIdEmpresa($_SESSION['id_empresa']);*/
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:57:38 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>Agregar Doc. Compra - Sebeal Transporte - desarrollado por Luna Systems Peru</title>
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
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

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
    <div class="container-fluid" id="dom_ventas">

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

                        <form id="redistro_compra" action="../controller/reg_venta_documento.php" method="POST" enctype="multipart/form-data">
                            <div role="application" class="wizard clearfix" id="steps-uid-1">
                                <div class="row">
                                    <div class="content clearfix col-md-8" style="border-right: #BFBFBF solid 1px;">

                                        <section id="steps-uid-1-p-0" role="tabpanel" aria-labelledby="steps-uid-1-h-0"
                                                 class="body current" aria-hidden="false">
                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label "
                                                       for="userName2">Cliente </label>
                                                <div class="col-lg-8">
                                                    <input
                                                           class="form-control" id="documento" name="documento_cliente"
                                                           type="text">
                                                    <input type="hidden" id="id_cliente" name="id_cliente"  value="">
                                                </div>

                                                <div class="col-lg-1">
                                                    <a href="reg_cliente.php" target="_blank">
                                                        <button type="button"
                                                                class="btn waves-effect waves-light btn-primary"><i
                                                                    class="fa fa-plus"></i></button>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label " for="confirm2">Documento</label>
                                                <div class="col-lg-3">
                                                    <select id="select_documento"
                                                            v-on:change="cambioDocumento( $event)"
                                                            name="select_documento"
                                                            class="form-control">
                                                        <?php
                                                        foreach ($listaDocumento as $item)
                                                            echo "<option value='{$item['id_documento']}'>{$item['nombre']}</option>";
                                                        ?>

                                                    </select>
                                                </div>
                                                <div class="col-lg-2">
                                                    <select name="serie" v-on:change="cambioSerie( $event)" class="required form-control">
                                                        <option v-for="item in opciones" v-bind:value="item">{{item}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-3">
                                                    <input name="numero" type="text" class="required form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 control-label ">Fecha</label>
                                                <div class="col-lg-3">
                                                    <input id="fecha" name="fecha" type="date" required
                                                           class="required form-control">

                                                </div>

                                            </div>
                                            <div v-if="subirArchivo" class="form-group row">
                                                <label class="col-lg-2 control-label">Archivo </label>
                                                <div class="col-lg-7">
                                                    <input  name="file_input" type="file"
                                                           class="form-control">

                                                </div>
                                            </div>
                                        </section>

                                    </div>
                                    <div class="content clearfix col-md-4">
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label">Total</label>
                                            <div class="col-lg-7">
                                                <input v-on:keyup="calculo" v-model="total" name="total" type="text"
                                                       class="required form-control">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label">IGV</label>
                                            <div class="col-lg-7">
                                                <input v-model="igv" disabled  name="igv" type="text"
                                                       class="required form-control">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 control-label">Sub Total</label>
                                            <div class="col-lg-7">
                                                <input v-model="sub_total" disabled  name="sub_total" type="text"
                                                       class="required form-control">

                                            </div>
                                        </div>



                                        <div>
                                            <input  v-for="(item, index) in itemsVenta" type="hidden" name="item_ventas[]" v-bind:value="item">
                                        </div>
                                        <div class="actions clearfix">
                                            <button
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Lista de items</h4>
                        <button data-toggle="modal" data-target="#agregarServicio" style="margin-bottom: 10px;" type="button" class="btn btn-warning waves-effect waves-light"><span>Agregar</span></button>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Descripcion</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item, index) in itemsVenta">
                                    <th scope="row">{{item.split("{}")[0]}}</th>
                                    <td>{{item.split("{}")[1]}}</td>
                                    <td>{{item.split("{}")[2]}}</td>

                                </tr>
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


<div id="agregarServicio" class="modal"  tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Datos del item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cantidad</label>
                        <input type="email" class="form-control" id="cantidad_item" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Precio</label>
                        <input type="text" class="form-control" id="precio_item" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cantidad</label>
                        <textarea class="form-control" id="descripcion_item"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="agregar_item()" type="button" class="btn btn-primary"  data-dismiss="modal" >Agregar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
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

<!-- plugins
<script src="../public/assets/libs/c3/c3.min.js"></script>
<script src="../public/assets/libs/d3/d3.min.js"></script> -->

<!-- dashboard init
<script src="../public/assets/js/pages/dashboard.init.js"></script> -->

<!-- App js -->
<script src="../public/assets/js/app.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!-- Latest compiled and minified JavaScript -->

<script src="../public/assets/js/funciones_compra.js"></script>

<script src="../public/assets/libs/vue-swal/vue-swal.js"></script>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script>

    const alerta = swal;
    const app = new Vue({
            el: "#dom_ventas",
            data: {
                itemsVenta:[],
                id_proveedor: 0,
                documento: "",
                razon_social: "",
                direccion: "",
                id_documento: 0,
                numero_doc: "",
                serie_doc: "",
                total:'',
                igv:'',
                sub_total:'',
                enviar:false,
                opciones:["B","E"],
                subirArchivo:false

            },
            methods: {
                enviar_formulario(){
                    this.enviar=true;
                },
                calculo () {
                    this.sub_total = this.total /1.18;
                    this.igv=this.total-this.sub_total;
                    this.sub_total = parseFloat(this.sub_total).toFixed(2)
                    this.igv=parseFloat(this.igv).toFixed(2)
                },
                cambioDocumento(event){
                    var tipoDoc= event.target.value;
                    if(tipoDoc == 1){
                        this.opciones=["B","E"];
                    }else if(tipoDoc == 2){
                        this.opciones=["F","E"];
                    }
                },
                cambioSerie(event){
                    var tipoDoc= event.target.value;
                    this.subirArchivo = tipoDoc == 'E';
                }
            }

        })
    ;

    function agregar_item() {
        var cantidad = $("#cantidad_item");
        var precio = $("#precio_item");
        var descripcion = $("#descripcion_item");

        var cadenaS=cantidad.val()+"{}"+precio.val()+"{}"+descripcion.val();
        app._data.itemsVenta.push(cadenaS);

        cantidad.val("");
        precio.val("");
        descripcion.val("");



    }
</script>
<script>



    $(document).ready(function () {
        $("#documento").autocomplete({
            source: "../controller/ajax/buscar_clientes.php",
            minLength: 2,
            select: function (event, ui) {
                console.log(ui);
                $("#id_cliente").val(ui.item.id);
                console.log(ui.item.id);
                event.preventDefault();
            }
        });
    });


</script>
</body>

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:59:12 GMT -->
</html>
<?php
session_start();

require '../models/Envio.php';
require '../tools/cl_varios.php';
require '../models/Vehiculo.php';
require '../models/Chofer.php';
require '../models/Destino.php';

$c_envio = new Envio();
$c_varios = new cl_varios();
$vehiculo = new Vehiculo();
$chofer = new Chofer();
$destino = new Destino();

$listaVeiculos = $vehiculo->verFilas();
$litaChoferes = $chofer->verFilas();
$listaDestino = $destino->verFilas();
?>
<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:57:38 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>Crear Hoja de Ruta - Mi Agente - desarrollado por Luna Systems Peru</title>
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
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"/>


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
                    <h4 class="page-title">Crear Hoja de Ruta</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="page-title col-md-12" style="text-align: center; margin-bottom: 25px;">Datos del
                            Documento</h2>
                        <form class="" id="form_datas_ruta" method="post" action="../controller/banco.php">
                            <div class="form-group row">
                                <label class="col-md-1" for="inputProveedor">Proveedor</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input class="form-control" id="input_razon_social"
                                               placeholder="Buscar Empresa de Transporte" required>
                                        <input type="hidden" id="hidden_id_proveedor" name="hiddent_id_proveedor">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-info btn-sm" href="reg_proveedor.php" target="_blank"
                                       id="btn_crear_proveedor"><i class="fa fa-plus"></i> Reg. Proveedor</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-1" for="inputVehiculo">Vehiculo</label>
                                <div class="col-md-2">
                                    <select @change="selectVeiculo($event, $event.target.selectedIndex)"
                                            class="form-control" id="select_placa"
                                            name="select_n_placa">
                                        <option disabled selected value="-1"> Seleccione
                                        </option>

                                        <option v-for="item of veiculos" v-bind:value="item.id_vehiculo">
                                            {{item.placa}}
                                        </option>


                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input v-model="marca_nodelo" class="form-control" id="input_marca" name="input_marca"
                                           placeholder="Marca y Modelo" readonly>
                                </div>
                                <div class="col-md-3">
                                    <input v-model="mtc" class="form-control" id="input_mtc" name="input_mtc" placeholder="MTC"
                                           readonly>
                                </div>
                                <div class="col-md-2">
                                    <a href="reg_vehiculo.php">
                                        <button type="button" id="btn_crear_vehiculo" class="btn btn-info btn-sm"
                                        ><i class="fa fa-plus"></i> Crear Vehiculo
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-1 control-label">Chofer</label>
                                <div class="col-md-2">
                                    <select  @change="selectChofer($event, $event.target.selectedIndex)" class="form-control" id="select_chofer"
                                            name="select_chofer">
                                        <option disabled selected value="-1"> Seleccione
                                        </option>
                                        <option v-for="item of choferes" v-bind:value="item.id_chofer">{{item.datos}}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <input v-model="dato" class="form-control" id="input_datos" name="input_datos"
                                           placeholder="Apellidos y Nombres del Chofer" readonly>
                                </div>
                                <div class="col-md-2">
                                    <input v-model="vct" class="form-control" id="input_vcto" name="input_vcto"
                                           placeholder="Vcto Brevete" readonly>
                                </div>
                                <div class="col-md-2">
                                    <a href="reg_chofer.php">
                                        <button type="button" id="btn_crear_chofer" class="btn btn-info btn-sm"
                                        ><i class="fa fa-plus"></i> Agr. Chofer
                                        </button>
                                    </a>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-1 control-label">Destino</label>

                                <div class="col-md-3">
                                    <select class="form-control" name="select_ciudad" id="select_ciudad">
                                        <?php
                                        foreach ($listaDestino as $item) {
                                            if ($item['id_destino'] != $_SESSION['id_origen'])
                                                echo "<option value='{$item['id_destino']}'>{$item['nombre']}</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                                <label class="col-md-1 control-label">Fecha</label>
                                <div class="col-md-2">
                                    <input id="input_fecha" name="input_fecha" class="form-control text-center"
                                           value="<?php echo date("d/m/Y") ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-1 control-label">Capacidad</label>

                                <div class="col-md-2">
                                    <input v-model="capacidad"  id="cap_veiculo" class="form-control" disabled>
                                </div>
                                <label class="col-md-1 control-label">Solicitada</label>
                                <div class="col-md-2">
                                    <input id="" name="input_capacidad" class="form-control" >
                                </div>
                                <label class="col-md-1 control-label">Monto Contrato</label>
                                <div class="col-md-2">
                                    <input   name="input_monto_contrato" class="form-control" >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form id="data_envios" class="" method="post" action="../controller/reg_hoja_ruta.php">
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover">
                                    <caption></caption>
                                    <thead>
                                    <tr>
                                        <th>Seleccionar</th>
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
                                            <td class="text-center">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="checkbox"
                                                           name="checkbox[]" value="<?php echo $fila['id'] ?>">
                                                </div>
                                            </td>
                                            <td><?php echo $fila['fecha_recepcion'] ?></td>
                                            <td class="text-center"><?php echo $doc_remision ?></td>
                                            <td><?php echo $fila['remitente'] ?></td>
                                            <td><?php echo "GR | " . $fila['referencia'] ?></td>
                                            <td><?php echo $fila['destinatario'] ?></td>
                                            <td><?php echo $fila['destino'] ?></td>
                                            <td><?php echo $fila['usuario'] ?></td>
                                            <td><span class="badge badge-success">Activo</span></td>
                                            <td class="text-center">
                                                <a href="ver_detalle_pago_frecuente.php">
                                                    <button type="button" class="btn btn-success"><i
                                                                class="fa fa-eye"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div onclick="enviarFormulario()" class="btn btn-info"><i
                                        class="fa font-family-secondary"></i>
                                <spam>Generear Hoja de Ruta</spam>
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

<!-- plugins
<script src="../public/assets/libs/c3/c3.min.js"></script>
<script src="../public/assets/libs/d3/d3.min.js"></script> -->

<!-- dashboard init
<script src="../public/assets/js/pages/dashboard.init.js"></script> -->

<!-- App js -->
<script src="../public/assets/js/app.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../public/assets/libs/sweetalert2/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    const app = new Vue({
        el: "#form_datas_ruta",
        data: {
            choferes: [],
            marca_nodelo:"",
            mtc:"",
            veiculos: [],
            dato:"",
            vct:"",
            capacidad:""

        },
        methods: {
            selectVeiculo: function (event, selectedIndex) {
                console.log(selectedIndex);
                var obj=this.veiculos[selectedIndex-1];
                console.log(obj);
                this.marca_nodelo= obj.marca+" - " +obj.modelo;
                this.mtc=obj.mtc;
                this.capacidad=obj.capacidad;
            },
            selectChofer: function (event, selectedIndex) {
                console.log(selectedIndex);
                var obj=this.choferes[selectedIndex-1];
                console.log(obj);
                this.dato= obj.datos;
                this.vct=obj.vencimiento;


            }
        }
    });

    function obtener_chofer_veiculo(id) {
        $.ajax({
            type: "GET",
            url: "../controller/ajax/obtener_veiculos_chofer.php?id_proveedor=" + id,
            success: function (data) {
               // console.log(data);
                if (IsJsonString(data)) {
                    var json = JSON.parse(data);
                    app._data.choferes = json.chofer;
                    app._data.veiculos = json.veiculo;
                }
            }
        });
    }


    function IsJsonString(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }

    function enviarFormulario() {

        $.ajax({
            type: "POST",
            url: "../controller/reg_hoja_ruta.php",
            data: $("#form_datas_ruta").serialize() + "&" + $("#data_envios").serialize(),
            success: function (data) {
                console.log(data);
                if (IsJsonString(data)) {
                    location.href = "ver_hojas_rutas.php";
                    /*Swal.fire(
                         'Eliminado!',
                         'Se registro con exito la Guia de Remision',
                         'success'
                     ).then((result) => {
                     });*/
                }else{
                    alert("Error al registrar");
                }
            }
        });
    }

    $(document).ready(function () {
        $("#input_razon_social").autocomplete({
            source: "../controller/ajax/buscar_proveedor_transportista.php",
            minLength: 2,
            select: function (event, ui) {
                event.preventDefault();
                console.log(ui);
                $("#input_razon_social").val(ui.item.value);
                $("#hidden_id_proveedor").val(ui.item.id);
                obtener_chofer_veiculo(ui.item.id);
            }
        });
    });


</script>


</body>

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:59:12 GMT -->
</html>
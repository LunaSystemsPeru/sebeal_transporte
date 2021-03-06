<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:57:38 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Agregar Banco - Sebeal Transporte - desarrollado por Luna Systems Peru</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../public/assets/images/favicon.ico">

        <!-- Bootstrap select pluings -->
        <link href="../public/assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

        <!-- c3 plugin css -->
        <link rel="stylesheet" type="text/css" href="../public/assets/libs/c3/c3.min.css">

        <!-- App css -->
        <link href="../public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/assets/css/app.min.css" rel="stylesheet" type="text/css" />

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
                            <h4 class="page-title">Registro de Banco</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title --> 

                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="page-title col-md-12" style="text-align: center; margin-bottom: 25px;">Datos Generales</h2>
                                <form class="" method="post" action="../controller/banco.php">
                                    <div class="form-group row">
                                        <label class="col-md-2"  for="inputNombre">Nombre</label>
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <input type="text" id="inputNombre" name="inputNombre" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2"  for="inputEfectivo">Efectivo Inicial</label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="text" id="inputEfectivo" name="inputEfectivo" class="form-control text-right" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2"  for="inputVirtual">Virtual Agente</label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input type="text" id="inputVirtual" name="inputVirtual" class="form-control text-right" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="0" name="inputCodigo">
                                    <button  type="submit" class="btn btn-purple waves-effect waves-light mt-3">Guardar</button>
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
        <?php require '../fixed/footer.php'?>
        <!-- end Footer -->

        <!-- Right Sidebar -->
        <?php require '../fixed/right-sidebar.php'?>
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
        
    </body>

<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:59:12 GMT -->
</html>
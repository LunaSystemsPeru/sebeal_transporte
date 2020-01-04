<?php
session_start();
$_SESSION['id_usuario'] = 1;
?>
<!DOCTYPE html>
<html lang="es">
    
<!-- Mirrored from coderthemes.com/codefox/layouts/light-horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2019 15:57:38 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Codefox - Responsive Bootstrap 4 Admin Dashboard</title>
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Codefox</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Welcome John !</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title --> 

                <div class="row">

                    <div class="col-xl-3 col-md-6">
                        <div class="card widget-box-two bg-purple border-purple">
                            <div class="card-body">
                                <div class="float-right avatar-lg rounded-circle bg-soft-light mt-2">
                                    <i class="mdi mdi-chart-line font-22 avatar-title text-white"></i>
                                </div>
                                <div class="wigdet-two-content">
                                    <p class="m-0 text-uppercase text-white" title="Statistics">Statistics</p>
                                    <h2 class="text-white"><span data-plugin="counterup">65841</span> <i class="mdi mdi-arrow-up text-white font-22"></i></h2>
                                    <p class="text-white m-0"><b>10%</b> From previous period</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card widget-box-two bg-info border-info">
                            <div class="card-body">
                                <div class="float-right avatar-lg rounded-circle bg-soft-light mt-2">
                                    <i class="mdi mdi-access-point-network  font-22 avatar-title text-white"></i>
                                </div>
                                
                                <div class="wigdet-two-content">
                                    <p class="m-0 text-white text-uppercase" title="User Today">User Today</p>
                                    <h2 class="text-white"><span data-plugin="counterup">52142</span> <i class="mdi mdi-arrow-up text-white font-22"></i></h2>
                                    <p class="text-white m-0"><b>5.6%</b> From previous period</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card widget-box-two bg-pink border-pink">
                            <div class="card-body">
                                <div class="float-right avatar-lg rounded-circle bg-soft-light mt-2">
                                    <i class="mdi mdi-timetable font-22 avatar-title text-white"></i>
                                </div>
                                <div class="wigdet-two-content">
                                    <p class="m-0 text-uppercase text-white" title="Request Per Minute">Request Per Minute</p>
                                    <h2 class="text-white"><span data-plugin="counterup">2365</span> <i class="mdi mdi-arrow-up text-white font-22"></i></h2>
                                    <p class="text-white m-0"><b>7.02%</b> From previous period</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card widget-box-two bg-success border-success">
                            <div class="card-body">
                                <div class="float-right avatar-lg rounded-circle bg-soft-light mt-2">
                                    <i class="mdi mdi-cloud-download font-22 avatar-title text-white"></i>
                                </div>
                                <div class="wigdet-two-content">
                                    <p class="m-0 text-white text-uppercase" title="New Downloads">New Downloads</p>
                                    <h2 class="text-white"><span data-plugin="counterup">854</span> <i class="mdi mdi-arrow-up text-white font-22"></i></h2>
                                    <p class="text-white m-0"><b>9.9%</b> From previous period</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Last 30 days statistics</h4>

                                <div dir="ltr">
                                    <div id="donut-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Total Revenue share</h4>
                                <div dir="ltr">
                                    <div id="combine-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Total Revenue share</h4>
                                <div dir="ltr">
                                    <div id="roated-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Recent Projects</h4>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Project Name</th>
                                            <th>Start Date</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                            <th>Assign</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Codefox Admin v1</td>
                                                <td>01/01/2017</td>
                                                <td>26/04/2017</td>
                                                <td><span class="badge badge-info">Released</span></td>
                                                <td>Coderthemes</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Codefox Frontend v1</td>
                                                <td>01/01/2017</td>
                                                <td>26/04/2017</td>
                                                <td><span class="badge badge-success">Released</span></td>
                                                <td>Coderthemes</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Codefox Admin v1.1</td>
                                                <td>01/05/2017</td>
                                                <td>10/05/2017</td>
                                                <td><span class="badge badge-pink">Pending</span></td>
                                                <td>Coderthemes</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Codefox Frontend v1.1</td>
                                                <td>01/01/2017</td>
                                                <td>31/05/2017</td>
                                                <td><span class="badge badge-purple">Work in Progress</span></td>
                                                <td>Coderthemes</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Codefox Admin v1.3</td>
                                                <td>01/01/2017</td>
                                                <td>31/05/2017</td>
                                                <td><span class="badge badge-warning">Coming soon</span></td>
                                                <td>Coderthemes</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Codefox Admin v1</td>
                                                <td>01/01/2017</td>
                                                <td>26/04/2017</td>
                                                <td><span class="badge badge-info">Released</span></td>
                                                <td>Coderthemes</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Codefox Frontend v1</td>
                                                <td>01/01/2017</td>
                                                <td>26/04/2017</td>
                                                <td><span class="badge badge-success">Released</span></td>
                                                <td>Coderthemes</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card widget-box-three">
                                    <div class="card-body">
                                        <div class="bg-icon float-left avatar-lg text-center bg-light rounded-circle">
                                            <i class="fe-database h2 text-muted m-0 avatar-title"></i>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-uppercase">Statistics</p>
                                            <h3 class="mb-0"><span data-plugin="counterup">2,562</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card widget-box-three">
                                    <div class="card-body">
                                        <div class="bg-icon float-left avatar-lg text-center bg-light rounded-circle">
                                            <i class="fe-briefcase h2 text-muted m-0 avatar-title"></i>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-uppercase">User Today</p>
                                            <h3 class="mb-0"><span data-plugin="counterup">8,542</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card widget-box-three">
                                    <div class="card-body">
                                        <div class="bg-icon float-left avatar-lg text-center bg-light rounded-circle">
                                            <i class="fe-download h2 text-muted m-0 avatar-title"></i>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-uppercase">Request Per Minute</p>
                                            <h3 class="mb-0"><span data-plugin="counterup">6,254</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card widget-box-three">
                                    <div class="card-body">
                                        <div class="bg-icon float-left avatar-lg text-center bg-light rounded-circle">
                                            <i class="fe-bar-chart-2 h2 text-muted m-0 avatar-title"></i>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-uppercase">New Downloads</p>
                                            <h3 class="mb-0"><span data-plugin="counterup">7,524</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card widget-user">
                                    <div class="card-body">
                                        <img src="../public/assets/images/users/avatar-3.jpg" class="img-fluid d-block rounded-circle avatar-md" alt="user">
                                        <div class="wid-u-info">
                                            <h5 class="mt-3 mb-1">Chadengle</h5>
                                            <p class="text-muted mb-0">coderthemes@gmail.com</p>
                                            <div class="user-position">
                                                <span class="text-warning">Admin</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                            </div>

                            <div class="col-md-6">
                                <div class="card widget-user">
                                    <div class="card-body">
                                        <img src="../public/assets/images/users/avatar-2.jpg" class="img-fluid d-block rounded-circle avatar-md" alt="user">
                                        <div class="wid-u-info">
                                            <h5 class="mt-3 mb-1">Michael Zenaty</h5>
                                            <p class="text-muted mb-0">coderthemes@gmail.com</p>
                                            <div class="user-position">
                                                <span class="text-info">User</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end col -->

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
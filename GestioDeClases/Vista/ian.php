<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Material Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="assets/css/material.css" rel="stylesheet"/>

    <link href="css/icons/cyrillic-ext.css" rel="stylesheet" type="text/css">
    <link href="css/icons/Material+Icons.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

</head>

<body class="theme-purple">
<?php require("snippers/MenuTop.php") ?>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <?php require ("snippers/MenuLeft.php")?>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <?php require ("snippers/MenuRight.php")?>
    <!-- #END# Right Sidebar -->
</section>
<section>
    <div class="menu">
        <ul class="list">

            <li class="active">

            </li>


        </ul>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Registro de Profesores</h4>
                        <p class="category">Complete el Formulario</p>
                    </div>
                    <div class="card-content">
                        <form>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nombre</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Apellido</label>
                                        <input type="text" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="form-group label-floating">
                                        <select class="form-control show-tick">
                                            <option disabled selected>Tipo Documento</option>
                                            <option>T.I</option>
                                            <option>C.C</option>
                                            <option>C.E</option>

                                        </select>

                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Numero de Documento</label>
                                        <input type="number" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Telefono</label>
                                        <input type="number" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">email</label>
                                        <input type="email" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Profesion</label>
                                        <input type="text" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Seguro</label>
                                        <input type="text" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">NRP</label>
                                        <input type="text" class="form-control" >
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Observaciones</label>
                                        <div class="form-group label-floating">
                                            <textarea class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="assets/img/faces/marc.jpg" />
                        </a>
                    </div>

                    <div style="padding-right: 20px; padding-left: 20px;" class="content">
                        <h6 class="category text-gray">Elegir Foto</h6>
                        <h4 class="card-title">Cristtian Fabian</h4>
                        <p class="card-content">
                            Fecha de Inicio
                        </p>
                        <input  type="text" class="datepicker form-control" placeholder="Please ">

                        <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <footer class="footer">
        <div class="container-fluid">

            <p class="copyright pull-right">
                &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
            </p>
        </div>
    </footer>
    </div>

</section>
<!--div class="col-sm-4">
    <div class="form-group">
        <div class="form-line">
            <input type="text" class="datetimepicker form-control" placeholder="Please choose date & time...">
        </div>
    </div>
</div-->

<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/node-waves/waves.js"></script>
<script src="plugins/autosize/autosize.js"></script>
<script src="plugins/momentjs/moment.js"></script>
<script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<script src="js/pages/forms/basic-form-elements.js"></script>


<script src="assets/js/material.min.js" type="text/javascript"></script>
<script src="assets/js/material.js"></script>
<!--------------------------------------->

<script src="plugins/bootstrap/js/bootstrap.js"></script>
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
<script src="js/scroll.js"></script>
<script src="js/demo.js"></script>






<!-- Demo Js -->
</body>
</html>
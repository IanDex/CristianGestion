<?php
session_start();
?>
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

<body class="theme-blue">
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
<section style="margin-top: -250px" class="content">
    <div class="container-fluid">
        <form class="col s12" method="post" action="../Controlador/AdminCtlr.php?action=editar">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-header ian">
                            <h4 class="title">Editar Administradores</h4>
                            <p class="category">Complete el Formulario</p>
                        </div>
                        <div class="card-content">
                            <form>
                                <div class="row">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="" value="<?php echo $_SESSION['name']  ?>" class="form-control col-md-7 col-xs-12" name="Nombre" placeholder="Nombre" required="required" type="text">
                                        </div>
                                    </div>
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Apellido <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="" value="<?php echo $_SESSION['app']  ?>" class="form-control col-md-7 col-xs-12" name="Apellido" placeholder="app" required="required" type="text">
                                        </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipo de Documento <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="" value="<?php echo $_SESSION['TipoDoc']  ?>" class="form-control col-md-7 col-xs-12" name="TipoDoc" placeholder="TipoDoc" required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Documento <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="" value="<?php echo $_SESSION['Doc']  ?>" class="form-control col-md-7 col-xs-12" name="Doc" placeholder="Doc" required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Telefono <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="" value="<?php echo $_SESSION['Tel']  ?>" class="form-control col-md-7 col-xs-12" name="Tel" placeholder="Tel" required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="" value="<?php echo $_SESSION['email']  ?>" class="form-control col-md-7 col-xs-12" name="email" placeholder="email" required="required" type="text">
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
                                <div class="img" id="vista_previa"><label for="archivos"></label> <!-- miniatura -->Vista previa</div>
                            </a>
                        </div>
                        <style>


                            #divInput label{
                                overflow:hidden;
                                position:absolute;
                                z-index:1;
                                *z-index:2
                            }
                            #archivos{
                                position:absolute;
                                -moz-opacity:0 ;
                                filter:alpha(opacity: 0);
                                opacity: 0;
                                z-index:2;
                                *z-index:1; *height:0;
                            }

                        </style>
                        <div class="content">
                            <label style="margin-top: 10px; margin-bottom: -40px" for="archivos">Elegir Imagen</label>
                            <input type="file" dirname="foto" id="archivos" name="archivos" />





                            <button style="margin-bottom: 10px" type="submit" class="btn btn-primary btn-round" name="send" id="send">Enviar</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
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

<form action="#" method="post" id="subearchivos" hidden>

    <input type="submit" id="enviar" name="enviar" />
    <input type="button" value="cancelar"  style="display: none;" onclick="cancela('subearchivos');" id="resetear" />
</form>
<!--div class="col-sm-4">
    <div class="form-group">
        <div class="form-line">
            <input type="text" class="datetimepicker form-control" placeholder="Please choose date & time...">
        </div>
    </div>
</div-->

<script>
    document.getElementById('vista_previa').innerHTML = '<img src="images/user4.png" alt="" width="250" />';

    if (window.FileReader) {
        function seleccionArchivo(evt) {
            var files = evt.target.files;
            var f = files[0];
            var leerArchivo = new FileReader();
            document.getElementById('resetear').style.display= 'block';
            leerArchivo.onload = (function(elArchivo) {
                return function(e) {
                    document.getElementById('vista_previa').innerHTML = '<img src="'+ e.target.result +'" alt="" width="250" />';
                };
            })(f);

            leerArchivo.readAsDataURL(f);
        }
    } else {
        document.getElementById('vista_previa').innerHTML = "El navegador no soporta vista previa";
    }

    document.getElementById('archivos').addEventListener('change', seleccionArchivo, false);

    function cancela(elForm){
        document.getElementById(elForm).reset();
        if (window.FileReader) {
            document.getElementById('vista_previa').innerHTML = "Vista Previa";
        }else{
            document.getElementById('vista_previa').innerHTML = "El navegador no soporta vista previa";
        }
        document.getElementById('resetear').style.display= 'none';
    }
</script>
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
<script src="js/admin.js"></script>






<!-- Demo Js -->
</body>
</html>
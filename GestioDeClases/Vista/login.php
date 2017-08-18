<?php
session_start();
if (!empty($_SESSION['idP'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Inicio de Sesion</title>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <link href="js/jquery-ui.min.css" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="../../../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->

    <link href="css/icons/cyrillic-ext.css" rel="stylesheet" type="text/css">
    <link href="css/icons/Material+Icons.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
<div id="resultado" name="resultado" class="ui-widget"></div>

    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Gestion de <b>CLASES</b></a>
        </div>
        <div style="border-radius: 10px; margin-bottom: 5px; " class="card">

            <div class="body">
                <!-- Nav tabs -->
              <h2 style="text-align: center; margin-top: 5px">Inicio de Sesion </h2>

                <!-- Tab panes -->
                <form id="frmLogin" name="frmLogin">
                            <div class="msg">Administrador - Profesor - Estudiante</div>
                            <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>

                                <div class="form-line">
                                    <input type="text" hidden id="ad" name="ad" value="Admin">
                                    <input type="text" class="form-control" value="" id="User" name="User" placeholder="Usuario" required autofocus autocomplete="off">
                                </div>
                            </div>
                            <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                                <div class="form-line">
                                    <input type="password" class="form-control" value="" id="Password" name="Password" placeholder="Contraseña" required autocomplete="off">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-8 p-t-5">
                                    <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                                    <label for="rememberme">Recuerdame</label>
                                </div>
                                <div class="col-xs-4">
                                    <button class="btn btn-block bg-pink waves-effect"type="submit" id="btnEnviar" name="btnEnviar" value="Login">Login</button>
                                </div>
                            </div>

                            <div class="row m-t-15 m-b--20">
                                <div class="col-xs-6">
                                    <a>.</a>
                                </div>
                                <div style="padding-bottom: 10px; padding-right: 10px" class=" align-right">
                                    <a href="forgot-password.html">Olvidaste tu Contraseña?</a>
                                </div>
                            </div>
                        </form>


            </div>

        </div>
        <p style="color: white" class="right"> &copy; <script>document.write(new Date().getFullYear())</script> - Adsi</p>

    </div>
    <script>

        $("#frmLogin").submit(function(e){
            e.preventDefault();

            var User = $("#User").val();
            var Password = $("#Password").val();

            $.ajax({
                method: "POST",
                url: "../Controlador/ProfesoresCtlr.php?action=Login",
                data: { User: User, Password: Password}
            })

            .done(function( msg ) {
                if(msg == "1"){

                    window.location.href = "../Controlador/comp.php";
                }else{
                    $("#resultado").html(msg);
                }
            });

        });

    </script>
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>
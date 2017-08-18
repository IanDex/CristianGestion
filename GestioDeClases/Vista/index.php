<?php 
	session_start();
require_once '../Modelo/Profesores.php';
$customers = new Profesores();

	if (empty($_SESSION['idP'])){
		header("Location: login.php");
	}else?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Administrador</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="css/icons/cyrillic-ext.css" rel="stylesheet" type="text/css">
    <link href="css/icons/Material+Icons.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/lstyle.css">
    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/materialize.css">
    <script src="plugins/jquery/jquery.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
</head>

<body class="theme-red">


<?php if(!empty($_GET['lol'])){ ?>
    <?php if ($_GET['lol'] == "1"){ ?>

        <script>
            var allowDismiss = true;
            var llll = "center";
            var placementFrom = "top";
            var placementAlign = "left";
            var animateEnter = "animated fadeInLeft";
            var animateExit = "animated fadeOutLeft";
            $.notify({
                title: '<strong>Bienvenido </strong>',
                message: "<?php $_SESSION['name']?>"},{

                type: "success",
                allow_dismiss: allowDismiss,
                newest_on_top: true,
                timer: 1000,
                placement: {
                    from: placementFrom,
                    align: placementAlign
                },
                animate: {
                    enter: animateEnter,
                    exit:animateExit
                }
            });

        </script>
    <?php }}?>

<!-- Page Loader -->
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<?php require ("snippers/MenuTop.php")?>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <?php require ("snippers/MenuLeft.php")?>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <?php

    require ("snippers/MenuRight.php")?>
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    <div style="background: white; border-radius: 15px" class="container-fluid">
        <div class="block-header">
            <h1 style="text-align: center">Datos Actuales</h1>


            <section class="full-reset text-center" style="padding: 20px 0;">
                <article class="tile">
                    <div style="margin-top: 15px; margin-bottom: -15px" class="tile-icon full-reset"><i style="font-size: 160%" class="material-icons">person</i></div>
                    <div class="tile-name all-tittles">Administradores</div>
                    <div class="tile-num full-reset"><?php $data = $customers->cantfil("Admin");?></div>

                </article>
                <article class="tile">
                    <div style="margin-top: 15px; margin-bottom: -15px" class="tile-icon full-reset"><i style="font-size: 160%" class="material-icons">person</i></div>
                    <div class="tile-name all-tittles">Estudiantes</div>
                    <div class="tile-num full-reset"><?php $data = $customers->cantfil("Estudiante");?></div>
                </article>
                <article class="tile">
                    <div style="margin-top: 15px; margin-bottom: -15px" class="tile-icon full-reset"><i style="font-size: 160%" class="material-icons">edit</i></div>
                    <div class="tile-name all-tittles">Profesores</div>
                    <div class="tile-num full-reset"><?php $data = $customers->cantfil("Profesor");?></div>
                </article>
                </section>
            <section class="full-reset text-center" >
                <article class="tile">
                    <div style="margin-top: 15px; margin-bottom: -15px" class="tile-icon full-reset"><i style="font-size: 160%" class="material-icons">send</i></div>
                    <div class="tile-name all-tittles">Ciclos</div>
                    <div class="tile-num full-reset"><?php $data = $customers->cantfilas("ciclo");?></div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i style="font-size: 160%" class="material-icons">settings</i></div>
                    <div class="tile-name all-tittles">Programa</div>
                    <div class="tile-num full-reset"><?php $data = $customers->cantfilas("ciclo");?></div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i style="font-size: 160%" class="material-icons">send</i></div>
                    <div class="tile-name all-tittles">Asignaturas</div>
                    <div class="tile-num full-reset"><?php $data = $customers->cantfilas("ciclo");?></div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i style="font-size: 160%" class="material-icons">send</i></div>
                    <div class="tile-name all-tittles">Aulas</div>
                    <div class="tile-num full-reset"><?php $data = $customers->cantfilas("ciclo");?></div>
                </article>

            </section>

        <!-- Input -->




    </div>
</section>

<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="js/scroll.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<script src="plugins/jquery-countto/jquery.countTo.js"></script>
<script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
<!-- Slimscroll Plugin Js -->

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/ui/tooltips-popovers.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>

<!--script src="js/pages/forms/advanced-form-elements.js"></script-->
<script src="js/pages/ui/notifications.js"></script>

</body>

</html>

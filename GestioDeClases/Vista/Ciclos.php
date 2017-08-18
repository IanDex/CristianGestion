<?php
$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("bd_pro", $conexion);
?>

<!-- Nav tabs -->

<!-- Tab panes -->
<?php/*
            $query_offers = 'SELECT idP, Nombre, Apellido
                        FROM prueba';
            $offers = mysql_query($query_offers, $conexion);

            while ($row = mysql_fetch_array($offers)) {
                */?>

<?php//}
?>
<!--2><?//php echo $row['Nombre'];  ?>Nombre</h2-->


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Blank Page | Bootstrap Based Admin Template - Material Design</title>
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

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">

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
    <?php require ("snippers/MenuRight.php")?>
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">

            <?php
            $query_offers = 'SELECT idP, Nombre, Apellido , TipoDoc
                        FROM prueba';
            $offers = mysql_query($query_offers, $conexion);

            while ($row = mysql_fetch_array($offers)) {
                ?>
                <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
<div draggable="true" ondragstart="drag(event)" style="background: lightblue; padding: 10px; margin: 15px;width: 20%; border-radius: 15px">


                    <h2><?php echo $row['Nombre']; ?></h2>
                    <span ></span><?php echo $row['Apellido']; ?> </span>
                    <span > <?php echo $row['TipoDoc']; ?> </span><br/><br/>
</div>
                </div>
                <?php
            }
            ?>

        </div>
        <style>

            #div2{
                float: right;
                width: 190px;
                height: 355px;
                margin: 10px;
                padding: 10px;
                border: 1px solid black;
            }
        </style>
        <script>
            function allowDrop(ev) {
                ev.prevent_default();

            }
            function drag(ev) {
                ev.dataTransfer.setData("text", ev.target.id)

            }
            function drop() {
                ev.prevent_default();
                var data = ev.dataTransfer.getData("text");
                ev.target.appendChild(document.getElementById(data));
            }
        </script>
        <!-- Input -->
<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>



    </div>
</section>

<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="js/scroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>

<script src="js/pages/forms/advanced-form-elements.js"></script>
</body>

</html>
<?php
session_start();
if (empty($_SESSION['idP'])){
    header("Location: login.php");
}else
    $conexion = mysql_connect("localhost", "root", "");
mysql_select_db("bd_pro", $conexion);
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Material Design - Responsive card</title>


    <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="card/css/style.css">

    <link href="css/icons/cyrillic-ext.css" rel="stylesheet" type="text/css">
    <link href="css/icons/Material+Icons.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet" />

</head>

<body class="theme-blue">
<?php require("snippers/MenuTop.php") ?>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <?php require ("snippers/MenuLeftEds.php")?>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <?php require ("snippers/MenuRight.php")?>
    <!-- #END# Right Sidebar -->
</section>
<section class="content">
    <div class="container-fluid">

    </div>
    <div class="row active-with-click">
        <?php
        $query_offers = 'SELECT * FROM prueba,horario WHERE prueba.idP = horario.Profesor';

        $offers = mysql_query($query_offers, $conexion);

        while ($row = mysql_fetch_array($offers)) {
            if ($_SESSION['idP'] == $row['Estudiante']){
            if ($row['tipo']=='Profesor'){
                ?>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Purple">
                        <h2>
                            <span><?php echo $row['Nombre'] ?> <?php echo $row['Apellido'] ?></span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                Programa
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-responsive" src="<?php echo $row['foto'] ?>">
                            </div>
                            <div class="mc-description" style="padding-top: 55px">

                                <label>Documento:</label>
                                <p><?php echo $row['Doc'] ?></p>
                                <label>Telefono:</label>
                                <p><?php echo $row['Tel'] ?></p>
                                <label>Correo: <?php echo $row['email'] ?></label>
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">

                            <a class="fa fa-fw "></a>
                            <a class="fa fa-fw fa-twitter"></a>
                            <a class="fa fa-fw fa-linkedin"></a>
                            <a class="fa fa-fw fa-google-plus"></a>
                        </div>
                    </article>
                </div>


                <?php
            }
            }else{
                print "No hay Datos";
            }

        }
        ?>
    </div>
</section>

<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/node-waves/waves.js"></script>
<script src="plugins/autosize/autosize.js"></script>
<script src="plugins/momentjs/moment.js"></script>
<script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<script src="js/pages/forms/basic-form-elements.js"></script>



<script src="plugins/bootstrap/js/bootstrap.js"></script>
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
<script src="js/scroll.js"></script>
<script src="js/demo.js"></script>
<script src="js/admin.js"></script>
<script src="card/js/index.js"></script>

</body>
</html>

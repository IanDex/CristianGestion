<?php
define('INCLUDE_CHECK',1);
require "horario/conn.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Colored Card | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="horario/css/stle.css" />

    <!-- Google Fonts -->

    <link href="css/icons/cyrillic-ext.css" rel="stylesheet" type="text/css">
    <link href="css/icons/Material+Icons.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!--WaitMe Css-->

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/fab.css" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    <script type="text/javascript" src="horario/js/jquery.min.js"></script>
    <script type="text/javascript" src="horario/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="horario/js/simpletip.js"></script>
    <script type="text/javascript" src="horario/js/script.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>

</head>

<body class="theme-red">
<!-- Page Loader -->
<?php require ("snippers/MenuTop.php")?>
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
        <!-- Basic Example -->

                <div class="card"style=" overflow: scroll; height: 550px;" >
                    <div class="header bg-light-blue">
                        <h2>
                            Listado de Asignaturas
                        </h2>
                    </div>

                    <div class="body col-md-4 col-sm-6 col-xs-12" >
                        <div>

                            <?php
                            $result = mysql_query("SELECT * FROM asignatura");
                            while($row=mysql_fetch_assoc($result))
                            {
                                echo '
				
                            

                                <div  class="item" style="width: 100%">
                                    <div>
                                    <div class="card" style="width: 100%">
                                        <div class="header bg-blue-grey" style="margin: 0px; padding: 0px">
                                        
                                          					<img src="horario/images/'.$row['img'].'" alt="'.htmlspecialchars($row['name']).'"/>
 

                                        </div>
                                        <div class="body" style="width: 100%">
                                                <p>Nombre: '.$row['name'].'</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>';
}
                            ?>

                        </div>

                    </div>

                    <div class="col-sm-8" >
                        <div class="card" style="height: 450px; padding: 15px; margin: 15px;">

                            <div class="body">
                                <div style="margin: 5px" class="content drop-box">
                                    <span>Arrastra Aqui las Asignaturas A Inscribir</span>
                                    <form name="checkoutForm" method="post" action="checkout.php">
                                        <div id="item-list"></div>
                                    </form>
                                    <div id="total"></div>
                                    <a href="" onclick="document.forms.checkoutForm.submit(); return false;" class="button">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red" onclick="document.forms.checkoutForm.submit(); return false;">
                <i class="large material-icons" data-toggle="tooltip" data-placement="left" title="Guardar Cambios">save</i>
            </a>
        </div>

        <!-- #END# Colored Card - With Loading -->





    </div>
</section>

<!-- Jquery Core Js -->

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Wait Me Plugin Js -->

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/cards/colored.js"></script>


<!-- Demo Js -->
<script src="js/demo.js"></script>
</body>
</html>
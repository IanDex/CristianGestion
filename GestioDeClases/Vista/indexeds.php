<?php
session_start();
define('INCLUDE_CHECK',1);
require "conn.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Gestion de Clases | <?php echo $_SESSION['name'] .' '. $_SESSION['app']?></title>
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
    <?php require ("snippers/MenuLeftEds.php")?>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <?php require ("snippers/MenuRight.php")?>
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Horario Inscrito
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table  frame="box" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Profesor</th>
                                        <th>Aula</th>
                                        <th>Ciclo</th>
                                        <th>Inicio</th>
                                        <th>Final</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                        $cnt = array();
                                        $products = array();
                                        $total = 0;

                                        foreach($_POST as $key=>$value)
                                        {
                                            $key=(int)str_replace('_cnt','',$key);

                                            $products[]=$key;
                                            $cnt[$key]=$value;
                                        }

                                        $result = mysql_query("SELECT * FROM asignatura WHERE idAs IN(".join($products,',').")");
                                        $cont=0;
                                        while($row=mysql_fetch_assoc($result)){
                                            $cont++;
                                        }

                                        if ($cont==0){
                                            header("location: horario.php?action=lol");
                                        }else if ($cont <=3 && $cont > 0){
                                            header("location: horario.php?action=32");

                                        }else{

                                            if (!mysql_num_rows($result)) {
                                                echo '<p>There was an error processing your order.</p>';
                                            } else {
                                                $est = $_SESSION['idP'];

                                                $resul = mysql_query("SELECT * FROM asignatura,prueba,ciclo,aulas WHERE idAs IN(".join($products,',').") AND prueba.idP = asignatura.description AND ciclo.idC = asignatura.ciclo AND aulas.idAl = asignatura.aula");


                                                while ($row = mysql_fetch_assoc($resul)) {
                                                    $id = $row['idAs'];

                                                    $idAs = $row['name'];
                                                    $profe = $row['description'];
                                                    $aula = $row['aula'];
                                                    $ciclo = $row['ciclo'];
                                                    $ini = $row['H_Inicio'];
                                                    $fin = $row['H_Final'];
                                                    echo '<tr>';
                                                    echo '<td>' . $row['name'] . ' </td>
                                                          <td> ' . $row['Nombre'] ." ". $row['Apellido'] . '</td>
                                                          <td> ' . $row['NombreAl'] . '</td>
                                                          <td> ' . $row['NombreC'] . '</td>
                                                          <td> ' . $row['H_Inicio'] . '</td>
                                                          <td> ' . $row['H_Final'] . '</td>
                                                          ';
                                                    echo '</tr>';

                                                    $l = mysql_query("INSERT INTO horario VALUES (null,'" . $id . "','" . $est . "','" . $profe . "','" . $aula . "','" . $ciclo . "','" . $ini . "','" . $fin . "')");

                                                }
                                                $l = mysql_query("UPDATE prueba SET materias = '1' WHERE idP = '".$est ."'");

                                            }
                                        }
                                        ?>

</tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- Input -->




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
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/tables/jquery-datatable.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>

<script src="js/pages/forms/advanced-form-elements.js"></script>
</body>

</html>
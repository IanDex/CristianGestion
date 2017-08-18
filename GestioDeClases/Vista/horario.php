<?php
session_start();
if ($_SESSION['materias']==1) {
    header("Location: verH.php?registro=true");

}else
if (empty($_SESSION['idP'])){
    header("Location: login.php");
}else
define('INCLUDE_CHECK',1);
require "conn.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Colored Card | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->

    <link href="css/icons/cyrillic-ext.css" rel="stylesheet" type="text/css">
    <link href="css/icons/Material+Icons.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->

    <!--WaitMe Css-->

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/fab.css" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <script type="text/javascript" src="js/jquery.easyui.min.js"></script>
    <style type="text/css">

        .remove {
            color: #FFF;
            background: #fd0c00;
            padding: 5px 10px 5px 10px;
            text-decoration: none;
            border-radius: 3px;
        }

        #item-list table {
            border-top: 1px dotted #cecece;
            border-bottom: 1px dotted #cecece;
            padding: 5px;
        }

    </style>

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


        <div class="row clearfix">
            <div class=" col-md-4 col-sm-6 col-xs-12">
                <div class="card" style="height: 550px">
                    <div class="header bg-light-blue">
                        <h2>
                            Listado de Asignaturas
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li>

                                <a>
                                    <i class="material-icons">search</i>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="header bg-light-blue" hidden>
                        <input type="text" style="color: black">
                        <button class="right">Buscar</button>
                    </div>
                    <div class="body" style=" overflow: scroll; height: 490px;">


                        <div class="item">

                            <?php
                            $result = mysql_query("SELECT * FROM asignatura,prueba,ciclo,aulas WHERE prueba.idP = asignatura.description AND ciclo.idC = asignatura.ciclo AND aulas.idAl = asignatura.aula");
                            while($row=mysql_fetch_assoc($result))
                            {?>
                                <div style="width: 100%; padding: 15px;  cursor: move;" id="<?php echo $row['idAs']; ?>" class="item card">


                                    <p> <?php echo $row['name'] ?></p>
                                    <p> <?php echo $row['H_Inicio'] ?></p>
                                    <p> <?php echo $row['H_Final'] ?></p>
                                    <p hidden> <?php echo $row['description'] ?></p>
                                    <p> <?php echo $row['Nombre'] ." ". $row['Apellido'] ?></p>
                                    <p hidden> <?php echo $row['ciclo'] ?></p>
                                    <p hidden> <?php echo $row['aula'] ?></p>
                                    <p> <?php echo $row['NombreC'] ?></p>
                                    <p> <?php echo $row['NombreAl'] ?></p>
                                </div>

                                <?php
                            }
                            ?>


                        </div>


                    </div>
                </div>
            </div>
            <div class="col-sm-8 right" >
                <div class="card" style="height: 550px;">
                    <div class="header bg-light-blue">
                        <h2>
                            Arrastre <small>Las Materias a Inscribir en el cuadro punteado</small>
                        </h2>

                    </div>
                    <div class="body">

                        <div style="border-radius: 10px; padding: 15px; height: 430px; border: 2px dashed" class="content drop-box">
                            <table class="table table-bordered">
                                <thead style="padding: 0px">
                                <tr>
                                    <th>#</th>
                                    <th style="text-align: center" width="15%">Nombre</th>
                                    <th style="text-align: center" width="10%">Inicio</th>
                                    <th style="text-align: center" width="10%">Final</th>
                                    <th style="text-align: center" width="25%">Profesor</th>
                                    <th style="text-align: center" width="15%">Ciclo</th>
                                    <th style="text-align: center" width="15%">Aula</th>
                                    <th style="text-align: center" width="15%"></th>
                                </tr>
                                </thead>
                            </table>




                            <form name="checkoutForm" method="post" action="indexeds.php">
                                <div id="item-list"></div>
                            </form>
                            <!--  <div id="total"></div>  -->
                            <!-- <a href="" onclick="document.forms.checkoutForm.submit(); return false;" class="button">Checkout</a> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red" href="#defaultModal">

            <i class="large material-icons" data-toggle="tooltip" data-placement="left" title="Guardar Cambios" href="" onclick="document.forms.checkoutForm.submit(); return false;" class="button" >save</i>
        </a>
    </div>

    <!-- #END# Colored Card - With Loading -->

    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Registrar Ciclo</h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <fieldset>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Nombre del Ciclo" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" class="form-control" placeholder="Nivel" />
                                </div>
                            </div>

                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="color: blue;" class="btn btn-link waves-effect">Enviar</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
    </div>




    </div>
</section>

<!-- Jquery Core Js -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdn.css.net/files/jquery.simpletip/1.3.1/jquery.simpletip-1.3.1.pack.js"></script>
<link href="plugins/animate-css/animate.css" rel="stylesheet" />

<script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>

<script>
    var nItems = 0;
    var purchased = new Array();
    var totalprice = 0;

    $(document).ready(function() {


        $(".item div").draggable({

            containment: 'document',
            opacity: 0.6,
            revert: 'invalid',
            helper: 'clone',
            zIndex: 100

        });

        $("div.content.drop-box").droppable({

            drop: function(e, ui) {
                var param 	= ($(ui.draggable).attr("id"));
                var pro 	= ($(ui.draggable).find('p:eq(3)').html());
                var ciclo 	= ($(ui.draggable).find('p:eq(5)').html());
                var aulas 	= ($(ui.draggable).find('p:eq(6)').html());

                addlist(param,pro,ciclo,aulas);

            }

        });

    });


    function addlist(param,pro,ciclo,aulas) {

        if (nItems < 5){

            $.ajax({
                type: "POST",
                url: "js/cart.php",
                action: "checkout.php?action=lol",
                data: {
                    idAs: param,
                    description: pro,
                    ciclo: ciclo,
                    aulas: aulas,
                    lol: nItems,

                },

                dataType: 'json',
                success: function(msg) {

                    if (parseInt(msg.status) != 1) {
                        return false;
                    } else {
                        var check = false;
                        var cnt = false;

                        for (var i = 0; i < purchased.length; i++) {
                            if (purchased[i].idAs == msg.idAs) {
                                check = true;
                                cnt = purchased[i].cnt;

                                break;
                            }
                        }

                        if (!cnt)
                            $('#item-list').append(msg.txt);

                        if (!check) {
                            purchased.push({
                                idAs: msg.idAs,
                                cnt: 1,
                                description: msg.price
                            });

                        } else {
                            if (cnt >= 1) {
                                alert("Esta ya esta");
                                return false;
                            }

                            purchased[i].cnt++;
                            $('#' + msg.idAs + '_cnt').val(purchased[i].cnt);
                        }


                        nItems++;
                    }



                }
            });



        }else{
            alert("Error Numero de Item Excedidos");
            return false;
        }


    }

    function findpos(idAs) {
        for (var i = 0; i < purchased.length; i++) {
            if (purchased[i].idAs == idAs)
                return i;
        }

        return false;
    }

    function remove(idAs) {
        var i = findpos(idAs);

        totalprice -= purchased[i].price * purchased[i].cnt;
        purchased[i].cnt = 0;

        $('#table_' + idAs).remove();
        nItems--;
    }


</script>
<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Wait Me Plugin Js -->
<script src="plugins/waitme/waitMe.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/cards/colored.js"></script>
<script src="js/pages/ui/tooltips-popovers.js"></script>


<!-- Demo Js -->
<script src="js/demo.js"></script>
</body>
</html>

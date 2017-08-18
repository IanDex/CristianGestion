<?php
require 'pages/config.php';
if(empty($_SESSION['name'])){
    header('Location: pages/loginx.php');}
if(isset($_POST['login'])) {
if($_SESSION['pass']==$_POST['relog']) {
    header('Location: index.php');
}}
?>
<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 1.0
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Lock Screen Page | Materialize - Material Design Admin Template</title>

    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->

    <link href="css/icons/cyrillic-ext.css" rel="stylesheet" type="text/css">
    <link href="css/icons/Material+Icons.css" rel="stylesheet" type="text/css">

    <!-- CORE CSS-->

    <link href="css/mat.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/sty.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">

</head>

<body class="cyan">
<!-- Start Page Loading -->
<!-- End Page Loading -->



<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">

            <div class="row">
                <div class="input-field col s12 center">
                    <img src="images/user.jpg" alt="" class="circle responsive-img valign profile-image-login">
                    <h4 class="header"><?php echo $_SESSION['name'] .' '. $_SESSION['app']?></h4>
                </div>
            </div>
        <form action="" method="post">
        <div class="row margin">
                <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>

                        <input id="relog" value="<?php if(isset($_POST['relog'])) echo $_POST['relog'] ?>" name="relog" type="password">
                    <label for="password">Contraseña</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">

                    <button class="btn waves-effect waves-light col s12"type="submit" name='login' value="Login">Login</button>
                </div>

            </div>
        </form>
        <div class="row">
                <div class="input-field col s6 m6 l6">
                    <p class="margin medium-small"><a href="pages/logout.php">Cerrar Sesion!</a></p>
                </div>
                <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small"><a href="page-forgot-password.html">Olvidaste tu Contraseña?</a></p>
                </div>
            </div>


    </div>
</div>



<!-- ================================================
  Scripts
  ================================================ -->

<!-- jQuery Library -->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<!--materialize js-->
<script type="text/javascript" src="js/materialize.js"></script>
<!--prism-->
<script type="text/javascript" src="js/prism.js"></script>
<!--scrollbar-->
<script type="text/javascript" src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="js/plugins.js"></script>

</body>

</html>
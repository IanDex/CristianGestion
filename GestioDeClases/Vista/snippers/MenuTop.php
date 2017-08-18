<nav class="navbar">

    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="index.php"><?php echo $_SESSION['tipo'];?> - Gestion de Clases</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

                <!-- Call Search -->
                <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                <!-- #END# Call Search -->
                <!-- Notifications -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">settings</i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="perfilE.php"><i class="material-icons">person</i>Perfil</a></li>
                        <li role="seperator" class="divider"></li>
                        <!--a href="../Controlador/ProfesoresCtlr.php?action=CerrarSession">Cerrar Session</a-->

                        <li><a href="../Controlador/ProfesoresCtlr.php?action=CerrarSession"><i class="material-icons">input</i>Cerrar Sesion</a></li>
                    </ul>
                </li>
                <!-- #END# Notifications -->
                <!-- Tasks -->

                <!-- #END# Tasks -->
                <li style="margin-bottom: 12px" class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
            </ul>
        </div>
    </div>
</nav>
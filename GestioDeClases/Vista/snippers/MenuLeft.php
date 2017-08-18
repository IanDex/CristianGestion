<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->

    <div class="user-info">
        <div class="image">
            <img src="<?php echo $_SESSION['foto'];?>" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'] .' '. $_SESSION['app']?></div>
            <div class="email"><?php echo $_SESSION['tipo'];?></div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="pages/logout.php"><i class="material-icons">person</i>Perfil</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a href="yavuelvo.php"><i class="material-icons">sentiment_neutral</i>Ya Vuelvo</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a href="pages/logout.php"><i class="material-icons">input</i>Cerrar Sesion</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">Menu de Navegacion</li>
            <li >
                <a href="index.php">
                    <i class="material-icons">home</i>
                    <span>Inicio</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">wc</i>
                    <span>Profesores</span>
                </a>
                <ul class="ml-menu">

                            <li>
                                <a href="Profe.php">Registrar</a>
                            </li>
                            <li>
                                <a href="verprofe.php">Ver</a>
                            </li>
                </ul>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">group_add</i>
                    <span>Estudiantes</span>
                </a>
                <ul class="ml-menu">

                            <li>
                                <a href="Estudiantes.php">Registrar</a>
                            </li>
                            <li>
                                <a href="vereds.php">Ver</a>
                            </li>
                </ul>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">person_add</i>
                    <span>Administradores</span>
                </a>
                <ul class="ml-menu">

                            <li>
                                <a href="Admin.php">Registrar</a>
                            </li>
                            <li>
                                <a href="verAd.php">Ver</a>
                            </li>
                </ul>

            </li>
            <li class="header"></li>

            <li>
                <a href="verciclos.php" class="menu-toggle">
                    <i class="material-icons">add_circle</i>
                    <span>Ciclos</span>
                </a>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">details</i>
                    <span>Programas</span>
                </a>
                <ul class="ml-menu">

                   +
                    <li>
                        <a href="verprog.php">Ver</a>
                    </li>
                </ul>
                <a href="verAula.php" class="menu-toggle">
                    <i class="material-icons">border_outer</i>
                    <span>Aulas</span>
                </a>



                <a href="verAsig.php" class="menu-toggle">
                    <i class="material-icons">book</i>
                    <span>Asignaturas</span>
                </a>



            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- #Footer -->


</aside>



<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="<?php echo $_SESSION['foto'];?>" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'] .' '. $_SESSION['app']?></div>
            <div class="email"><?php echo $_SESSION['tipo'];?></div>

        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">Menu de Navegacion</li>
            <li >
                <a href="verH.php">
                    <i class="material-icons">home</i>
                    <span>Inicio</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">wc</i>
                    <span>Horario</span>
                </a>
                <ul class="ml-menu">

                    <li>
                        <a href="verH.php">Ver</a>
                    </li>
                    <li>
                        <a href="horario.php">Inscribir Materias</a>
                    </li>
                </ul>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">group_add</i>
                    <span>Profesores</span>
                </a>
                <ul class="ml-menu">

                    <li>
                        <a href="cardpro.php">Ver</a>
                    </li>

                </ul>





        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">

        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
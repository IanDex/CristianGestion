<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="<?php echo $_SESSION['foto'];?>" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'] .' '. $_SESSION['app']?></div>
            <div class="email"><?php echo $_SESSION['email'];?></div>
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


                <a href="card.php" ">
                    <i class="material-icons">wc</i>
                    <span>Ver Estudiantes</span>
                </a>
                <a href="verno.php" >
                    <i class="material-icons">save</i>
                    <span>Ver Notas</span>
                </a>





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
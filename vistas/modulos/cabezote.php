<header class="main-header">

    <!--==============================
    LOGOTIPO
    ===============================-->
    <a href="#" class="logo">

        <!-- logo mini -->
        <span class="logo-mini">
            <img src="vistas/img/plantilla/icono-blanco.png" class="img-responsive" style="padding:10px" alt="Logo Chico">
        </span>

        <!-- logo normal -->
        <span class="logo-lg">
            <img src="vistas/img/plantilla/logo.png" class="img-responsive" style="padding:10px 10px" alt="Logo Chico">
        </span>

    </a>

    <!--==============================
    BARRA DE NAVEGACION
    ===============================-->
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- Perfil Usuario -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php

                            if ($_SESSION["foto"] != "") {
                                echo '<img src="'.$_SESSION["foto"].'" class="user-image" alt="Foto Perfil">';
                            }else{
                                echo '<img src="vistas/img/usuarios/default/usuario.png" class="user-image" alt="Foto Perfil">';
                            }

                        ?>
                        <span class="hidden-xs"> <?php echo $_SESSION["nombre"]?> </span>
                    </a>

                    <!-- Dropdown-toggle -->
                    <ul class="dropdown-menu">
                        <li class="user-body">
                            <div class="pull-right">
                                <a href="salir" class="btn btn-default btn-flat"> Salir </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>

</header>
<div class="main-header">
    <div class="logo-header">
        <a class="profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="../images/logos.png"
                alt="user-img" width="36" class="img-circle"></a>
        <a href="panelDeControl.php" class="logo">
            LAB FISC
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
    </div>
    <nav class="navbar navbar-header navbar-expand-lg">
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img
                            src="../images/<?php echo $row['foto']?>" alt="user-img" width="36"
                            class="img-circle"><span><?php echo $row['nombre']." ".$row['apellido'];?></span></a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <div class="user-box">
                                <div class="u-img"><img src="../images/<?php echo $row['foto']?>" alt="user"></div>
                                <div class="u-text">
                                    <h4><?php echo $row['nombre']." ".$row['apellido'];?></h4>
                                    <p class="text-muted"><?php echo $row['cedula'];?></p>
                                    <p class="text-muted"><?php echo $row['correo'];?></p>
                                    <a href="panelDeControl.php" class="btn btn-rounded btn-danger btn-sm">Ver
                                        Perfil</a>
                                </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li><a class="dropdown-item" href="panelDeControl.php"><i class="ti-user"></i> Mi Perfil</a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li><a class="dropdown-item" href="../backend/salir.php"><i class="fa fa-power-off"></i> Cerrar
                                Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
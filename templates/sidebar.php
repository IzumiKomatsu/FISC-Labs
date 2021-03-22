<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <!--USUARIO EN EL MENU LATERAL-->
        <div class="user">
            <div class="photo">
                <img src="../images/<?php echo $row['foto']?>" alt="">
            </div>
            <div class="info">
                <a class="" data-toggle="collapse" href="#collapseExample">
                    <span>
                        <?php echo $row['nombre']." ".$row['apellido'];?>
                        <span class="user-level"><?php echo $row['tipo']?></span>
                    </span>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
        <!--MENU-->
        <ul class="nav">
            <?php
				if(isset($row['tipo']) && $row['tipo'] == 'Estudiante')
			{?>
            <!--MENU PARA ESTUDIANTES-->
            <li class="nav-item">
                <a href="#">
                    <p>MENU ESTUDIANTES</p>
                </a>
            </li>
            <li class="nav-item active">
                <a href="panelDeControl.php">
                    <i class="la la-university"></i>
                    <p>Inicio</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="reservarLabs.php">
                    <i class="la la-calendar-check-o"></i>
                    <p>Reservar Laboratorios</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="verReservas.php">
                    <i class="la la-list-alt"></i>
                    <p>Mis Reservas</p>
                </a>
            </li>
            <?php } else if(isset($row['tipo']) && $row['tipo'] == 'Operador')
							{?>
            <!--MENU PARA OPERADORES-->
            <li class="nav-item">
                <a href="#">
                    <p>MENU OPERADORES</p>
                </a>
            </li>
            <li class="nav-item active">
                <a href="panelDeControl.php">
                    <i class="la la-university"></i>
                    <p>Inicio</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="reservarLabs.php">
                    <i class="la la-calendar-check-o"></i>
                    <p>Reservar Laboratorios</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="listaReservas.php">
                    <i class="la la-list-alt"></i>
                    <p>Lista de Reservas</p>
                </a>
            </li>
            <?php } else if(isset($row['tipo']) && $row['tipo'] == 'Docente')
							{?>
            <!--MENU PARA DOCENTES-->
            <li class="nav-item">
                <a href="#">
                    <p>MENU DOCENTES</p>
                </a>
            </li>
            <li class="nav-item active">
                <a href="panelDeControl.php">
                    <i class="la la-university"></i>
                    <p>Inicio</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="reservarLabs.php">
                    <i class="la la-calendar-check-o"></i>
                    <p>Reservar Laboratorios</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="verReservas.php">
                    <i class="la la-list-alt"></i>
                    <p>Mis Reservas</p>
                </a>
            </li>
            <?php } else if(isset($row['tipo']) && $row['tipo'] == 'Administrador')
							{?>
            <!--MENU PARA ADMINISTRADORES-->
            <li class="nav-item">
                <a href="#">
                    <p>MENU ADMINISTRADORES</p>
                </a>
            </li>
            <li class="nav-item active">
                <a href="panelDeControl.php">
                    <i class="la la-university"></i>
                    <p>Inicio</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="agregarUsuarios.php">
                    <i class="la la-user-plus"></i>
                    <p>Agregar Usuarios</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="verListaUsuarios.php">
                    <i class="la la-users"></i>
                    <p>Ver Usuarios</p>
                </a>
            </li>
            <?php } ?>
            <br><br><br>
        </ul>
    </div>
</div>
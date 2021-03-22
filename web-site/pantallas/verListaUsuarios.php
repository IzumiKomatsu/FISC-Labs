<?php
	include("../backend/verificar.php");
	include("../backend/consultaUsuario.php");
	include("../backend/consultarTodosUsuarios.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("../templates/head.php"); ?> <!-- head -->
        <title>Lista de Usuarios</title>
    </head>
    <body>
        <div class="wrapper">
            <?php include("../templates/navbar.php"); ?> <!-- navbar -->
            <?php include("../templates/sidebar.php"); ?> <!-- sidebar -->

            <!-- Contenido de Lista de Usuarios -->
            <div class="main-panel">
                <div class="content">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="panelDeControl.php">Laboratorio FISC</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Lista de Usuarios</li>
                            </ol>
                        </nav>
                        <form action="actualizarUsuarios.php">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title text-center">Usuarios del Sistema</div>
                                            <div>
                                                <?php
                                                        if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
                                                        {
                                                            echo "<div style='color:#B9181F'><b>Hubo un error. Intente otra vez.</b></div>";
                                                        }
                                                        else if(isset($_GET["falloEl"]) && $_GET["falloEl"] == 'true')
                                                        {
                                                            echo "<div style='color:#B9181F'><b>Hubo un error. Intente otra vez.</b></div>";
                                                        }
                                                        else if(isset($_GET["falloA"]) && $_GET["falloA"] == 'true')
                                                        {
                                                            echo "<div style='color:#B9181F'><b>Hubo un error. Intente otra vez.</b></div>";
                                                        }
                                                        else if(isset($_GET["succA"]) && $_GET["succA"] == 'true')
                                                        {
                                                            echo "<div style='color:green'><b>¡Usuario actualizado correctamente!</b></div>";
                                                        }
                                                        else if(isset($_GET["succE"]) && $_GET["succE"] == 'true')
                                                        {
                                                            echo "<div style='color:green'><b>¡Usuario eliminado correctamente!</b></div>";
                                                        }
                                                    ?>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-head-bg-success"
                                                    id="tablausuarios">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Apellido</th>
                                                            <th>C&eacute;dula</th>
                                                            <th>Tipo de Usuario</th>
                                                            <th>Correo</th>
                                                            <th>Carrera</th>
                                                            <th>Facultad</th>
                                                            <th>Puesto</th>
                                                            <th>Opciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while($rowU = $resUsuarios->fetch()){ ?>
                                                        <tr>
                                                            <td><?php echo $rowU['nombre'];?></td>
                                                            <td><?php echo $rowU['apellido'];?></td>
                                                            <td><?php echo $rowU['cedula'];?></td>
                                                            <td><?php echo $rowU['tipo'];?></td>
                                                            <td><?php echo $rowU['correo'];?></td>
                                                            <td><?php echo $rowU['carrera'];?></td>
                                                            <td><?php echo $rowU['facultad'];?></td>
                                                            <td><?php echo $rowU['puesto'];?></td>
                                                            <td>
                                                                <a style="color: white;"
                                                                    href="eliminarUsuarios.php?data=<?= $rowU['correo'];?>"><button
                                                                        type="button"
                                                                        class="btn btn-danger btn-sm">Eliminar</button></a>
                                                                <a style="color: white;"
                                                                    href="actualizarUsuarios.php?data=<?= $rowU['correo'];?>"><button
                                                                        type="button"
                                                                        class="btn btn-info btn-sm">Actualizar</button></a>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end of container-fluid -->
                </div> <!-- end of content -->

                <!-- Footer -->
                <?php include("../templates/footer.php"); ?>
            </div> <!-- end of main-panel -->
        </div> <!-- end of wrapper -->
    </body>
    <?php include("../templates/scripts.php"); ?> <!-- scripts -->
</html>
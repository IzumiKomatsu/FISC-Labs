<?php
	include("../backend/verificar.php");
	include("../backend/consultaUsuario.php");

	if(isset($_REQUEST['data'])){
		$q = strval($_REQUEST['data']);
		$sqlUsuarioE = "SELECT * FROM usuarios WHERE correo = '$q'";
		$resUsuarioE = $conn->query($sqlUsuarioE);
	}else{
		echo '<meta http-equiv="refresh" content="0; url=../pantallas/verListaUsuarios.php?fallo=true">';
	}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("../templates/head.php"); ?> <!-- head -->
        <title>Eliminar Usuarios</title>
    </head>
    <body>
        <div class="wrapper">
            <?php include("../templates/navbar.php"); ?> <!-- navbar -->
            <?php include("../templates/sidebar.php"); ?> <!-- sidebar -->

            <!-- Contenido de Eliminar Usuarios -->
            <div class="main-panel">
                <div class="content">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="panelDeControl.php">Laboratorio FISC</a></li>
                                <li class="breadcrumb-item"><a href="verListaUsuarios.php">Lista de Usuarios</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Eliminar Usuarios</li>
                            </ol>
                        </nav>
                        <!-- <h4 class="page-title">Laboratorios FISC > Lista de Usuarios > Eliminar Usuario</h4> -->
                        <form action="../backend/procesarEliminarUsuario.php" method="GET">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title text-center">Eliminar Usuario</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <?php while($rows = $resUsuarioE->fetch()){?>

                                                <div class="col-md-6 text-center">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>ID:</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="idUser" name="idUser"
                                                            placeholder="ID Usuario" value="<?= $rows['id_usuario'];?>"
                                                            readonly>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>Nombre:</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                                            placeholder="Nombre" value="<?= $rows['nombre'];?>" readonly>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>Apellido:</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="apellido"
                                                            name="apellido" placeholder="Apellido"
                                                            value="<?= $rows['apellido'];?>" readonly>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>C&eacute;dula:</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="cedula" name="cedula"
                                                            placeholder="C&eacute;dula" value="<?= $rows['cedula'];?>"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 text-center">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>Correo:</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="correo" name="correo"
                                                            placeholder="Correo" value="<?= $rows['correo'];?>" readonly>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>Tipo de Usuario:</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="tipoUser"
                                                            name="tipoUser" placeholder="Tipo de Usuario"
                                                            value="<?= $rows['tipo'];?>" readonly>
                                                    </div>
                                                    <?php if($rows['tipo'] == "Estudiante") {?>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>Facultad:</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="facultad"
                                                            name="facultad" placeholder="Facultad"
                                                            value="<?= $rows['facultad'];?>" readonly>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>Carrera:</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="carrera" name="carrera"
                                                            placeholder="Carrera" value="<?= $rows['carrera'];?>" readonly>
                                                    </div>
                                                    <?php }elseif($rows['tipo'] == "Docente"){?>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>Facultad:</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="facultad"
                                                            name="facultad" placeholder="Facultad"
                                                            value="<?= $rows['facultad'];?>" readonly>
                                                    </div>
                                                    <?php }elseif($rows['tipo'] == "Operador"){?>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>Facultad:</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="facultad"
                                                            name="facultad" placeholder="Facultad"
                                                            value="<?= $rows['facultad'];?>" readonly>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>Carrera:</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="carrera" name="carrera"
                                                            placeholder="Carrera" value="<?= $rows['carrera'];?>" readonly>
                                                    </div>
                                                    <?php }elseif($rows['tipo'] == "Administrador"){?>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>Puesto:</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="puesto" name="puesto"
                                                            placeholder="Puesto" value="<?= $rows['puesto'];?>" readonly>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                        <div class="card-action text-center">
                                            <a style="color: white;" href="verListaUsuarios.php"><button type="button"
                                                    class="btn btn-danger btn-md">Cancelar</button></a>
                                            <button type="button" id="btnEliminar" class="btn btn-warning"
                                                onclick="eliminarUsuarioModal()" data-toggle="modal" data-target="#modalEliminar">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--------------------------------------------- Modal --------------------------------------------------->
                            <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog"
                                aria-labelledby="modalEliminar" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h6 class="modal-title"><i class="la la-user-times"></i> Eliminar Usuario</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center" id="infoModal">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cancelar</button>
                                            <input type="submit" class="btn btn-warning" value="Aceptar">
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end of modal -->
                        </form>
                    </div> <!-- end of container-fluid -->
                </div> <!-- end of content -->

                <!-- Footer -->
                <?php include("../templates/footer.php"); ?>  <!-- footer -->
            </div> <!-- end of main-panel -->
        </div> <!-- end of wrapper -->
    </body>
    <?php include("../templates/scripts.php"); ?> <!-- scripts -->
</html>
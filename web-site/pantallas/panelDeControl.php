<?php
	include("../backend/verificar.php");
	include("../backend/consultaUsuario.php")
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("../templates/head.php"); ?> <!-- head -->
        <title>LAB FISC</title>
    </head>
    <body>
        <div class="wrapper">
            <?php include("../templates/navbar.php"); ?> <!-- navbar -->
            <?php include("../templates/sidebar.php"); ?> <!-- sidebar -->

            <!-- Comiendo de Panel de Control -->
            <div class="main-panel">
                <div class="content">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><a href="panelDeControl.php">Laboratorio FISC</a></li>
                            </ol>
                        </nav>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title text-center h6"><b>Informaci&oacute;n Personal</b></div>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-5 text-center">
                                                <img src="../images/<?php echo $row['foto']?>" alt="Imagen-de-Usuario"
                                                    class="img-fluid rounded-circle" height="130" width="130">
                                                <div>
                                                    <br>
                                                    <h6>Nombre: <?php echo $row['nombre']." ".$row['apellido'];?></h6>
                                                    <h6>C&eacute;dula: <?php echo $row['cedula'];?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-7 text-center" style="padding-bottom: 3%;">
                                                <!-- <h5><b>Informaci&oacute;n Personal</b></h5> -->
                                                <!-- <hr> -->
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                                        <label><b>Correo:</b></label>
                                                    </div>
                                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                                        <?php echo $row['correo'];?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-12">
                                                        <label><b>Tipo de Usuario:</b></label>
                                                    </div>
                                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                                        <?php echo $row['tipo'];?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <?php if($row['tipo'] == "Administrador") {?>
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-5 col-sm-12">
                                                            <label><b>Puesto:</b></label>
                                                        </div>
                                                        <div class="col-lg-7 col-md-7 col-sm-12">
                                                            <?php echo $row['puesto'];?>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                <?php }else if($row['tipo'] == "Estudiante" || $row['tipo'] == "Operador") {?>
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-5 col-sm-12">
                                                            <label><b>Facultad:</b></label>
                                                        </div>
                                                        <div class="col-lg-7 col-md-7 col-sm-12">
                                                            <?php echo $row['facultad'];?>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-5 col-sm-12">
                                                            <label><b>Carrera:</b></label>
                                                        </div>
                                                        <div class="col-lg-7 col-md-7 col-sm-12">
                                                            <?php echo $row['carrera'];?>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                <?php }else if($row['tipo'] == "Docente") {?>
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-5 col-sm-12">
                                                            <label><b>Facultad:</b></label>
                                                        </div>
                                                        <div class="col-lg-7 col-md-7 col-sm-12">
                                                            <?php echo $row['facultad'];?>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                <?php } ?>
                                                
                                                <button type="button" class="btn btn-rounded btn-info btn-sm"
                                                    data-toggle="modal" data-target="#modalFoto">Editar Perfil</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end of container-fluid -->
                </div> <!-- end of content -->

                <!--------------------------------------------- Modal --------------------------------------------------->
                <div class="modal fade" id="modalFoto" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h6 class="modal-title"><i class="la la-camera-retro"></i> Editar Perfil</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="../backend/procesarCambiarFoto.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body text-center">
                                    <div class="form-group">
                                        <label for="FotoUsuario"><b>Seleccionar Foto:</b></label><br>
                                        <div>
                                            <img id="blah" src="../images/<?php echo $row['foto']?>" alt="Tu-Foto" class="text-center" height="150"
                                                width="150" /><br><br>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepared">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Subir Foto</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="foto" name="foto"
                                                    onchange="readURL(this);"><br>
                                                <label class="custom-file-label" for="inputGroupFile01">Seleccionar Foto</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password"><b>Cambiar Contrase&ntilde;a:</b></label><br>
                                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                            <input id="password" class="form-control" type="password" name="password"
                                                    placeholder="Nueva Contrase&ntilde;a">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <input type="submit" class="btn btn-success" value="Cambiar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end of modal -->

                <!--FOOTER-->
                <?php include("../templates/footer.php"); ?>
            </div> <!-- end of main-panel -->
        </div> <!-- end of wrapper -->
    </body>
    <?php include("../templates/scripts.php"); ?> <!-- scripts -->
</html>
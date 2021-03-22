<?php
	include("../backend/verificar.php");
	include("../backend/consultaUsuario.php");
	include("../backend/consultarReservaEspecifica.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("../templates/head.php"); ?> <!-- head -->
        <title>Ver Reserva</title>
    </head>
    <body>
        <div class="wrapper">
            <?php include("../templates/navbar.php"); ?> <!-- navbar -->
            <?php include("../templates/sidebar.php"); ?> <!-- sidebar -->
            <div class="main-panel">
                <div class="content">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="panelDeControl.php">Laboratorio FISC</a></li>
                                <li class="breadcrumb-item"><a href="listaReservas.php">Lista Reservas</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Reserva <?php echo $row2['cod_reserva'];?></li>
                            </ol>
                        </nav>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title text-center">Informaci&oacute;n del Usuario</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12 col-sm-12 text-center align-self-center" style="padding-bottom: 2%;">
                                                <img src="../images/<?php echo $row2['foto']?>" alt="img"
                                                    class="img-fluid rounded-circle" height="150" width="150">
                                            </div>
                                            <div class="col-md-8 text-center align-self-center" style="padding-bottom: 2%;">
                                                <label><b>Nombre: </b></label> <?php echo $row2['nombre']." ".$row2['apellido'];?>
                                                <hr>
                                                <label><b>C&eacute;dula: </b></label> <?php echo $row2['cedula'];?>
                                                <hr>
                                                <label><b>Correo: </b></label> <?php echo $row2['correo'];?>
                                                <hr>
                                                <label><b>Tipo de Usuario: </b></label> <?php echo $row2['tipo'];?>
                                                <hr>
                                                <?php if($row2['tipo'] == "Administrador") {?>
                                                    <label><b>Puesto: </b></label> <?php echo $row2['puesto'];?>
                                                <?php }else if($row2['tipo'] == "Estudiante" || $row2['tipo'] == "Operador") {?>
                                                    <label><b>Carrera: </b></label> <?php echo $row2['carrera'];?>
                                                    <hr>
                                                    <label><b>Facultad: </b></label> <?php echo $row2['facultad'];?>
                                                <?php }else if($row2['tipo'] == "Docente") {?>
                                                    <label><b>Facultad: </b></label> <?php echo $row2['facultad'];?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <div class="card-title">Detalles de la Reserva</div>
                                    </div>
                                    <div class="card-body text-center" id="detalles-de-reserva">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label><b>C&oacute;digo: </b></label>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <p><?php echo $row2['cod_reserva'];?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label><b>Laboratorio: </b></label>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <p><?php echo $row2['cod_lab'];?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label><b>D&iacute;a: </b></label>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <p><?php echo $row2['fecha'];?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label><b>Hora: </b></label>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <p><?php echo $row2['hora_inicio'] . " - " . $row2['hora_final'];?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label><b>Extras: </b></label>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <p><?php echo $row2['Tipo'];?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end of container-fluid -->
                </div> <!-- end of content -->

                <!-- Footer -->
                <?php include("../templates/footer.php"); ?>
            </div> <!-- end of main-panel -->
        </div> <!-- end of wrapper -->
    </body>
    <?php include("../templates/scripts.php"); ?> <!-- scripts -->
</html>
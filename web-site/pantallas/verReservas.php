<?php
	include("../backend/verificar.php");
	include("../backend/consultaUsuario.php");
	include("../backend/consultarReservas.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("../templates/head.php"); ?> <!-- head -->
        <title>Reservar Laboratorio</title>
    </head>

    <body>
        <div class="wrapper">
            <?php include("../templates/navbar.php"); ?> <!-- navbar -->
            <?php include("../templates/sidebar.php"); ?> <!-- sidebar -->

            <!-- Contenido de Ver reservas -->
            <div class="main-panel">
                <div class="content">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="panelDeControl.php">Laboratorio FISC</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Mis Reservas</li>
                            </ol>
                        </nav>

                        <?php
                            if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
                            {
                                echo "<div class='alert-edit' style='color:#B9181F;'><b>No se ha eliminado la reserva correctamente. Intente otra vez.</b></div>";
                            }
                            else if(isset($_GET["succ"]) && $_GET["succ"] == 'true')
                            {
                                echo "<div class='alert-edit' style='color:#709e07;'><b>¡Reserva eliminada correctamente!</b></div>";
                            }
                            else if(isset($_GET["succAct"]) && $_GET["succAct"] == 'true')
                            {
                                echo "<div class='alert-edit' style='color:#709e07;'><b>¡Reserva actualizada correctamente!</b></div>";
                            }
                        ?> <!-- end of alerts -->

                        <div class="row">
                            <div class="col-md-12">
                                <?php while ($row=$stmt->fetch()){ ?>
                                    <div class="card">
                                        <div class="card-header">
                                            <?php
                                                $timestamp = strtotime($row['fecha']);
                                                $fechaActual = new DateTime();

                                                $meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"); 
                                            ?>
                                            <div class="card-title">
                                                <b>Laboratorio <?php echo $row['cod_lab']; ?></b>
                                                
                                                <?php echo "<i> " . date("l", $timestamp) . ", " . date("d", $timestamp) . " de " . $meses[date("m", $timestamp)-1] . " de " . date("Y", $timestamp) . "</i>" ?>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    <label>Hora: <?php echo $row['hora_inicio'] . " - " . $row['hora_final'] ?> </label><br>
                                                    <label>Extras: <?php echo$row['tipo'];?> </label>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <img src="../images/barcode.png" width="100" height="100" alt="Imagen-de-reserva"><br>
                                                    <label> <?php echo $row['cod_reserva'];?> </label>
                                                </div>
                                                <?php 
                                                    if ($row['fecha'] >= $fechaActual->format('Y-m-d')){
                                                        echo '<div class="col-md-4 text-center">';
                                                        echo    '<div class="col-md-12 text-center">';
                                                        echo        '<a href="actualizarReserva.php?a='.$row['cod_reserva'].'" class="btn btn-info">Actualizar</a>';
                                                        echo    '</div>';
                                                        echo    '<br>';
                                                        echo    '<div class="col-md-12 text-center">';
                                                        echo        '<a onclick="confirmacion(event)" href="../backend/eliminarReserva.php?a='.$row['cod_reserva'].'" id="btnEliminar" class="btn btn-danger eliminar">Eliminar</a>';
                                                        echo    '</div>';
                                                        echo '</div>';
                                                    } else {
                                                        echo '<div class="col-md-4 text-center">';
                                                        echo '<p class="text-danger">Vencido</p>';
                                                        echo '<a onclick="confirmacion(event)" href="../backend/eliminarReserva.php?a='.$row['cod_reserva'].'" id="btnEliminar" class="btn btn-danger eliminar">Eliminar</a>';
                                                        echo '</div>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div> 
                    </div> <!-- end of container-fluid -->
                </div> <!-- end of content -->

                <!--------------------------------------------- Modal --------------------------------------------------->
                <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h6 class="modal-title"><i class="la la-calendar-times-o"></i> Eliminar Reserva</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="form-signin" method="GET" action="" enctype="multipart/form-data">
                            <div class="modal-body text-center">									
                                <p>&#191;Desea eliminar la reserva:</p>
                                <input type="text" id="codigoModal" readonly>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Aceptar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end of modal -->

                <!-- Footer -->
                <?php include("../templates/footer.php"); ?>
            </div> <!-- end of main-panel -->
        </div> <!-- end of wrapper -->
    </body>
    <?php include("../templates/scripts.php"); ?> <!-- scripts -->
</html>
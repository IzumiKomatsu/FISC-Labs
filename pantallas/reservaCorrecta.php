<?php
	include("conexion.php");
	include("../backend/verificar.php");
	include("../backend/consultaUsuario.php");

	$a = $_GET['a'];

	$sql1 = "SELECT DISTINCT l.tipo as 'tipo1', l.pc_disp, r.cod_reserva, r.cod_lab, r.fecha, 
				h.hora_inicio, h.hora_final,
				GROUP_CONCAT(CASE 
						WHEN re.cod_extras IS NOT NULL
							THEN (SELECT e.tipo
								FROM extras AS e
										WHERE re.cod_extras=e.cod_extras)
							ELSE 'Ninguno'
					END) tipo2
					FROM horarios AS h INNER JOIN reservas AS r 
                  	ON h.cod_horario = r.cod_horario INNER JOIN laboratorios AS l 
                  	ON r.cod_lab = l.cod_lab INNER JOIN reservas_extras AS re
                  	ON re.cod_reserva=r.cod_reserva	
			WHERE r.cod_reserva='$a'";		 
		$stmt1 = $conn->prepare($sql1);
			$stmt1->execute();
				$row1=$stmt1->fetch();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Reservar Laboratorio</title>
        <?php include("../templates/head.php"); ?> <!-- head -->
    </head>
    <body>
        <div class="wrapper">
            <?php include("../templates/navbar.php"); ?> <!-- navbar -->
            <?php include("../templates/sidebar.php"); ?> <!-- sidebar -->
            
            <!-- Contenido de Reserva Correcta / Realizada -->
            <div class="main-panel">
                <div class="content">
                    <div class="container-fluid">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="panelDeControl.php">Laboratorio FISC</a></li>
                            <li class="breadcrumb-item"><a href="reservarLabs.php">Reservar Laboratorio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reserva Realizada</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title text-center"><b>Laboratorio <?php echo $row1['cod_lab']; ?>
                                                reservado correctamente</b></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 text-center align-self-center" style="padding-bottom: 2%;">
                                                <img src="../images/nice.png" width="150" height="150" alt="Imagen-gancho-exitoso">
                                            </div>
                                            <div class="col-md-6 text-center align-self-center">
                                                <?php
                                                    $timestamp = strtotime($row1['fecha']);
                                                    $meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"); 
                                                ?>
                                                <span><b>D&iacute;a:
                                                    </b><?php echo "<i> " . date("l", $timestamp) . ", " . date("d", $timestamp) . " de " . $meses[date("m", $timestamp)-1] . " de " . date("Y", $timestamp) . "</i>"; ?></span><br>
                                                <span><b>Hora: </b>
                                                    <?php echo $row1['hora_inicio'] . " - " . $row1['hora_final']; ?></span><br>
                                                <span><b>Tipo de laboratorio: </b><?php echo $row1['tipo1']; ?> </span><br>
                                                <span><b>Computadoras disponibles: </b><?php echo $row1['pc_disp']; ?> </span><br>
                                                <span><b>Extras: </b><?php echo $row1['tipo2']; ?> </span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 text-center align-self-center" style="padding-bottom: 2%;">
                                                <img src="../images/barcode.png" width="150" height="150"
                                                    alt="Imagen-de-reserva">
                                            </div>
                                            <div class="col-md-4 text-center align-self-center h6">
                                                <span><b>C&oacute;digo de reserva: </b><?php echo $a; ?> </span>
                                            </div>
                                            <div class="col-md-4 text-center align-self-center">
                                                <a href="panelDeControl.php"
                                                    class="btn btn-success boton-especial">Regresar a Inicio</a>
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
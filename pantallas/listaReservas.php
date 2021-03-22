<?php
	include("../backend/verificar.php");
	include("../backend/consultaUsuario.php");
	include("../backend/consultarListaReservas.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("../templates/head.php"); ?> <!-- head -->
    <title>Lista de Reservas</title>
</head>

<body>
    <div class="wrapper">
        <?php include("../templates/navbar.php"); ?> <!-- navbar -->
        <?php include("../templates/sidebar.php"); ?> <!-- sidebar -->
        
        <!-- Contenido de Ver Lista de Reservas -->
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="panelDeControl.php">Laboratorio FISC</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lista de Reservas</li>
                    </ol>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title text-center">Lista de Reservas</div>
                                    <?php
                                        if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
                                        {
                                            echo "<div style='color:#B9181F;'><b>No se ha eliminado la reserva correctamente. Intente otra vez.</b></div>";
                                        }
                                        else if(isset($_GET["succ"]) && $_GET["succ"] == 'true')
                                        {
                                            echo "<div style='color:#709e07;'><b>¡Reserva eliminada correctamente!</b></div>";
                                        }
                                        else if(isset($_GET["succAct"]) && $_GET["succAct"] == 'true')
                                        {
                                            echo "<div style='color:#709e07;'><b>¡Reserva actualizada correctamente!</b></div>";
                                        }
                                    ?>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-head-bg-success">
                                            <thead>
                                                <tr>
                                                    <th>C&oacute;digo</th>
                                                    <th>D&iacutea</th>
                                                    <th>Hora</th>
                                                    <th>Sal&oacute;n</th>
                                                    <th>Extras</th>
                                                    <th>C&eacute;dula</th>
                                                    <th>Encargado</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row1=$stmt->fetch()){ ?>
                                                    <tr>
                                                        <th scope="row"><a href=""
                                                                style="color: black;"><?php echo $row1['cod_reserva'];?></a>
                                                        </th>
                                                        <td>
                                                            <?php
                                                                            echo $row1['fecha'];
                                                            ?>
                                                        </td>
                                                        <td><?php echo $row1['hora_inicio'] . " - " . $row1['hora_final'];?>
                                                        </td>
                                                        <td><?php echo $row1['cod_lab']; ?></td>
                                                        <td>
                                                            <?php 
                                                                            if (!empty($row1['Tipo'])){
                                                                                echo$row1['Tipo'];
                                                                            } else {
                                                                                echo 'Ninguno';
                                                                            }
                                                                        ?>
                                                        </td>
                                                        <td><?php echo $row1['cedula']; ?></td>
                                                        <td><?php echo $row1['nombre'] . " " . $row1['apellido'];?></td>
                                                        <td>
                                                            <?php if ($row1['cedula']==$row['cedula']){?>
                                                            <?php 
                                                                                $fechaActual = new DateTime();
                                                                                if ($row1['fecha'] >= $fechaActual->format('Y-m-d')){
                                                                                    echo '<a href="actualizarReserva.php?a='.$row1['cod_reserva'].'" class="btn btn-info btn-sm">Actualizar</a><br>';
                                                                                    echo '<a onclick="confirmacion(event)" href="../backend/eliminarReserva.php?a='.$row1['cod_reserva'].'" id="btnEliminar" class="btn btn-danger btn-sm eliminar">Eliminar</a>';
                                                                                } else {
                                                                                    echo '<p class="text-danger">Vencido</p>';
                                                                                }
                                                                            ?>
                                                            <?php }?>
                                                            <a style="color: white;"
                                                                href="reservaEspecifica.php?data=<?php echo $row1['cod_reserva'];?>"><button
                                                                    type="button" class="btn btn-success btn-sm">Ver
                                                                    M&aacute;s</button></a>
                                                        </td>
                                                    </tr>
                                                    <!--------------------------------------------- Modal --------------------------------------------------->
                                                    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-info">
                                                                    <h6 class="modal-title"><i
                                                                            class="la la-calendar-times-o"></i> Eliminar
                                                                        Reserva</h6>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form class="form-signin" method="GET"
                                                                    action="../backend/eliminarReservaOP.php"
                                                                    enctype="multipart/form-data">
                                                                    <div class="modal-body text-center">
                                                                        <p>&#191;Desea eliminar la reserva:</p>
                                                                        <input type="text" name="codigo" id="codigo"
                                                                            value="<?php echo $row1['cod_reserva'];?>"
                                                                            readonly>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-dismiss="modal">Cancelar</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success">Aceptar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!--end of container-fluid-->
            </div> <!--end of content-->
            
            <!-- Footer -->
            <?php include("../templates/footer.php"); ?>
        </div> <!--end of main-panel-->
    </div> <!--end of wrapper-->
    
</body>
<?php include("../templates/scripts.php"); ?> <!-- scripts -->
<!--<script>
$('#displayNotif').on('click', function() {
    var placementFrom = $('#notify_placement_from option:selected').val();
    var placementAlign = $('#notify_placement_align option:selected').val();
    var state = $('#notify_state option:selected').val();
    var style = $('#notify_style option:selected').val();
    var content = {};

    content.message = 'Turning standard Bootstrap alerts into "notify" like notifications';
    content.title = 'Bootstrap notify';
    if (style == "withicon") {
        content.icon = 'la la-bell';
    } else {
        content.icon = 'none';
    }
    content.url = 'index.html';
    content.target = '_blank';

    $.notify(content, {
        type: state,
        placement: {
            from: placementFrom,
            align: placementAlign
        },
        time: 1000,
    });
});
</script>-->

</html>
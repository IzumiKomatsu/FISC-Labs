<?php
	include("../backend/verificar.php");
	include("../backend/consultaUsuario.php");
	include("../backend/consultarExtras.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("../templates/head.php"); ?> <!-- head -->
        <title>Reservar Laboratorio</title>
    </head>
    <body>
        <form action="../backend/procesarReserva.php" method="GET">
            <div class="wrapper">
                <?php include("../templates/navbar.php"); ?> <!-- navbar -->
                <?php include("../templates/sidebar.php"); ?> <!-- sidebar -->

                <!-- Contenido de Reservar Laboratorios -->
                <div class="main-panel">
                    <div class="content">
                        <div class="container-fluid">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="panelDeControl.php">Laboratorio FISC</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Reservar Laboratorio</li>
                                </ol>
                            </nav>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title text-center">Datos de la Reserva</div>
                                            <div>
                                                <?php
                                                    if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
                                                    {
                                                        echo "<div style='color:#B9181F'><b>No se ha realizado la reserva correctamente. Intente otra vez.</b></div>";
                                                    }
                                                    else if(isset($_GET["succ"]) && $_GET["succ"] == 'true')
                                                    {
                                                        echo "<div style='color:green'><b>¡Reserva realizada correctamente!</b></div>";
                                                    }
                                                    else if(isset($_GET["err"]) && $_GET["err"] == 'true')
                                                    {
                                                        echo "<div style='color:#EF5705'><b>Ya existe una reserva para el día, hora y salón seleccionado. Intente otra vez.</b></div>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form">
                                                <div class="form-group from-show-notify row">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 text-left">
                                                        <label><b>Sal&oacute;n </b></label>
                                                    </div>
                                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                                        <select class="form-control input-fixed" id="laboratorios"
                                                            name="laboratorios" onchange="codLab(this.value)">
                                                            <?php 
                                                                        $sqlLabs = "SELECT cod_lab FROM laboratorios";
                                                                        $resLabs = $conn->query($sqlLabs);?>
                                                            <option value="">seleccionar</option>
                                                            <?php 	while($rows = $resLabs->fetch()){ ?>
                                                            <option value="<?php echo $rows['cod_lab'];?>">
                                                                <?php echo $rows['cod_lab'];?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group from-show-notify row">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 text-left">
                                                        <label><b>Fecha </b></label>
                                                    </div>
                                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                                        <input type="date" class="form-control input-fixed"
                                                            id="fechaReserva" name="fechaReserva" min="2021-03-01"
                                                            max="2021-12-31" onchange="fecha(this.value)">
                                                    </div>
                                                </div>
                                                <div class="form-group from-show-notify row">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 text-left">
                                                        <label><b>Hora </b></label>
                                                    </div>
                                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                                        <select class="form-control input-fixed" id="horasDisponibles"
                                                            name="horaReserva">
                                                            <option value="">seleccionar</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group from-show-notify row">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 text-left">
                                                        <label><b>Laptop </b></label>
                                                    </div>
                                                    <div class="col-lg-6 col-md-9 col-sm-12">
                                                        <div class="form-check" id="laptopsReserva">
                                                            <label class="form-radio-label">
                                                                <input class="form-radio-input" type="radio" name="radio"
                                                                    value="03">
                                                                <span class="form-radio-sign">S&iacute;</span>
                                                            </label>
                                                            <label class="form-radio-label">
                                                                <input class="form-radio-input" type="radio" name="radio"
                                                                    value="05" checked="">
                                                                <span class="form-radio-sign">No</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if(isset($row['tipo']) && $row['tipo'] == 'Docente'){ ?>
                                                <div class="form-group from-show-notify row">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 text-left">
                                                        <label><b>Extras </b></label>
                                                    </div>
                                                    <div class="col-lg-6 col-md-9 col-sm-12">
                                                        <p class="demo" name="extrasReserva">
                                                            <?php 
                                                                        while($rowsE = $resExtras->fetch()){
                                                                    ?>
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="extrasReserva" name="extras[]"
                                                                    value="<?php echo $rowsE['cod_extras']; ?>">
                                                                <span
                                                                    class="form-check-sign"><?php echo $rowsE['tipo']; ?></span>
                                                            </label>
                                                            <?php } ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card" id="infoLab" style="display:none;">
                                        <div class="card-header">
                                            <div class="card-title  text-center">Informaci&oacute;n del Laboratorio</div>
                                        </div>
                                        <div class="card-body" id="descripcionLab" style="display:none;">
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title  text-center">Realizar Reserva</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-danger"
                                                        id="btnCancelar" onclick="limpiarCamposReserva()">Cancelar</button>
                                                    <button type="button" class="btn btn-success"
                                                        id="realizaReserva" onclick="abrirAceptarModal()" data-toggle="modal" 
                                                        data-target="#modalAceptar">Aceptar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                        </div> <!-- end of container-fluid -->
                    </div> <!-- end of content -->

                    <!--------------------------------------------- Modal --------------------------------------------------->
                    <div class="modal fade" id="modalAceptar" tabindex="-1" role="dialog" aria-labelledby="modalAceptar"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h6 class="modal-title"><i class="la la-calendar-check-o"></i> Reservar Laboratorio</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center" id="infoModal">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <input type="submit" class="btn btn-success" value="Aceptar" id="aceptarReserva"
                                        style="display:none;">
                                </div>
                            </div>
                        </div>
                    </div> <!-- end of modalAceptar -->

                    <!--FOOTER-->
                    <?php include("../templates/footer.php"); ?>
                </div> <!-- end of main-panel -->
            </div> <!-- end of wrapper -->
        </form>
    </body>
    <?php include("../templates/scripts.php"); ?> <!-- scripts -->
</html>
<?php
	include("../backend/verificar.php");
	include("../backend/consultaUsuario.php");
	include("../backend/consultarLaboratorios.php");
	include("../backend/consultarHorarios.php");
	include("../backend/consultarHorariosMartes.php");
	include("../backend/consultarHorasHorarios.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("../templates/head.php"); ?>
    <title>Horarios de Laboratorios</title>

    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
    function verClases(str) {
        if (str == "") {
            document.getElementById("tabla").innerHTML = "<?php echo '<p>Algo está pasando mal</p>' ?>";
            return;
        }
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("tabla").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "../backend/consultarHorarios.php?h=" + str, true);
        xmlhttp.send();
    }
    </script>
</head>

<body>
    <div class="wrapper">
        <?php include("../templates/navbar.php"); ?>
        <?php include("../templates/sidebar.php"); ?>

        <!--Estos hay que ponerlos porque sino no sale el último item
						<br><br><br>

						QUEDARA PARA UTILIZARSE DE GUIA PARA CAMBIOS FUTUROS-->
        <li class="nav-item">
            <a href="#">
                <p>EJEMPLOS/GUIA</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../templates/index2.html">
                <i class="la la-dashboard"></i>
                <p>Dashboard</p>
                <span class="badge badge-count">5</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="../templates/components.html">
                <i class="la la-table"></i>
                <p>Components</p>
                <span class="badge badge-count">14</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="../templates/forms.html">
                <i class="la la-keyboard-o"></i>
                <p>Forms</p>
                <span class="badge badge-count">50</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="../templates/tables.html">
                <i class="la la-th"></i>
                <p>Tables</p>
                <span class="badge badge-count">6</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="../templates/notifications.html">
                <i class="la la-bell"></i>
                <p>Notifications</p>
                <span class="badge badge-success">3</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="../templates/typography.html">
                <i class="la la-font"></i>
                <p>Typography</p>
                <span class="badge badge-danger">25</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="../templates/icons.html">
                <i class="la la-fonticons"></i>
                <p>Icons</p>
            </a>
        </li>
        <li class="nav-item update-pro">
            <button data-toggle="modal" data-target="#modalUpdate">
                <i class="la la-hand-pointer-o"></i>
                <p>Update To Pro</p>
            </button>
        </li>
        <br><br><br>
        </ul>
    </div>
    </div>

    <!--CONTENIDO DE VER HORARIOS DE LAB-->
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title">Laboratorios FISC > Horarios de Laboratorios</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Horarios de Laboratorios</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="smallSelect">Laboratorio</label>
                                    <select class="form-control form-control-sm" id="smallSelect"
                                        onchange="verClases(this.value)">
                                        <option value="">Seleccione un laboratorio...</option>
                                        <?php while($rows1=$stmt1->fetch()){
                                                    	echo '<option value="' . $rows1['cod_lab'] . '">' . $rows1['cod_lab'] . '</option>';
													} ?>
                                    </select>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-head-bg-success" id="">
                                        <thead>
                                            <tr>
                                                <th id="hora">Hora</th>
                                                <th id="monday">Lunes</th>
                                                <th id="tuesday">Martes</th>
                                                <th id="wednesday">Mi&eacute;rcoles</th>
                                                <th id="thursday">Jueves</th>
                                                <th id="friday">Viernes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row2=$stmt2->fetch()){ ?>
                                            <tr>
                                                <th scope="row"><a href=""
                                                        style="color: black;"><?php echo $row2['Horas'];?></a></th>
                                                <td>
                                                    <?php 
																		if ($row2['dia_semana']=='Monday'){
																			echo $row2['descripcion'];
																		}
																	?>
                                                </td>
                                                <td>
                                                    <?php 
																		if ($row2['dia_semana']=='Tuesday'){
																			echo $row2['descripcion'];
																		}
																	?>
                                                </td>
                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Computadoras:</label>&thinsp;<label>30</label><br>
                                            <label>Computadoras Disponibles:</label>&thinsp;<label>15</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Tipo de Laboratorio:</label>&thinsp;<label>Arquitectura y Sistemas
                                                Operativos</label><br>
                                            <label>Proyector Disponible:</label>&thinsp;<label>No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--FOOTER-->
        <?php include("../templates/footer.php"); ?>
    </div>
    </div>
</body>
<script src="../assets/js/core/bootstrap.min.js"></script>

</html>
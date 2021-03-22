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
    <title>Actualizar Usuarios</title> 
</head>

<body>
    <div class="wrapper">
        <?php include("../templates/navbar.php"); ?> <!-- navbar -->
        <?php include("../templates/sidebar.php"); ?> <!-- sidebar -->

        <!-- Contenido de Actualizar Usuarios -->
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="panelDeControl.php">Laboratorio FISC</a></li>
                            <li class="breadcrumb-item"><a href="verListaUsuarios.php">Lista de Usuarios</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Actualizar Usuarios</li>
                        </ol>
                    </nav>
                    
                    <form action="../backend/procesarActualizarUsuarios.php" method="GET">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title text-center">Actualizar Usuario</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php while($rows = $resUsuarioE->fetch()){?>
                                            <div class="col-md-6">
                                                <!-- <img src="../images/<?php echo $row['foto']?>" alt="img"
                                                    class="img-fluid rounded-circle" height="400" width="400"> -->
                                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                    <label><b>ID:</b></label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        value="<?= $rows['id_usuario'];?>" disabled>
                                                </div>
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
                                                    <input type="text" class="form-control" value="<?= $rows['tipo'];?>"
                                                        disabled>
                                                </div>
                                                <?php if($rows['tipo'] == "Estudiante") {?>
                                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                    <label><b>Facultad:</b></label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        value="<?= $rows['facultad'];?>" disabled>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                    <label><b>Carrera:</b></label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        value="<?= $rows['carrera'];?>" disabled>
                                                </div>
                                                <?php }elseif($rows['tipo'] == "Docente"){?>
                                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                    <label><b>Facultad:</b></label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        value="<?= $rows['facultad'];?>" disabled>
                                                </div>
                                                <?php }elseif($rows['tipo'] == "Operador"){?>
                                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                    <label><b>Facultad:</b></label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        value="<?= $rows['facultad'];?>" disabled>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                    <label><b>Carrera:</b></label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        value="<?= $rows['carrera'];?>" disabled>
                                                </div>
                                                <?php }elseif($rows['tipo'] == "Administrador"){?>
                                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                    <label><b>Puesto:</b></label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        value="<?= $rows['puesto'];?>" disabled>
                                                </div>
                                                <?php }?>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                    <label><b>Nombre:</b></label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                        placeholder="Nombre" value="<?= $rows['nombre'];?>">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                    <label><b>Apellido:</b></label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="apellido"
                                                        name="apellido" placeholder="Apellido"
                                                        value="<?= $rows['apellido'];?>">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                    <label><b>C&eacute;dula:</b></label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="cedula" name="cedula"
                                                        placeholder="C&eacute;dula" value="<?= $rows['cedula'];?>">
                                                </div>
                                                

                                                <!--Tipo de Usuario-->
                                                <div class="form-group from-show-notify row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>Cambiar Tipo de usuario:</b></label>
                                                    </div>
                                                    <div class="form-check" id="TipoUsuarios">
                                                        <?php if($rows['tipo'] == "Estudiante") {?>
                                                        <label class="form-radio-label">
                                                            <input class="form-radio-input" type="radio" name="radio"
                                                                value="Estudiante"
                                                                onclick="Desplegar('Facultad'); Desplegar('FISC'); Contraer('Puesto'); Contraer('FacultadProf')"
                                                                checked>
                                                            <span class="form-radio-sign">Estudiante</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="radio"
                                                                value="Docente"
                                                                onclick="Desplegar('FacultadProf'); Contraer('FISC'); Contraer('Puesto'); Contraer('Facultad')">
                                                            <span class="form-radio-sign">Docente</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="radio"
                                                                value="Operador"
                                                                onclick="Desplegar('Facultad'); Desplegar('FISC'); Contraer('Puesto'); Contraer('FacultadProf')">
                                                            <span class="form-radio-sign">Operador</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="radio"
                                                                value="Administrador"
                                                                onclick="Contraer('Facultad'); Contraer('FISC'); Desplegar('Puesto'); Contraer('FacultadProf')">
                                                            <span class="form-radio-sign">Administrador</span>
                                                        </label>
                                                        <?php }elseif($rows['tipo'] == "Docente"){?>
                                                        <label class="form-radio-label">
                                                            <input class="form-radio-input" type="radio" name="radio"
                                                                value="Estudiante"
                                                                onclick="Desplegar('Facultad'); Desplegar('FISC'); Contraer('Puesto'); Contraer('FacultadProf')">
                                                            <span class="form-radio-sign">Estudiante</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="radio"
                                                                value="Docente"
                                                                onclick="Desplegar('FacultadProf'); Contraer('FISC'); Contraer('Puesto'); Contraer('Facultad')"
                                                                checked>
                                                            <span class="form-radio-sign">Docente</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="radio"
                                                                value="Operador"
                                                                onclick="Desplegar('Facultad'); Desplegar('FISC'); Contraer('Puesto'); Contraer('FacultadProf')">
                                                            <span class="form-radio-sign">Operador</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="radio"
                                                                value="Administrador"
                                                                onclick="Contraer('Facultad'); Contraer('FISC'); Desplegar('Puesto'); Contraer('FacultadProf')">
                                                            <span class="form-radio-sign">Administrador</span>
                                                        </label>
                                                        <?php }elseif($rows['tipo'] == "Operador"){?>
                                                        <label class="form-radio-label">
                                                            <input class="form-radio-input" type="radio" name="radio"
                                                                value="Estudiante"
                                                                onclick="Desplegar('Facultad'); Desplegar('FISC'); Contraer('Puesto'); Contraer('FacultadProf')">
                                                            <span class="form-radio-sign">Estudiante</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="radio"
                                                                value="Docente"
                                                                onclick="Desplegar('FacultadProf'); Contraer('FISC'); Contraer('Puesto'); Contraer('Facultad')">
                                                            <span class="form-radio-sign">Docente</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="radio"
                                                                value="Operador"
                                                                onclick="Desplegar('Facultad'); Desplegar('FISC'); Contraer('Puesto'); Contraer('FacultadProf')"
                                                                checked>
                                                            <span class="form-radio-sign">Operador</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="radio"
                                                                value="Administrador"
                                                                onclick="Contraer('Facultad'); Contraer('FISC'); Desplegar('Puesto'); Contraer('FacultadProf')">
                                                            <span class="form-radio-sign">Administrador</span>
                                                        </label>
                                                        <?php }elseif($rows['tipo'] == "Administrador"){?>
                                                        <label class="form-radio-label">
                                                            <input class="form-radio-input" type="radio" name="radio"
                                                                value="Estudiante"
                                                                onclick="Desplegar('Facultad'); Desplegar('FISC'); Contraer('Puesto'); Contraer('FacultadProf')">
                                                            <span class="form-radio-sign">Estudiante</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="radio"
                                                                value="Docente"
                                                                onclick="Desplegar('FacultadProf'); Contraer('FISC'); Contraer('Puesto'); Contraer('Facultad')">
                                                            <span class="form-radio-sign">Docente</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="radio"
                                                                value="Operador"
                                                                onclick="Desplegar('Facultad'); Desplegar('FISC'); Contraer('Puesto'); Contraer('FacultadProf')">
                                                            <span class="form-radio-sign">Operador</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="radio"
                                                                value="Administrador"
                                                                onclick="Contraer('Facultad'); Contraer('FISC'); Desplegar('Puesto'); Contraer('FacultadProf')"
                                                                checked>
                                                            <span class="form-radio-sign">Administrador</span>
                                                        </label>
                                                        <?php }?>
                                                    </div>
                                                </div>

                                                <div id="Facultad" style="display:none;">
                                                    <div class="form-group">
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label><b>Cambiar Facultad:</b></label>
                                                        </div>
                                                        <select class="form-control" name="Facultades" id="facultades"
                                                            onchange="Seleccionado(this);">
                                                            <option value="FISC"
                                                                <?php if($rows['facultad'] == 'Facultad de Ingenier&iacutea de Sistemas Computacionales'): ?>
                                                                selected="selected" <?php endif; ?>>
                                                                Facultad de Ingenier&iacute;a de Sistemas
                                                                Computacionales
                                                            </option>
                                                            <option value="FIC"
                                                                <?php if($rows['facultad'] == 'Facultad de Ingenier&iacutea Civil'): ?>
                                                                selected="selected" <?php endif; ?>>
                                                                Facultad de Ingenier&iacute;a Civil
                                                            </option>
                                                            <option value="FIE"
                                                                <?php if($rows['facultad'] == 'Facultad de Ingenier&iacutea El&eacutectrica'): ?>
                                                                selected="selected" <?php endif; ?>>
                                                                Facultad de Ingenier&iacute;a El&eacute;ctrica
                                                            </option>
                                                            <option value="FII"
                                                                <?php if($rows['facultad'] == 'Facultad de Ingenier&iacutea Industrial'): ?>
                                                                selected="selected" <?php endif; ?>>
                                                                Facultad de Ingenier&iacute;a Industrial
                                                            </option>
                                                            <option value="FIM"
                                                                <?php if($rows['facultad'] == 'Facultad de Ingenier&iacutea Mec&aacutenica'): ?>
                                                                selected="selected" <?php endif; ?>>
                                                                Facultad de Ingenier&iacute;a Mec&aacute;nica
                                                            </option>
                                                            <option value="FCyT"
                                                                <?php if($rows['facultad'] == 'Facultad de Ciencias y Tecnolog&iacutea'): ?>
                                                                selected="selected" <?php endif; ?>>
                                                                Facultad de Ciencias y Tecnolog&iacute;a
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div id="FacultadProf" style="display:none;">
                                                    <div class="form-group">
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label><b>Cambiar Facultad:</b></label>
                                                        </div>
                                                        <select class="form-control" name="FacultadesProf"
                                                            id="facultadesProf" onchange="Seleccionado(this);">
                                                            <option
                                                                <?php if($rows['facultad'] == 'Facultad de Ingenier&iacutea de Sistemas Computacionales'): ?>
                                                                selected="selected" <?php endif; ?>
                                                                value="Facultad de Ingenier&iacutea de Sistemas Computacionales">
                                                                Facultad de Ingenier&iacutea de Sistemas Computacionales
                                                            </option>
                                                            <option
                                                                <?php if($rows['facultad'] == 'Facultad de Ingenier&iacutea Civil'): ?>
                                                                selected="selected" <?php endif; ?>
                                                                value="Facultad de Ingenier&iacutea Civil">Facultad de
                                                                Ingenier&iacutea Civil</option>
                                                            <option
                                                                <?php if($rows['facultad'] == 'Facultad de Ingenier&iacutea El&eacutectrica'): ?>
                                                                selected="selected" <?php endif; ?>
                                                                value="Facultad de Ingenier&iacutea El&eacutectrica">
                                                                Facultad de Ingenier&iacutea El&eacutectrica</option>
                                                            <option
                                                                <?php if($rows['facultad'] == 'Facultad de Ingenier&iacutea Industrial'): ?>
                                                                selected="selected" <?php endif; ?>
                                                                value="Facultad de Ingenier&iacutea Industrial">Facultad
                                                                de Ingenier&iacutea Industrial</option>
                                                            <option
                                                                <?php if($rows['facultad'] == 'Facultad de Ciencias y Tecnolog&iacutea'): ?>
                                                                selected="selected"
                                                                <?php endif; ?>value="Facultad de Ingenier&iacutea Mec&aacutenica">
                                                                Facultad de Ingenier&iacutea Mec&aacutenica</option>
                                                            <option
                                                                <?php if($rows['facultad'] == 'Facultad de Ciencias y Tecnolog&iacutea'): ?>
                                                                selected="selected" <?php endif; ?>
                                                                value="Facultad de Ciencias y Tecnolog&iacutea">Facultad
                                                                de Ciencias y Tecnolog&iacutea</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div id="Carrera">
                                                    <div id="FISC" style="display:none;">
                                                        <div class="form-group">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <label><b>Cambiar Carrera FISC:</b></label>
                                                            </div>
                                                            <select class="form-control" name="CarreraFISC"
                                                                id="carreraFISC">
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea de Sistemas de Informaci&oacuten'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea de Sistemas de Informaci&oacuten">
                                                                    Licenciatura en Ingenier&iacutea de Sistemas de
                                                                    Informaci&oacuten</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea de Sistemas y Computaci&oacuten'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea de Sistemas y Computaci&oacuten">
                                                                    Licenciatura en Ingenier&iacutea de Sistemas y
                                                                    Computaci&oacuten</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea de Software'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea de Software">
                                                                    Licenciatura en Ingenier&iacutea de Software
                                                                </option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Desarrollo de Software'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Desarrollo de Software">
                                                                    Licenciatura en Desarrollo de Software</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Redes Inform&aacuteticas'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Redes Inform&aacuteticas">
                                                                    Licenciatura en Redes Inform&aacuteticas</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Inform&aacutetica Aplicada a la Educaci&oacuten'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Inform&aacutetica Aplicada a la Educaci&oacuten">
                                                                    Licenciatura en Inform&aacutetica Aplicada a la
                                                                    Educaci&oacuten</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'T&eacutecnico en Inform&aacutetica para la Gesti&oacuten Empresarial'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="T&eacutecnico en Inform&aacutetica para la Gesti&oacuten Empresarial">
                                                                    T&eacutecnico en Inform&aacutetica para la
                                                                    Gesti&oacuten Empresarial</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div id="FIC" style="display:none;">
                                                        <div class="form-group">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <label><b>Cambiar Carrera FIC:</b></label>
                                                            </div>
                                                            <select class="form-control" name="CarreraFIC">
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea Ambiental'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea Ambiental">
                                                                    Licenciatura en Ingenier&iacutea Ambiental</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea Civil'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea Civil">
                                                                    Licenciatura en Ingenier&iacutea Civil</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea Geom&aacutetica'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea Geom&aacutetica">
                                                                    Licenciatura en Ingenier&iacutea Geom&aacutetica
                                                                </option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea Mar&iacutetima Portuaria'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea Mar&iacutetima Portuaria">
                                                                    Licenciatura en Ingenier&iacutea Mar&iacutetima
                                                                    Portuaria</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea Geol&oacutegica'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea Geol&oacutegica">
                                                                    Licenciatura en Ingenier&iacutea Geol&oacutegica
                                                                </option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Operaciones Mar&iacutetimas y Portuarias'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Operaciones Mar&iacutetimas y Portuarias">
                                                                    Licenciatura en Operaciones Mar&iacutetimas y
                                                                    Portuarias</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Dibujo Automatizado'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Dibujo Automatizado">
                                                                    Licenciatura en Dibujo Automatizado</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Edificaciones'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Edificaciones">Licenciatura
                                                                    en Edificaciones</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Saneamiento y Ambiente'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Saneamiento y Ambiente">
                                                                    Licenciatura en Saneamiento y Ambiente</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Topograf&iacutea'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Topograf&iacutea">
                                                                    Licenciatura en Topograf&iacutea</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div id="FIE" style="display:none;">
                                                        <div class="form-group">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <label><b>Cambiar Carrera FIE:</b></label>
                                                            </div>
                                                            <select class="form-control" name="CarreraFIE">
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea El&eacutectrica y Electr&oacutenica'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea El&eacutectrica y Electr&oacutenica">
                                                                    Licenciatura en Ingenier&iacutea El&eacutectrica y
                                                                    Electr&oacutenica</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea El&eacutectrica'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea El&eacutectrica">
                                                                    Licenciatura en Ingenier&iacutea El&eacutectrica
                                                                </option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea Electr&oacutenica'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea Electr&oacutenica">
                                                                    Licenciatura en Ingenier&iacutea Electr&oacutenica
                                                                </option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea Electromec&aacutenica'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea Electromec&aacutenica">
                                                                    Licenciatura en Ingenier&iacutea
                                                                    Electromec&aacutenica</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea en Telecomunicaciones'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea en Telecomunicaciones">
                                                                    Licenciatura en Ingenier&iacutea en
                                                                    Telecomunicaciones</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea Electr&oacutenica y Telecomunicaciones'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea Electr&oacutenica y Telecomunicaciones">
                                                                    Licenciatura en Ingenier&iacutea Electr&oacutenica y
                                                                    Telecomunicaciones</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea de Control y Automatizaci&oacuten'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea de Control y Automatizaci&oacuten">
                                                                    Licenciatura en Ingenier&iacutea de Control y
                                                                    Automatizaci&oacuten</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Electr&oacutenica y Sistemas de Comunicaci&oacuten'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Electr&oacutenica y Sistemas de Comunicaci&oacuten">
                                                                    Licenciatura en Electr&oacutenica y Sistemas de
                                                                    Comunicaci&oacuten</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Sistemas El&eacutectricos y Automatizaci&oacuten'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Sistemas El&eacutectricos y Automatizaci&oacuten">
                                                                    Licenciatura en Sistemas El&eacutectricos y
                                                                    Automatizaci&oacuten</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'T&eacutecnico en Ingenier&iacutea con especializaci&oacuten en Autotr&oacutenica'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="T&eacutecnico en Ingenier&iacutea con especializaci&oacuten en Autotr&oacutenica">
                                                                    T&eacutecnico en Ingenier&iacutea con
                                                                    especializaci&oacuten en Autotr&oacutenica</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'T&eacutecnico en Ingenier&iacutea con especializaci&oacuten en Electr&oacutenica Biom&eacutedica'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="T&eacutecnico en Ingenier&iacutea con especializaci&oacuten en Electr&oacutenica Biom&eacutedica">
                                                                    T&eacutecnico en Ingenier&iacutea con
                                                                    especializaci&oacuten en Electr&oacutenica
                                                                    Biom&eacutedica</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'T&eacutecnico en Ingenier&iacutea con especializaci&oacuten en Sistemas El&eacutectricos'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="T&eacutecnico en Ingenier&iacutea con especializaci&oacuten en Sistemas El&eacutectricos">
                                                                    T&eacutecnico en Ingenier&iacutea con
                                                                    especializaci&oacuten en Sistemas El&eacutectricos
                                                                </option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'T&eacutecnico en Ingenier&iacutea con especializaci&oacuten en Telecomunicaciones'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="T&eacutecnico en Ingenier&iacutea con especializaci&oacuten en Telecomunicaciones">
                                                                    T&eacutecnico en Ingenier&iacutea con
                                                                    especializaci&oacuten en Telecomunicaciones</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div id="FII" style="display:none;">
                                                        <div class="form-group">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <label><b>Cambiar Carrera FII:</b></label>
                                                            </div>
                                                            <select class="form-control" name="CarreraFII">
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea Industrial'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea Industrial">
                                                                    Licenciatura en Ingenier&iacutea Industrial</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea Mec&aacutenica Industrial'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea Mec&aacutenica Industrial">
                                                                    Licenciatura en Ingenier&iacutea Mec&aacutenica
                                                                    Industrial</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea Log&iacutestica y Cadena de Suministro'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea Log&iacutestica y Cadena de Suministro">
                                                                    Licenciatura en Ingenier&iacutea Log&iacutestica y
                                                                    Cadena de Suministro</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Recursos Humanos y Gesti&oacuten de la Productividad'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Recursos Humanos y Gesti&oacuten de la Productividad">
                                                                    Licenciatura en Recursos Humanos y Gesti&oacuten de
                                                                    la Productividad</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Mercadeo y Comercio Internacional'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Mercadeo y Comercio Internacional">
                                                                    Licenciatura en Mercadeo y Comercio Internacional
                                                                </option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Mercadeo y Negocios Internacionales'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Mercadeo y Negocios Internacionales">
                                                                    Licenciatura en Mercadeo y Negocios Internacionales
                                                                </option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Gesti&oacuten Administrativa'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Gesti&oacuten Administrativa">
                                                                    Licenciatura en Gesti&oacuten Administrativa
                                                                </option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Gesti&oacuten de la Producci&oacuten Industrial'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Gesti&oacuten de la Producci&oacuten Industrial">
                                                                    Licenciatura en Gesti&oacuten de la Producci&oacuten
                                                                    Industrial</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Log&iacutestica y Transporte Multimodal'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Log&iacutestica y Transporte Multimodal">
                                                                    Licenciatura en Log&iacutestica y Transporte
                                                                    Multimodal</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div id="FIM" style="display:none;">
                                                        <div class="form-group">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <label><b>Cambiar Carrera FIM:</b></label>
                                                            </div>
                                                            <select class="form-control" name="CarreraFIM">
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea Mec&aacutenica'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea Mec&aacutenica">
                                                                    Licenciatura en Ingenier&iacutea Mec&aacutenica
                                                                </option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea de Mantenimiento'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea de Mantenimiento">
                                                                    Licenciatura en Ingenier&iacutea de Mantenimiento
                                                                </option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea de Energ&iacutea y Ambiente'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea de Energ&iacutea y Ambiente">
                                                                    Licenciatura en Ingenier&iacutea de Energ&iacutea y
                                                                    Ambiente</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea Naval'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea Naval">
                                                                    Licenciatura en Ingenier&iacutea Naval</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea Aeron&aacuteutica'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea Aeron&aacuteutica">
                                                                    Licenciatura en Ingenier&iacutea Aeron&aacuteutica
                                                                </option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Administraci&oacuten de Aviaci&oacuten'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Administraci&oacuten de Aviaci&oacuten">
                                                                    Licenciatura en Administraci&oacuten de
                                                                    Aviaci&oacuten</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Administraci&oacuten de Aviaci&oacuten con opci&oacuten a vuelo'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Administraci&oacuten de Aviaci&oacuten con opci&oacuten a vuelo">
                                                                    Licenciatura en Administraci&oacuten de
                                                                    Aviaci&oacuten con opci&oacuten a vuelo</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Mec&aacutenica Automotriz'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Mec&aacutenica Automotriz">
                                                                    Licenciatura en Mec&aacutenica Automotriz</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Mec&aacutenica Industrial'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Mec&aacutenica Industrial">
                                                                    Licenciatura en Mec&aacutenica Industrial</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Refrigeraci&oacuten y Aire Acondicionado'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Refrigeraci&oacuten y Aire Acondicionado">
                                                                    Licenciatura en Refrigeraci&oacuten y Aire
                                                                    Acondicionado</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Soldadura'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Soldadura">Licenciatura en
                                                                    Soldadura</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'T&eacutecnico en Despacho de Vuelo'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="T&eacutecnico en Despacho de Vuelo">
                                                                    T&eacutecnico en Despacho de Vuelo</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'T&eacutecnico en Ingenier&iacutea de Mantenimiento de Aeronaves con especializaci&oacuten en Motores y Fuselajes'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="T&eacutecnico en Ingenier&iacutea de Mantenimiento de Aeronaves con especializaci&oacuten en Motores y Fuselajes">
                                                                    T&eacutecnico en Ingenier&iacutea de Mantenimiento
                                                                    de Aeronaves con especializaci&oacuten en Motores y
                                                                    Fuselajes</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div id="FCyT" style="display:none;">
                                                        <div class="form-group">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <label><b>Cambiar Carrera FCyT:</b></label>
                                                            </div>
                                                            <select class="form-control" name="CarreraFCyT">
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea en Alimentos'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea en Alimentos">
                                                                    Licenciatura en Ingenier&iacutea en Alimentos
                                                                </option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Ingenier&iacutea Forestal'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Ingenier&iacutea Forestal">
                                                                    Licenciatura en Ingenier&iacutea Forestal</option>
                                                                <option
                                                                    <?php if($rows['carrera'] == 'Licenciatura en Comunicaci&oacuten Ejecutiva Biling&uumle'): ?>
                                                                    selected="selected" <?php endif; ?>
                                                                    value="Licenciatura en Comunicaci&oacuten Ejecutiva Biling&uumle">
                                                                    Licenciatura en Comunicaci&oacuten Ejecutiva
                                                                    Biling&uumle</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="Puesto" style="display:none;">
                                                    <div class="form-group">
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <label><b>Cambiar Puesto:</b></label>
                                                        </div>
                                                        <select class="form-control" name="PuestoDITIC">
                                                            <option
                                                                <?php if($rows['puesto'] == 'Director General- DITIC">Director General- DITIC'): ?>
                                                                selected="selected" <?php endif; ?>
                                                                value="Director General- DITIC">Director General- DITIC
                                                            </option>
                                                            <option
                                                                <?php if($rows['puesto'] == 'Departamento de Redes y Telecomunicaciones- DITIC'): ?>
                                                                selected="selected" <?php endif; ?>
                                                                value="Departamento de Redes y Telecomunicaciones- DITIC">
                                                                Departamento de Redes y Telecomunicaciones- DITIC
                                                            </option>
                                                            <option
                                                                <?php if($rows['puesto'] == 'Autoridad de Certificación y Seguridad Informática- DITIC'): ?>
                                                                selected="selected" <?php endif; ?>
                                                                value="Autoridad de Certificación y Seguridad Informática- DITIC">
                                                                Autoridad de Certificación y Seguridad Informática-
                                                                DITIC</option>
                                                            <option
                                                                <?php if($rows['puesto'] == 'Departamento de Desarrollo de Sistemas de Información- DITIC'): ?>
                                                                selected="selected" <?php endif; ?>
                                                                value="Departamento de Desarrollo de Sistemas de Información- DITIC">
                                                                Departamento de Desarrollo de Sistemas de Información-
                                                                DITIC</option>
                                                            <option
                                                                <?php if($rows['puesto'] == 'Departamento de Soporte Técnico- DITIC'): ?>
                                                                selected="selected" <?php endif; ?>
                                                                value="Departamento de Soporte Técnico- DITIC">
                                                                Departamento de Soporte Técnico- DITIC</option>
                                                            <option
                                                                <?php if($rows['puesto'] == 'Departamento de Tecnología Web y Multimedia- DITIC'): ?>
                                                                selected="selected" <?php endif; ?>
                                                                value="Departamento de Tecnología Web y Multimedia- DITIC">
                                                                Departamento de Tecnología Web y Multimedia- DITIC
                                                            </option>
                                                            <option
                                                                <?php if($rows['puesto'] == 'Red Académica y de Investigación Nacional (PANNet) / NIC-Panamá'): ?>
                                                                selected="selected" <?php endif; ?>
                                                                value="Red Académica y de Investigación Nacional (PANNet) / NIC-Panamá">
                                                                Red Académica y de Investigación Nacional (PANNet) /
                                                                NIC-Panamá</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action text-center">
                                        <a style="color: white;" href="verListaUsuarios.php"><button type="button"
                                                class="btn btn-danger btn-md">Cancelar</button></a>
                                        <button type="button" id="btnActualizar" class="btn btn-success"
                                            onclick="actualizarUserModal()" data-toggle="modal" 
                                            data-target="#modalActualizar">Actualizar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--------------------------------------------- Modal --------------------------------------------------->
                        <div class="modal fade" id="modalActualizar" tabindex="-1" role="dialog"
                            aria-labelledby="modalActualizar" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h6 class="modal-title"><i class="la la-rotate-right"></i> Actualizar Usuario
                                        </h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center" id="infoModal">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">Cancelar</button>
                                        <input type="submit" class="btn btn-success" value="Aceptar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- end of container-fluid -->
            </div> <!-- end of content -->

            <!-- Footer -->
            <?php include("../templates/footer.php"); ?>
        </div>
    </div>
</body>
<?php include("../templates/scripts.php"); ?> <!-- scripts -->

</html>
<?php
	include("../backend/verificar.php");
	include("../backend/consultaUsuario.php")
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <?php include("../templates/head.php"); ?> <!-- head -->
        <title>Agregar Usuarios</title>
    </head>

    <body>
        <div class="wrapper">
            <?php include("../templates/navbar.php"); ?> <!-- navbar -->
            <?php include("../templates/sidebar.php"); ?> <!-- sidebar -->

            <!-- Contenido de Agregar Usuarios -->
            <div class="main-panel">
                <div class="content">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="panelDeControl.php">Laboratorio FISC</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Agregar Usuario</li>
                            </ol>
                        </nav>

                        <form action="../backend/procesarUsuario.php" method="GET">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title text-center">Agregar Usuario</div>
                                            <?php
                                                if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
                                                {
                                                    echo "<div style='color:#B9181F;'><b>Este usuario ya existe.</b></div>";
                                                }
                                                else if (isset($_GET["fallo"]) && $_GET["fallo"] == 'nada')
                                                {
                                                    echo "<div style='color:#B9181F'><b>Debe llenar todos los campos.</b></div>";
                                                }
                                                else if (isset($_GET["fallo"]) && $_GET["fallo"] == 'exito')
                                                {
                                                    echo "<div style='color:#709e07'><b>¡Usuario registrado exitosamente!</b></div>";
                                                }
                                            ?>
                                        </div>
                                        
                                        <div class="card-body">
                                            <div class="row">
                                                <!-- <div class="col-md-6 col-sm-4 text-center">
                                                    <img src="../images/<?php echo $row['foto']?>" alt="img"
                                                        class="img-fluid rounded-circle" height="400" width="400">
                                                </div> -->
                                                <div class="col-md-6 text-center">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>Nombre:</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                                            placeholder="Nombre" oninput="this.setCustomValidity('')"  oninvalid="this.setCustomValidity('Ingrese el nombre')" required>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>Apellido:</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="apellido"
                                                            name="apellido" placeholder="Apellido" oninput="this.setCustomValidity('')"  oninvalid="this.setCustomValidity('Ingrese el apellido')" required>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>C&eacute;dula:</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="cedula" name="cedula"
                                                            placeholder="C&eacute;dula" oninput="this.setCustomValidity('')"  oninvalid="this.setCustomValidity('Ingrese la cédula')" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 text-center">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <label><b>Tipo de usuario:</b></label>
                                                    </div>

                                                    <div class="form-check" id="TipoUsuarios">
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
                                                                onclick="Contraer('Facultad'); Contraer('FISC'); Desplegar('Puesto'); Contraer('FacultadProf')">
                                                            <span class="form-radio-sign">Administrador</span>
                                                        </label>
                                                    </div>

                                                    <div id="Facultad" style="display:none;">
                                                        <div class="form-group">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                                <label><b>Facultad:</b></label>
                                                            </div>
                                                            <select class="form-control" name="Facultades"
                                                                onchange="Seleccionado(this);">
                                                                <option value="FISC">Facultad de Ingenier&iacutea de
                                                                    Sistemas Computacionales</option>
                                                                <option value="FIC">Facultad de Ingenier&iacutea Civil
                                                                </option>
                                                                <option value="FIE">Facultad de Ingenier&iacutea
                                                                    El&eacutectrica</option>
                                                                <option value="FII">Facultad de Ingenier&iacutea Industrial
                                                                </option>
                                                                <option value="FIM">Facultad de Ingenier&iacutea
                                                                    Mec&aacutenica</option>
                                                                <option value="FCyT">Facultad de Ciencias y Tecnolog&iacutea
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div id="FacultadProf" style="display:none;">
                                                        <div class="form-group">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                                <label><b>Facultad:</b></label>
                                                            </div>
                                                            <select class="form-control" name="FacultadesProf"
                                                                onchange="Seleccionado(this);">
                                                                <option
                                                                    value="Facultad de Ingenier&iacutea de Sistemas Computacionales">
                                                                    Facultad de Ingenier&iacutea de Sistemas Computacionales
                                                                </option>
                                                                <option value="Facultad de Ingenier&iacutea Civil">Facultad
                                                                    de Ingenier&iacutea Civil</option>
                                                                <option
                                                                    value="Facultad de Ingenier&iacutea El&eacutectrica">
                                                                    Facultad de Ingenier&iacutea El&eacutectrica</option>
                                                                <option value="Facultad de Ingenier&iacutea Industrial">
                                                                    Facultad de Ingenier&iacutea Industrial</option>
                                                                <option value="Facultad de Ingenier&iacutea Mec&aacutenica">
                                                                    Facultad de Ingenier&iacutea Mec&aacutenica</option>
                                                                <option value="Facultad de Ciencias y Tecnolog&iacutea">
                                                                    Facultad de Ciencias y Tecnolog&iacutea</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div id="Carrera">
                                                        <div id="FISC" style="display:none;">
                                                            <div class="form-group">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                                    <label><b>Carrera FISC:</b></label>
                                                                </div>
                                                                <select class="form-control" name="CarreraFISC">
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea de Sistemas de Informaci&oacuten">
                                                                        Licenciatura en Ingenier&iacutea de Sistemas de
                                                                        Informaci&oacuten</option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea de Sistemas y Computaci&oacuten">
                                                                        Licenciatura en Ingenier&iacutea de Sistemas y
                                                                        Computaci&oacuten</option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea de Software">
                                                                        Licenciatura en Ingenier&iacutea de Software
                                                                    </option>
                                                                    <option value="Licenciatura en Desarrollo de Software">
                                                                        Licenciatura en Desarrollo de Software</option>
                                                                    <option
                                                                        value="Licenciatura en Redes Inform&aacuteticas">
                                                                        Licenciatura en Redes Inform&aacuteticas</option>
                                                                    <option
                                                                        value="Licenciatura en Inform&aacutetica Aplicada a la Educaci&oacuten">
                                                                        Licenciatura en Inform&aacutetica Aplicada a la
                                                                        Educaci&oacuten</option>
                                                                    <option
                                                                        value="T&eacutecnico en Inform&aacutetica para la Gesti&oacuten Empresarial">
                                                                        T&eacutecnico en Inform&aacutetica para la
                                                                        Gesti&oacuten Empresarial</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div id="FIC" style="display:none;">
                                                            <div class="form-group">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                                    <label><b>Carrera FIC:</b></label>
                                                                </div>
                                                                <select class="form-control" name="CarreraFIC">
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea Ambiental">
                                                                        Licenciatura en Ingenier&iacutea Ambiental</option>
                                                                    <option value="Licenciatura en Ingenier&iacutea Civil">
                                                                        Licenciatura en Ingenier&iacutea Civil</option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea Geom&aacutetica">
                                                                        Licenciatura en Ingenier&iacutea Geom&aacutetica
                                                                    </option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea Mar&iacutetima Portuaria">
                                                                        Licenciatura en Ingenier&iacutea Mar&iacutetima
                                                                        Portuaria</option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea Geol&oacutegica">
                                                                        Licenciatura en Ingenier&iacutea Geol&oacutegica
                                                                    </option>
                                                                    <option
                                                                        value="Licenciatura en Operaciones Mar&iacutetimas y Portuarias">
                                                                        Licenciatura en Operaciones Mar&iacutetimas y
                                                                        Portuarias</option>
                                                                    <option value="Licenciatura en Dibujo Automatizado">
                                                                        Licenciatura en Dibujo Automatizado</option>
                                                                    <option value="Licenciatura en Edificaciones">
                                                                        Licenciatura en Edificaciones</option>
                                                                    <option value="Licenciatura en Saneamiento y Ambiente">
                                                                        Licenciatura en Saneamiento y Ambiente</option>
                                                                    <option value="Licenciatura en Topograf&iacutea">
                                                                        Licenciatura en Topograf&iacutea</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div id="FIE" style="display:none;">
                                                            <div class="form-group">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                                    <label><b>Carrera FIE:</b></label>
                                                                </div>
                                                                <select class="form-control" name="CarreraFIE">
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea El&eacutectrica y Electr&oacutenica">
                                                                        Licenciatura en Ingenier&iacutea El&eacutectrica y
                                                                        Electr&oacutenica</option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea El&eacutectrica">
                                                                        Licenciatura en Ingenier&iacutea El&eacutectrica
                                                                    </option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea Electr&oacutenica">
                                                                        Licenciatura en Ingenier&iacutea Electr&oacutenica
                                                                    </option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea Electromec&aacutenica">
                                                                        Licenciatura en Ingenier&iacutea
                                                                        Electromec&aacutenica</option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea en Telecomunicaciones">
                                                                        Licenciatura en Ingenier&iacutea en
                                                                        Telecomunicaciones</option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea Electr&oacutenica y Telecomunicaciones">
                                                                        Licenciatura en Ingenier&iacutea Electr&oacutenica y
                                                                        Telecomunicaciones</option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea de Control y Automatizaci&oacuten">
                                                                        Licenciatura en Ingenier&iacutea de Control y
                                                                        Automatizaci&oacuten</option>
                                                                    <option
                                                                        value="Licenciatura en Electr&oacutenica y Sistemas de Comunicaci&oacuten">
                                                                        Licenciatura en Electr&oacutenica y Sistemas de
                                                                        Comunicaci&oacuten</option>
                                                                    <option
                                                                        value="Licenciatura en Sistemas El&eacutectricos y Automatizaci&oacuten">
                                                                        Licenciatura en Sistemas El&eacutectricos y
                                                                        Automatizaci&oacuten</option>
                                                                    <option
                                                                        value="T&eacutecnico en Ingenier&iacutea con especializaci&oacuten en Autotr&oacutenica">
                                                                        T&eacutecnico en Ingenier&iacutea con
                                                                        especializaci&oacuten en Autotr&oacutenica</option>
                                                                    <option
                                                                        value="T&eacutecnico en Ingenier&iacutea con especializaci&oacuten en Electr&oacutenica Biom&eacutedica">
                                                                        T&eacutecnico en Ingenier&iacutea con
                                                                        especializaci&oacuten en Electr&oacutenica
                                                                        Biom&eacutedica</option>
                                                                    <option
                                                                        value="T&eacutecnico en Ingenier&iacutea con especializaci&oacuten en Sistemas El&eacutectricos">
                                                                        T&eacutecnico en Ingenier&iacutea con
                                                                        especializaci&oacuten en Sistemas El&eacutectricos
                                                                    </option>
                                                                    <option
                                                                        value="T&eacutecnico en Ingenier&iacutea con especializaci&oacuten en Telecomunicaciones">
                                                                        T&eacutecnico en Ingenier&iacutea con
                                                                        especializaci&oacuten en Telecomunicaciones</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div id="FII" style="display:none;">
                                                            <div class="form-group">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                                    <label><b>Carrera FII:</b></label>
                                                                </div>
                                                                <select class="form-control" name="CarreraFII">
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea Industrial">
                                                                        Licenciatura en Ingenier&iacutea Industrial</option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea Mec&aacutenica Industrial">
                                                                        Licenciatura en Ingenier&iacutea Mec&aacutenica
                                                                        Industrial</option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea Log&iacutestica y Cadena de Suministro">
                                                                        Licenciatura en Ingenier&iacutea Log&iacutestica y
                                                                        Cadena de Suministro</option>
                                                                    <option
                                                                        value="Licenciatura en Recursos Humanos y Gesti&oacuten de la Productividad">
                                                                        Licenciatura en Recursos Humanos y Gesti&oacuten de
                                                                        la Productividad</option>
                                                                    <option
                                                                        value="Licenciatura en Mercadeo y Comercio Internacional">
                                                                        Licenciatura en Mercadeo y Comercio Internacional
                                                                    </option>
                                                                    <option
                                                                        value="Licenciatura en Mercadeo y Negocios Internacionales">
                                                                        Licenciatura en Mercadeo y Negocios Internacionales
                                                                    </option>
                                                                    <option
                                                                        value="Licenciatura en Gesti&oacuten Administrativa">
                                                                        Licenciatura en Gesti&oacuten Administrativa
                                                                    </option>
                                                                    <option
                                                                        value="Licenciatura en Gesti&oacuten de la Producci&oacuten Industrial">
                                                                        Licenciatura en Gesti&oacuten de la Producci&oacuten
                                                                        Industrial</option>
                                                                    <option
                                                                        value="Licenciatura en Log&iacutestica y Transporte Multimodal">
                                                                        Licenciatura en Log&iacutestica y Transporte
                                                                        Multimodal</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div id="FIM" style="display:none;">
                                                            <div class="form-group">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                                    <label><b>Carrera FIM:</b></label>
                                                                </div>
                                                                <select class="form-control" name="CarreraFIM">
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea Mec&aacutenica">
                                                                        Licenciatura en Ingenier&iacutea Mec&aacutenica
                                                                    </option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea de Mantenimiento">
                                                                        Licenciatura en Ingenier&iacutea de Mantenimiento
                                                                    </option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea de Energ&iacutea y Ambiente">
                                                                        Licenciatura en Ingenier&iacutea de Energ&iacutea y
                                                                        Ambiente</option>
                                                                    <option value="Licenciatura en Ingenier&iacutea Naval">
                                                                        Licenciatura en Ingenier&iacutea Naval</option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea Aeron&aacuteutica">
                                                                        Licenciatura en Ingenier&iacutea Aeron&aacuteutica
                                                                    </option>
                                                                    <option
                                                                        value="Licenciatura en Administraci&oacuten de Aviaci&oacuten">
                                                                        Licenciatura en Administraci&oacuten de
                                                                        Aviaci&oacuten</option>
                                                                    <option
                                                                        value="Licenciatura en Administraci&oacuten de Aviaci&oacuten con opci&oacuten a vuelo">
                                                                        Licenciatura en Administraci&oacuten de
                                                                        Aviaci&oacuten con opci&oacuten a vuelo</option>
                                                                    <option
                                                                        value="Licenciatura en Mec&aacutenica Automotriz">
                                                                        Licenciatura en Mec&aacutenica Automotriz</option>
                                                                    <option
                                                                        value="Licenciatura en Mec&aacutenica Industrial">
                                                                        Licenciatura en Mec&aacutenica Industrial</option>
                                                                    <option
                                                                        value="Licenciatura en Refrigeraci&oacuten y Aire Acondicionado">
                                                                        Licenciatura en Refrigeraci&oacuten y Aire
                                                                        Acondicionado</option>
                                                                    <option value="Licenciatura en Soldadura">Licenciatura
                                                                        en Soldadura</option>
                                                                    <option value="T&eacutecnico en Despacho de Vuelo">
                                                                        T&eacutecnico en Despacho de Vuelo</option>
                                                                    <option
                                                                        value="T&eacutecnico en Ingenier&iacutea de Mantenimiento de Aeronaves con especializaci&oacuten en Motores y Fuselajes">
                                                                        T&eacutecnico en Ingenier&iacutea de Mantenimiento
                                                                        de Aeronaves con especializaci&oacuten en Motores y
                                                                        Fuselajes</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div id="FCyT" style="display:none;">
                                                            <div class="form-group">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                                    <label><b>Carrera FCyT:</b></label>
                                                                </div>
                                                                <select class="form-control" name="CarreraFCyT">
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea en Alimentos">
                                                                        Licenciatura en Ingenier&iacutea en Alimentos
                                                                    </option>
                                                                    <option
                                                                        value="Licenciatura en Ingenier&iacutea Forestal">
                                                                        Licenciatura en Ingenier&iacutea Forestal</option>
                                                                    <option
                                                                        value="Licenciatura en Comunicaci&oacuten Ejecutiva Biling&uumle">
                                                                        Licenciatura en Comunicaci&oacuten Ejecutiva
                                                                        Biling&uumle</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="Puesto" style="display:none;">
                                                        <div class="form-group">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                                <label><b>Puesto:</b></label>
                                                            </div>
                                                            <select class="form-control" name="PuestoDITIC">
                                                                <option value="Director General- DITIC">Director General-
                                                                    DITIC</option>
                                                                <option
                                                                    value="Departamento de Redes y Telecomunicaciones- DITIC">
                                                                    Departamento de Redes y Telecomunicaciones- DITIC
                                                                </option>
                                                                <option
                                                                    value="Autoridad de Certificación y Seguridad Informática- DITIC">
                                                                    Autoridad de Certificación y Seguridad Informática-
                                                                    DITIC</option>
                                                                <option
                                                                    value="Departamento de Desarrollo de Sistemas de Información- DITIC">
                                                                    Departamento de Desarrollo de Sistemas de Información-
                                                                    DITIC</option>
                                                                <option value="Departamento de Soporte Técnico- DITIC">
                                                                    Departamento de Soporte Técnico- DITIC</option>
                                                                <option
                                                                    value="Departamento de Tecnología Web y Multimedia- DITIC">
                                                                    Departamento de Tecnología Web y Multimedia- DITIC
                                                                </option>
                                                                <option
                                                                    value="Red Académica y de Investigación Nacional (PANNet) / NIC-Panamá">
                                                                    Red Académica y de Investigación Nacional (PANNet) /
                                                                    NIC-Panamá</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-action text-center">
                                            <button type="button" class="btn btn-danger">Cancelar</button>
                                            <button type="submit" class="btn btn-success">Agregar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end of container-fluid -->
                </div> <!-- end of content -->

                <!--------------------------------------------- Modal --------------------------------------------------->
                <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="modalAgregar"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h6 class="modal-title"><i class="la la-plus-circle"></i> Añadir Usuario</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <p>&#191;Desea añadir a el usuario X con cedula X, correo X de tipo X?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="verListaUsuarios.php">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Aceptar</button>
                                </form>
                            </div>
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
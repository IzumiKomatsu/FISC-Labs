<?php
    include("conexion.php");
    include("enviarCorreo.php");

    if (isset($_REQUEST['nombre']) && isset($_REQUEST['apellido']) && isset($_REQUEST['cedula']) && isset($_REQUEST['radio']))
    {
        $nombrea=$_REQUEST['nombre'];
        $apellidoa=$_REQUEST['apellido'];
        $cedulaa=$_REQUEST['cedula'];
        $tipoUsuario=$_REQUEST['radio'];
        $facultad=$_REQUEST['Facultades'];
        $facultadprof=$_REQUEST['FacultadesProf'];
        $puesto=$_REQUEST['PuestoDITIC'];
        $foto="usuarios.png";

        $nombre=str_replace(' ','',$_REQUEST['nombre']);
        $apellido=str_replace(' ','',$_REQUEST['apellido']);
        $cedula=str_replace(' ','',$_REQUEST['cedula']);

        //GENERAMOS EL CORREO ELECTRONICO
        $correo=strtolower($nombre.".".$apellido);

        $i = 0;//Sufijo numero del correo
        $correo_inicial = $correo;
        $correo_encontrado = FALSE;

        $para_consultar_correo=$correo."@utp.ac.pa";

            $sql = "SELECT * 
                    FROM usuarios 
                    WHERE correo = '$para_consultar_correo'";

            $result = $conn->query($sql);
            $count = $result->rowCount();

            if ($count > 0) {
                $correo_usuario=$correo.$count."@utp.ac.pa";
            } else {
                $correo_usuario=$correo."@utp.ac.pa";
            }

        //GENERAMOS LA CONTRASEÑA
        $letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $contraa = "";
        
        //Reconstruimos la contraseña segun la longitud que se quiera
        for($i=0;$i<10;$i++) {
            //obtenemos un caracter aleatorio escogido de la cadena de caracteres
            $contraa .= substr($letras,rand(0,62),1);
        }

        $contra=md5($contraa);

        //VALIDAMOS EL VALOR DE LA FACULTAD PARA PONERLO EN EL NOMBRE COMPLETO YA QUE OBTENEMOS PREFIJOS
        if($facultad=="FISC"){
            $facultad_nombre="Facultad de Ingenier&iacutea de Sistemas Computacionales";
            $carrera=$_REQUEST['CarreraFISC'];
        } else if ($facultad=="FIC"){
            $facultad_nombre="Facultad de Ingenier&iacutea Civil";
            $carrera=$_REQUEST['CarreraFIC'];
        } else if ($facultad=="FIE"){
            $facultad_nombre="Facultad de Ingenier&iacutea El&eacutectrica";
            $carrera=$_REQUEST['CarreraFIE'];
        } else if ($facultad=="FII"){
            $facultad_nombre="Facultad de Ingenier&iacutea Industrial";
            $carrera=$_REQUEST['CarreraFII'];
        } else if ($facultad=="FIM"){
            $facultad_nombre="Facultad de Ingenier&iacutea Mec&aacutenica";
            $carrera=$_REQUEST['CarreraFIM'];
        } else if ($facultad=="FCyT"){
            $facultad_nombre="Facultad de Ciencias y Tecnolog&iacutea";
            $carrera=$_REQUEST['CarreraFCyT'];
        }
        
        echo ("<br>".$nombre."<br>".$apellido."<br>".$correo_usuario."<br>".$contra."<br>".$tipoUsuario."<br>".$carrera."<br>".$facultad_nombre."<br>".$cedula."<br>".$puesto."<br>");

        if($tipoUsuario=="Estudiante"){
            $sql="INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `correo`, `contra`, `tipo`, `carrera`, `facultad`, `cedula`, `puesto`, `foto`) 
                    VALUES ('$cedula', '$nombrea', '$apellidoa', '$correo_usuario', '$contra', '$tipoUsuario', '$carrera', '$facultad_nombre', '$cedula', NULL, '$foto')";
            
            $stmt=$conn->prepare($sql);
            echo "YA ENTRO";
            try{
                if($stmt->execute()){
                    echo "Registro creado exitosamente";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/agregarUsuarios.php?fallo=exito">';
                    EnviarCorreo($correo_usuario,$nombrea,$apellidoa,$cedula,$contraa);
                }
            }
            catch (PDOException $e){
                if($e->getCode() == '23000'){
                    echo "Este correo ya existe";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/agregarUsuarios.php?fallo=true">';
                } else{
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($conn):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/agregarUsuarios.php">';
                }
            }
        } else if ($tipoUsuario=="Docente"){
            $sql="INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `correo`, `contra`, `tipo`, `carrera`, `facultad`, `cedula`, `puesto`, `foto`) 
                    VALUES ('$cedula', '$nombrea', '$apellidoa', '$correo_usuario', '$contra', '$tipoUsuario', NULL, '$facultadprof', '$cedula', NULL, '$foto')";
            
            $stmt=$conn->prepare($sql);
            echo "YA ENTRO";
            try{
                if($stmt->execute()){
                    echo "Registro creado exitosamente";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/agregarUsuarios.php?fallo=exito">';
                    EnviarCorreo($correo_usuario,$nombrea,$apellidoa,$cedula,$contraa);
                }
            }
            catch (PDOException $e){
                if($e->getCode() == '23000'){
                    echo "Este correo ya existe";
                    echo '<meta http-equiv="refresh" content="3; url=../pantallas/agregarUsuarios.php?fallo=true">';
                } else{
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($conn):";
                    echo '<meta http-equiv="refresh" content="1; url=../pantallas/agregarUsuarios.php">';
                }
            }
        } else if ($tipoUsuario=="Operador"){
            $sql="INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `correo`, `contra`, `tipo`, `carrera`, `facultad`, `cedula`, `puesto`, `foto`) 
                    VALUES ('$cedula', '$nombrea', '$apellidoa', '$correo_usuario', '$contra', '$tipoUsuario', '$carrera', '$facultad_nombre', '$cedula', NULL, '$foto')";
            
            $stmt=$conn->prepare($sql);
            echo "YA ENTRO";
            try{
                if($stmt->execute()){
                    echo "Registro creado exitosamente";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/agregarUsuarios.php?fallo=exito">';
                    EnviarCorreo($correo_usuario,$nombrea,$apellidoa,$cedula,$contraa);
                }
            }
            catch (PDOException $e){
                if($e->getCode() == '23000'){
                    echo "Este correo ya existe";
                    echo '<meta http-equiv="refresh" content="3; url=../pantallas/agregarUsuarios.php?fallo=true">';
                } else{
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($conn):";
                    echo '<meta http-equiv="refresh" content="1; url=../pantallas/agregarUsuarios.php">';
                }
            }
        } else if ($tipoUsuario=="Administrador"){
            $sql="INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `correo`, `contra`, `tipo`, `carrera`, `facultad`, `cedula`, `puesto`, `foto`) 
                    VALUES ('$cedula', '$nombrea', '$apellidoa', '$correo_usuario', '$contra', '$tipoUsuario', NULL, NULL, '$cedula', '$puesto', '$foto')";
            
            $stmt=$conn->prepare($sql);
            echo "YA ENTRO";
            try{
                if($stmt->execute()){
                    echo "Registro creado exitosamente";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/agregarUsuarios.php?fallo=exito">';
                    EnviarCorreo($correo_usuario,$nombrea,$apellidoa,$cedula,$contraa);
                }
            }
            catch (PDOException $e){
                if($e->getCode() == '23000'){
                    echo "Este correo ya existe";
                    echo '<meta http-equiv="refresh" content="3; url=../pantallas/agregarUsuarios.php?fallo=true">';
                } else{
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($conn):";
                    echo '<meta http-equiv="refresh" content="1; url=../pantallas/agregarUsuarios.php">';
                }
            }
        }
    } else{
        echo "No esta definido";
        echo '<meta http-equiv="refresh" content="3; url=../pantallas/agregarUsuarios.php?fallo=nada">';
    }
?>
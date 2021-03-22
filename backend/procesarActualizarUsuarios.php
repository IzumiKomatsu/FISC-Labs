<?php
    include("conexion.php");

    if (isset($_REQUEST['nombre']) && isset($_REQUEST['apellido']) && isset($_REQUEST['cedula']) && isset($_REQUEST['correo']) && isset($_REQUEST['radio']))
    {
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $cedula = $_REQUEST['cedula'];
        $correo = $_REQUEST['correo'];
        $tipoUsuario = $_REQUEST['radio'];
        $facultad = $_REQUEST['Facultades'];
        $facultadprof = $_REQUEST['FacultadesProf'];
        $puesto = $_REQUEST['PuestoDITIC'];

        echo $nombre."<br>".$apellido."<br>".$cedula."<br>".$tipoUsuario."<br>".$correo."<br>";
        echo $facultad."<br>".$facultadprof."<br>".$puesto."<br>";

        //VALIDAMOS EL VALOR DE LA FACULTAD PARA PONERLO EN EL NOMBRE COMPLETO YA QUE OBTENEMOS PREFIJOS
        if($facultad == "FISC"){
            $facultad_nombre = "Facultad de Ingenier&iacutea de Sistemas Computacionales";
            $carrera = $_REQUEST['CarreraFISC'];
        } else if ($facultad == "FIC"){
            $facultad_nombre = "Facultad de Ingenier&iacutea Civil";
            $carrera = $_REQUEST['CarreraFIC'];
        } else if ($facultad == "FIE"){
            $facultad_nombre = "Facultad de Ingenier&iacutea El&eacutectrica";
            $carrera = $_REQUEST['CarreraFIE'];
        } else if ($facultad == "FII"){
            $facultad_nombre = "Facultad de Ingenier&iacutea Industrial";
            $carrera = $_REQUEST['CarreraFII'];
        } else if ($facultad == "FIM"){
            $facultad_nombre = "Facultad de Ingenier&iacutea Mec&aacutenica";
            $carrera = $_REQUEST['CarreraFIM'];
        } else if ($facultad == "FCyT"){
            $facultad_nombre = "Facultad de Ciencias y Tecnolog&iacutea";
            $carrera = $_REQUEST['CarreraFCyT'];
        }
        
        echo $carrera."<br>";

        if($tipoUsuario == "Estudiante"){

            $sqlActualizar = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', carrera = '$carrera', facultad = '$facultad_nombre', tipo = '$tipoUsuario', puesto = null, cedula = '$cedula'  
                                WHERE correo = '$correo'";
            $stmt = $conn->prepare($sqlActualizar);

            try{
                if($stmt->execute()){
                    echo "¡Usuario actualizado exitosamente!";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/verListaUsuarios.php?succA=true">';
                }
            }catch (PDOException $e){
                echo "Error: ".$sql."<br>"."PDO::errorInfo($conn):";
                echo '<meta http-equiv="refresh" content="0; url=../pantallas/actualizarUsuarios.php?falloA=true">';
            }
        }else if($tipoUsuario == "Docente"){

            $sqlActualizar = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', facultad = '$facultadprof', tipo = '$tipoUsuario', puesto = null, carrera = null, cedula = '$cedula'  
                                WHERE correo = '$correo'";
            $stmt = $conn->prepare($sqlActualizar);

            try{
                if($stmt->execute()){
                    echo "¡Usuario actualizado exitosamente!";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/verListaUsuarios.php?succA=true">';
                }
            }catch (PDOException $e){
                echo "Error: ".$sql."<br>"."PDO::errorInfo($conn):";
                echo '<meta http-equiv="refresh" content="0; url=../pantallas/actualizarUsuarios.php?falloA=true">';
            }
        }else if($tipoUsuario == "Operador"){

            $sqlActualizar = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', carrera = '$carrera', facultad = '$facultad_nombre', tipo = '$tipoUsuario', puesto = null, cedula = '$cedula'  
                                WHERE correo = '$correo'";
            $stmt = $conn->prepare($sqlActualizar);

            try{
                if($stmt->execute()){
                    echo "¡Usuario actualizado exitosamente!";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/verListaUsuarios.php?succA=true">';
                }
            }catch (PDOException $e){
                echo "Error: ".$sql."<br>"."PDO::errorInfo($conn):";
                echo '<meta http-equiv="refresh" content="0; url=../pantallas/actualizarUsuarios.php?falloA=true">';
            }
        }else if($tipoUsuario == "Administrador"){

            $sqlActualizar = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', puesto = '$puesto', facultad = null, carrera = null, tipo = '$tipoUsuario', cedula = '$cedula'  
                                WHERE correo = '$correo'";
            $stmt = $conn->prepare($sqlActualizar);

            try{
                if($stmt->execute()){
                    echo "¡Usuario actualizado exitosamente!";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/verListaUsuarios.php?succA=true">';
                }
            }catch (PDOException $e){
                echo "Error: ".$sql."<br>"."PDO::errorInfo($conn):";
                echo '<meta http-equiv="refresh" content="0; url=../pantallas/actualizarUsuarios.php?falloA=true">';
            }
        }
    } else{
        echo "No esta definido";
        echo '<meta http-equiv="refresh" content="3; url=../pantallas/verListaUsuarios.php?fallo=nada">';
    }
?>
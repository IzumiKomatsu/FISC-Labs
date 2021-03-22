<?php
    include("conexion.php");
    include("enviarCorreoContra.php");

    if(isset($_REQUEST['email'])){
        $correo = $_GET['email'];

        //GENERAMOS LA CONTRASEÑA
        $letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $contran = "";
        
        //Reconstruimos la contraseña segun la longitud que se quiera
        for($i=0;$i<10;$i++) {
            //obtenemos un caracter aleatorio escogido de la cadena de caracteres
            $contran .= substr($letras,rand(0,62),1);
        }

        $contra=md5($contran);
        
        //cambiamos la contra en bd
        $sql = "UPDATE usuarios 
                SET contra= '$contra' 
                WHERE correo='$correo'";
        $result = $conn->query($sql);
        $count = $result->rowCount();

        //revisamos la bd
        $sql1 = "SELECT * 
                 FROM usuarios 
                 WHERE correo='$correo'";
        $result1 = $conn->query($sql1);
        $count1 = $result1->rowCount();

        if($count1 > 0){
            echo "<br> Usuario Registrado";
            $row = $result1->fetch(PDO::FETCH_ASSOC);

            $correo_usuario=$row['correo'];
            $nombre=$row['nombre'];
            $apellido=$row['apellido'];
            $cedula=$row['cedula'];
            $contra=$contran;

            EnviarCorreoContra($correo_usuario,$nombre,$apellido,$cedula,$contra); //Llamado de la función
            
            echo "<meta http-equiv='refresh' content='0; url=../index.php?fallo=enviado'>";

        } else{
            echo "<br> Usuario no identificado";
            echo "<meta http-equiv='refresh' content='0; url=../pantallas/recordarContra.php?fallo=noEnviado'>";
            exit;
        }
    } else{
        echo "No está definido";
        echo "<meta http-equiv='refresh' content='0; url=../pantallas/recordarContra.php?fallo=vacio'>";
    }
?>
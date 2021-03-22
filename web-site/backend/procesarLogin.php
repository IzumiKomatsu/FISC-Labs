<?php
    session_start(); //Requerida para utilizar la sesión

    include("conexion.php"); //Requerida para conectar con la bd

    if(isset($_REQUEST['email'])&& isset($_REQUEST['pass'])){
        $correo = $_REQUEST['email'];
        $contra = md5($_REQUEST['pass']);

        //verificación en bd
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND contra = '$contra'";
        $result = $conn->query($sql);
        $count = $result->rowCount();

        if($count > 0){
            echo "<br> Usuario Registrado";
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $_SESSION['sesion'] = true;
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['apellido'] = $row['apellido'];
            $_SESSION['correo'] = $row['correo'];
            $_SESSION['tipo'] = $row['tipo']; 
            $_SESSION['carrera'] = $row['carrera'];
            $_SESSION['facultad'] = $row['facultad'];
            $_SESSION['cedula'] = $row['cedula'];
            $_SESSION['puesto'] = $row['puesto'];
            $_SESSION['foto'] = $row['foto'];
            
            echo "<meta http-equiv='refresh' content='0; url=../pantallas/panelDeControl.php'>";

        } else{
            echo "<br> Usuario no identificado";
            echo "<meta http-equiv='refresh' content='0; url=../index.php?fallo=true'>";
            exit;
        }
    } else{
        echo "No está definido";
        header("Location:../index.php");
    }
?>
<?php
include("conexion.php");
  
    $correo=$_GET['correo'];
    $contra=md5($_GET['contra']);

// Encabezado tipo Json
header("Content-Type: application/json"); 

//$_SERVER['REQUEST_METHOD'] identifica el tipo de petición GET, POST, PUT, DELETE
switch ($_SERVER['REQUEST_METHOD']){

    case 'GET':
        //Obtener usuarios
        $consultaTodos = $conn->query("SELECT * 
                                       FROM usuarios 
                                       WHERE correo = '$correo' AND contra = '$contra'");

        $listadoUsuarios=$consultaTodos->fetchAll(PDO::FETCH_OBJ);
        
        print_r(json_encode($listadoUsuarios,JSON_UNESCAPED_UNICODE)); 
    break;
}

?>
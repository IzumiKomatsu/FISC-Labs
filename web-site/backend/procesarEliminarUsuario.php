<?php
    include("conexion.php");

    if(isset($_REQUEST['correo'])){
        $correoUser = $_REQUEST['correo'];

        $sqlEliminarUser="DELETE FROM usuarios 
                          WHERE correo = '$correoUser'";
                          
        $stmt = $conn->prepare($sqlEliminarUser);

        try{
            if($stmt->execute()){
                echo "¡Usuario eliminado correctamente!";
                echo '<meta http-equiv="refresh" content="0; url=../pantallas/verListaUsuarios.php?succE=true">';
            }
        }
        catch (PDOException $e){
            echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
            echo '<meta http-equiv="refresh" content="0; url=../pantallas/verListaUsuarios.php?falloEl=true">';
            exit;
        }
    }
?>
<?php
    include("conexion.php");

    //Para consultar Usuario en sesión

    $correo = $_SESSION['correo'];

    $sql = "SELECT * 
            FROM usuarios 
            WHERE correo='$correo'";

    $stmt = $conn->query($sql);
        $stmt->execute();
            $row = $stmt->fetch();
?>
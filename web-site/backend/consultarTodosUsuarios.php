<?php
    include("conexion.php");

    //Para el usuario Admin
    
    $sqlUsuarios = "SELECT * 
                    FROM usuarios";

    $resUsuarios = $conn->query($sqlUsuarios);
?>
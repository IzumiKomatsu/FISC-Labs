<?php
    include("conexion.php");
 
    $sqlExtras = "SELECT * 
                  FROM extras 
                  WHERE tipo not like ('%laptop%')";
                  
    $resExtras = $conn->query($sqlExtras);
?>
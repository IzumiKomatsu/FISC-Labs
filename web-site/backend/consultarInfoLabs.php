<?php
    include("conexion.php");
 
    $q = strval($_GET['q']);
 
    $sqlInfoLabs = "SELECT * 
                    FROM laboratorios 
                    WHERE cod_lab = '$q'";
                    
    $resInfoLabs = $conn->query($sqlInfoLabs);

    while($rows = $resInfoLabs->fetch()){
        echo "<span><b>Computadoras disponibles: </b>".$rows['pc_disp']."<br>";
        echo "<span><b>Total de Computadoras: </b>".$rows['total_pc']."<br>";
        echo "<span><b>Tipo de Laboratorio: </b>".$rows['tipo']."<br>";
        echo "<span><b>Disponibilidad de Proyector: </b>".$rows['proyector_disp']."<br>";
    }
?>
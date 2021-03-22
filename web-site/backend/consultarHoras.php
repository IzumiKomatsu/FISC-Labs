<?php
    include("conexion.php");
 
    $q = strval($_GET['fecha']);
    $c = strval($_GET['lab']);

    if($q == date("Y-m-d")) // consulta horas disponibles cuando se ha seleccionado el día actual
    {
        $sqlHoraLabs = "SELECT cod_horario, hora_inicio, hora_final 
                        FROM horarios 
                        WHERE cod_horario NOT IN (SELECT cod_horario 
                                                  FROM horarios_laboratorios 
                                                  WHERE cod_lab = '$c' 
                                                  AND dia_semana = DAYNAME('$q')) 
                        AND cod_horario NOT IN (SELECT cod_horario 
                                                FROM reservas 
                                                WHERE cod_lab = '$c' 
                                                AND fecha = CAST('$q' AS DATE))
                        AND hora_inicio > CURRENT_TIME()";
                          
        $resHoraLabs = $conn->query($sqlHoraLabs);
        
        while($rows = $resHoraLabs->fetch()){
            echo    "<option value=".$rows['cod_horario'].">".$rows['hora_inicio']." - ".$rows['hora_final']."</option>";
        }

    }else{ //consulta horas disponibles
        $sqlHoraLabs = "SELECT cod_horario, hora_inicio, hora_final 
                        FROM horarios 
                        WHERE cod_horario NOT IN (SELECT cod_horario 
                                                  FROM horarios_laboratorios 
                                                  WHERE cod_lab = '$c' 
                                                  AND dia_semana = DAYNAME('$q')) 
                        AND cod_horario NOT IN (SELECT cod_horario 
                                                FROM reservas 
                                                WHERE cod_lab = '$c' 
                                                AND fecha = CAST('$q' AS DATE))";

        $resHoraLabs = $conn->query($sqlHoraLabs);
        
        while($rows = $resHoraLabs->fetch()){
            echo    "<option value=".$rows['cod_horario'].">".$rows['hora_inicio']." - ".$rows['hora_final']."</option>";
        }
    }
?>
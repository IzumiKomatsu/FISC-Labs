<?php
    include("conexion.php");

    $id=$_SESSION['id_usuario'];

    $sql2="SELECT DISTINCT r.cod_reserva, r.cod_lab, r.fecha, 
                           h.hora_inicio, h.hora_final, u.cedula, 
                           u.nombre, u.apellido, 
                           GROUP_CONCAT(CASE 
                                    WHEN re.cod_extras IS NOT NULL
                                        THEN (SELECT e.tipo
                                              FROM extras AS e
                                              WHERE re.cod_extras=e.cod_extras)
                                        ELSE 'Ninguno'
                                    END) tipo
          FROM horarios AS h 
          INNER JOIN reservas AS r 
            ON h.cod_horario = r.cod_horario 
          INNER JOIN usuarios AS u 
            ON r.usuario_id = u.id_usuario 
          INNER JOIN reservas_extras AS re
            ON re.cod_reserva=r.cod_reserva
          WHERE usuario_id = '$id'
          GROUP BY r.cod_reserva 
          ORDER BY fecha ASC, hora_inicio ASC";

    $stmt=$conn->prepare($sql2);
        $stmt->execute();
?>
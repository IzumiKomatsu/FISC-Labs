<?php
		include("conexion.php");

		$codigo_reserva_enviado = $_GET['data'];

		$sql="SELECT DISTINCT r.cod_reserva, r.cod_lab, r.fecha, 
                          h.hora_inicio, h.hora_final, 
                          u.*, 
                          GROUP_CONCAT(CASE 
                                  WHEN re.cod_extras IS NOT NULL
                                      THEN (SELECT e.tipo
                                            FROM extras AS e
                                                  WHERE re.cod_extras=e.cod_extras)
                                      ELSE 'Ninguno'
                                  END) Tipo
          FROM horarios AS h 
          INNER JOIN reservas AS r 
            ON h.cod_horario = r.cod_horario 
          INNER JOIN usuarios AS u 
            ON r.usuario_id = u.id_usuario
          INNER JOIN reservas_extras AS re
            ON re.cod_reserva=r.cod_reserva
				  WHERE r.cod_reserva='$codigo_reserva_enviado'";

    $stmt=$conn->prepare($sql);
		$stmt->execute();
			$row2 = $stmt->fetch();
?>
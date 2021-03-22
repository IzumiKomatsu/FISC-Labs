<?php
    include("verificar.php");
    include("consultaUsuario.php");

    $codigo = $_REQUEST['a'];
    $tipoUser = $row['tipo'];
    echo $codigo;

    $sql = "DELETE FROM `reservas_extras` WHERE `cod_reserva` = '$codigo';
            DELETE FROM `reservas` WHERE `cod_reserva` = '$codigo'";

    $stmt = $conn->prepare($sql);
    // $stmt->execute();

    try{
        if($stmt->execute()){
            echo "¡Reserva eliminada correctamente!";
            if ($tipoUser == "Operador"){
                echo '<meta http-equiv="refresh" content="0; url=../pantallas/listaReservas.php?succ=true">';
            } else{
                echo '<meta http-equiv="refresh" content="0; url=../pantallas/verReservas.php?succ=true">';
            }
            //echo '<meta http-equiv="refresh" content="0; url=../pantallas/verListaUsuarios.php?succE=true">';
            //echo '<meta http-equiv="refresh" content="0; url=../pantallas/verReservas.php?succ=true">';
        }
    }
    catch (PDOException $e){
        echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
        if ($tipoUser == "Operador"){
            echo '<meta http-equiv="refresh" content="0; url=../pantallas/listaReservas.php?fallo=true">';
        } else{
            echo '<meta http-equiv="refresh" content="0; url=../pantallas/verReservas.php?fallo=true">';
        }
        //echo '<meta http-equiv="refresh" content="0; url=../pantallas/verReservas.php?fallo=true">';
        exit;
    }

    //echo 'Reserva Eliminada correctamente';
    //echo '<meta http-equiv="refresh" content="0; url=../pantallas/verReservas.php">';
?>
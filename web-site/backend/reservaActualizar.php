<?php
    include("verificar.php");
    include("consultaUsuario.php");

    //Cambiar nombre por actualizarReserva.php

    if(isset($_REQUEST['laboratorios']) && isset($_REQUEST['fechaReserva']) && isset($_REQUEST['horaReserva']) && isset($_REQUEST['radio']))
    { 
        //$idUser = $row['id_usuario'];
        $tipoUser = $row['tipo'];
        $codigoRes = $_REQUEST['codigo'];
        $codLab = $_REQUEST['laboratorios'];
        $fechaRes = $_REQUEST['fechaReserva'];
        $horaDisp = $_REQUEST['horaReserva'];
        $laptops = $_REQUEST['radio'];

        if($laptops == 05 && $count == 0) //Sin laptops y sin extras
        {
            $sql="UPDATE `reservas`
                    SET `cod_lab`='$codLab', `cod_horario`='$horaDisp', `fecha`='$fechaRes'
                    WHERE `cod_reserva`='$codigoRes';
                    UPDATE `reservas_extras`
                    SET `cod_lab`='$codLab', `cod_horario`='$horaDisp', `fecha`='$fechaRes', `cod_extras`=null
                    WHERE `cod_reserva`='$codigoRes'";

            $stmt = $conn->prepare($sql);

            try{
                if($stmt->execute()){
                    echo "¡Reserva actualizada correctamente!";
                    if ($tipoUser == "Operador"){
                        echo '<meta http-equiv="refresh" content="0; url=../pantallas/listaReservas.php?succAct=true">';
                    } else{
                        echo '<meta http-equiv="refresh" content="0; url=../pantallas/verReservas.php?succAct=true">';
                    }
                }
           }catch (PDOException $e){
                if($e->getCode() == '23000'){
                    //"Ya existe una reserva para el día, hora y salón seleccionado.";
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/actualizarReserva.php?err=true">';
                }else{
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/actualizarReserva.php?fallo=true">';
                    exit;
                }
            }

        }else if($laptops == 05 && $count > 0){ //Sin laptops y con extras
            $sql="UPDATE `reservas`
                    SET `cod_lab`='$codLab', `cod_horario`='$horaDisp', `fecha`='$fechaRes'
                    WHERE `cod_reserva`='$codigoRes';
                    DELETE FROM `reservas_extras` 
                    WHERE `cod_reserva`='$codigoRes'";

            $stmt = $conn->prepare($sql);
            
            try{
                if($stmt->execute()){
                    echo "¡Reserva actualizada correctamente!";

                    foreach ($_REQUEST['extras'] as $extras){
                        $sql="INSERT INTO `reservas_extras` (`cod_lab`, `cod_horario`, `fecha`, `cod_extras`, `cod_reserva`) 
                                VALUES ('$codLab', '$horaDisp', '$fechaRes', '$extras', '$codigoRes')";
                        
                        $stmt = $conn->prepare($sql);
                        try{
                            if($stmt->execute()){
                                echo "¡Extra actualizado correctamente!";
                                if ($tipoUser == "Operador"){
                                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/listaReservas.php?succAct=true">';
                                } else{
                                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/verReservas.php?succAct=true">';
                                }
                            }
                        }
                        catch (PDOException $e){
                            echo "Extra Error: ".$sql."<br>"."PDO::errorInfo($e):";
                            echo '<meta http-equiv="refresh" content="0; url=../pantallas/actualizarReserva.php?fallo=true">';
                            exit;
                        }
                    }
                }
            }catch(PDOException $e){
                if($e->getCode() == '23000'){
                    //"Ya existe una reserva para el día, hora y salón seleccionado.";
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/actualizarReserva.php?err=true">';
                }else{
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/actualizarReserva.php?fallo=true">';
                    exit;
                }
            }

        }else if($laptops == 03 && $count == 0){ //Con laptops, sin extras
            $sql="UPDATE `reservas`
                    SET `cod_lab`='$codLab', `cod_horario`='$horaDisp', `fecha`='$fechaRes'
                    WHERE `cod_reserva`='$codigoRes';
                    UPDATE `reservas_extras`
                    SET `cod_lab`='$codLab', `cod_horario`='$horaDisp', `fecha`='$fechaRes', `cod_extras`='$laptops'
                    WHERE `cod_reserva`='$codigoRes'";

            $stmt = $conn->prepare($sql);
            try{
                if($stmt->execute()){
                    echo "¡Reserva actualizada correctamente!";
                    if ($tipoUser == "Operador"){
                        echo '<meta http-equiv="refresh" content="0; url=../pantallas/listaReservas.php?succAct=true">';
                    } else{
                        echo '<meta http-equiv="refresh" content="0; url=../pantallas/verReservas.php?succAct=true">';
                    }
                }
            }catch (PDOException $e){
                if($e->getCode() == '23000'){
                    //"Ya existe una reserva para el día, hora y salón seleccionado.";
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/actualizarReserva.php?err=true">';
                }else{
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/actualizarReserva.php?fallo=true">';
                    exit;
                }
            }

        }else if($laptops == 03 && $count > 0){ //Con laptops y con extras
            $sql="UPDATE `reservas`
                    SET `cod_lab`='$codLab', `cod_horario`='$horaDisp', `fecha`='$fechaRes'
                    WHERE `cod_reserva`='$codigoRes';
                    DELETE FROM `reservas_extras` WHERE `cod_reserva`='$codigoRes';
                    INSERT INTO `reservas_extras` (`cod_lab`, `cod_horario`, `fecha`, `cod_extras`, `cod_reserva`) 
                    VALUES ('$codLab', '$horaDisp', '$fechaRes', '$laptops', '$codigoRes')";

            $stmt = $conn->prepare($sql);
            try{
                if($stmt->execute()){
                    echo "¡Reserva registrada correctamente!";

                    foreach ($_REQUEST['extras'] as $extras){
                        $sql="INSERT INTO `reservas_extras` (`cod_lab`, `cod_horario`, `fecha`, `cod_extras`, `cod_reserva`) 
                                VALUES ('$codLab', '$horaDisp', '$fechaRes', '$extras', '$codigoRes')";

                        $stmt = $conn->prepare($sql);
                        try{
                            if($stmt->execute()){
                                echo "¡Extra actualizado correctamente!";
                                if ($tipoUser == "Operador"){
                                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/listaReservas.php?succAct=true">';
                                } else{
                                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/verReservas.php?succAct=true">';
                                }
                            }
                        }
                        catch (PDOException $e){
                            echo "Extra Error: ".$sql."<br>"."PDO::errorInfo($e):";
                            echo '<meta http-equiv="refresh" content="0; url=../pantallas/actualizarReserva.php?fallo=true">';
                            exit;
                        }
                    }
                }
            }catch(PDOException $e){
                if($e->getCode() == '23000'){
                    //"Ya existe una reserva para el día, hora y salón seleccionado.";
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/actualizarReserva.php?err=true">';
                }else{
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/actualizarReserva.php?fallo=true">';
                    exit;
                }
            }
        }
        
    }else{
        echo "No esta definido";
        echo '<meta http-equiv="refresh" content="3; url=../index.php">';
    }
?>  

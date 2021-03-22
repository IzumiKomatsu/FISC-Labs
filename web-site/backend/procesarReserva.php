<?php
    include("verificar.php");
    include("consultaUsuario.php");

    if(isset($_REQUEST['laboratorios']) && isset($_REQUEST['fechaReserva']) && isset($_REQUEST['horaReserva']) && isset($_REQUEST['radio']))
    { 
        $idUser = $row['id_usuario'];
        $codLab = $_REQUEST['laboratorios'];
        $fechaRes = $_REQUEST['fechaReserva'];
        $horaDisp = $_REQUEST['horaReserva'];
        $laptops = $_REQUEST['radio'];
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codReserva = substr(str_shuffle($permitted_chars), 0, 10);

        echo $codLab."<br>";
        echo $fechaRes."<br>";
        echo $horaDisp."<br>";
        echo $laptops."<br>";
        $count = 0;
        foreach ($_REQUEST['extras'] as $extras){
            $count = $count + 1;
        }
        echo $count."<br>";

        if($laptops == 05 && $count == 0) //Sin laptops y sin extras
        {
            echo "LALALALALALLLALA <br>";
            $sql="INSERT INTO `reservas` (`cod_lab`, `cod_horario`, `fecha`, `usuario_id`, `cod_reserva`) 
                    VALUES ('$codLab', '$horaDisp', '$fechaRes', '$idUser', '$codReserva');
                    INSERT INTO `reservas_extras` (`cod_lab`, `cod_horario`, `fecha`, `cod_reserva`) 
                    VALUES ('$codLab', '$horaDisp', '$fechaRes', '$codReserva')";

            $stmt = $conn->prepare($sql);
            try{
                if($stmt->execute()){
                    echo "¡Reserva registrada correctamente!";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/reservaCorrecta.php?a='.$codReserva.'">';
                }
            }catch (PDOException $e){
                if($e->getCode() == '23000'){
                    //"Ya existe una reserva para el día, hora y salón seleccionado.";
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/reservarLabs.php?err=true">';
                }else{
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/reservarLabs.php?fallo=true">';
                    exit;
                }
            }
        }else if($laptops == 05 && $count > 0){ //Sin laptops y con extras

            $sql="INSERT INTO `reservas` (`cod_lab`, `cod_horario`, `fecha`, `usuario_id`, `cod_reserva`) 
                    VALUES ('$codLab', '$horaDisp', '$fechaRes', '$idUser', '$codReserva')";

            $stmt = $conn->prepare($sql);
            
            try{
                if($stmt->execute()){
                    echo "¡Reserva registrada correctamente!";

                    foreach ($_REQUEST['extras'] as $extras){
                        $sql="INSERT INTO `reservas_extras` (`cod_lab`, `cod_horario`, `fecha`, `cod_extras`, `cod_reserva`) 
                                VALUES ('$codLab', '$horaDisp', '$fechaRes', '$extras', '$codReserva')";

                        $stmt = $conn->prepare($sql);
                        try{
                            if($stmt->execute()){
                                echo "¡Extra registrado correctamente!";
                                echo '<meta http-equiv="refresh" content="0; url=../pantallas/reservaCorrecta.php?a='.$codReserva.'">';
                            }
                        }
                        catch (PDOException $e){
                            echo "Extra Error: ".$sql."<br>"."PDO::errorInfo($e):";
                            echo '<meta http-equiv="refresh" content="0; url=../pantallas/reservarLabs.php?fallo=true">';
                            exit;
                        }
                    }
                }
            }catch(PDOException $e){
                if($e->getCode() == '23000'){
                    "Ya existe una reserva para el día, hora y salón seleccionado.";
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/reservarLabs.php?err=true">';
                }else{
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/reservarLabs.php?fallo=true">';
                    exit;
                }
            }
        }else if($laptops == 03 && $count == 0){ //Con laptops, sin extras

            $sql="INSERT INTO `reservas` (`cod_lab`, `cod_horario`, `fecha`, `usuario_id`, `cod_reserva`) 
                    VALUES ('$codLab', '$horaDisp', '$fechaRes', '$idUser', '$codReserva');
                    INSERT INTO `reservas_extras` (`cod_lab`, `cod_horario`, `fecha`, `cod_extras`, `cod_reserva`) 
                    VALUES ('$codLab', '$horaDisp', '$fechaRes', '$laptops', '$codReserva')";
            echo $sql;

            $stmt = $conn->prepare($sql);
            try{
                if($stmt->execute()){
                    echo "¡Reserva registrada correctamente!";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/reservaCorrecta.php?a='.$codReserva.'">';
                }
            }catch (PDOException $e){
                if($e->getCode() == '23000'){
                    "Ya existe una reserva para el día, hora y salón seleccionado.";
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/reservarLabs.php?err=true">';
                }else{
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/reservarLabs.php?fallo=true">';
                    exit;
                }
            }
        }else if($laptops == 03 && $count > 0){ //Con laptops y con extras
            $sql="INSERT INTO `reservas` (`cod_lab`, `cod_horario`, `fecha`, `usuario_id`, `cod_reserva`) 
                    VALUES ('$codLab', '$horaDisp', '$fechaRes', '$idUser', '$codReserva');
                    INSERT INTO `reservas_extras` (`cod_lab`, `cod_horario`, `fecha`, `cod_extras`, `cod_reserva`) 
                    VALUES ('$codLab', '$horaDisp', '$fechaRes', '$laptops', '$codReserva')";

            $stmt = $conn->prepare($sql);
            try{
                if($stmt->execute()){
                    echo "¡Reserva registrada correctamente!";

                    foreach ($_REQUEST['extras'] as $extras){
                        $sql="INSERT INTO `reservas_extras` (`cod_lab`, `cod_horario`, `fecha`, `cod_extras`, `cod_reserva`) 
                                VALUES ('$codLab', '$horaDisp', '$fechaRes', '$extras', '$codReserva')";

                        $stmt = $conn->prepare($sql);
                        try{
                            if($stmt->execute()){
                                echo "¡Extra registrado correctamente!";
                                echo '<meta http-equiv="refresh" content="0; url=../pantallas/reservaCorrecta.php?a='.$codReserva.'">';
                            }
                        }
                        catch (PDOException $e){
                            echo "Extra Error: ".$sql."<br>"."PDO::errorInfo($e):";
                            echo '<meta http-equiv="refresh" content="0; url=../pantallas/reservarLabs.php?fallo=true">';
                            exit;
                        }
                    }
                }
            }catch(PDOException $e){
                if($e->getCode() == '23000'){
                    //"Ya existe una reserva para el día, hora y salón seleccionado.";
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/reservarLabs.php?err=true">';
                }else{
                    echo "Error: ".$sql."<br>"."PDO::errorInfo($e):";
                    echo '<meta http-equiv="refresh" content="0; url=../pantallas/reservarLabs.php?fallo=true">';
                    exit;
                }
            }
        }
    }else{
        echo "No esta definido";
        echo '<meta http-equiv="refresh" content="3; url=../index.php">';
    }
?>
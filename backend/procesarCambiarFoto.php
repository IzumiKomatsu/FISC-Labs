<?php
    include("conexion.php");
    include("consultaUsuario.php"); 
    include("verificar.php"); 

    echo "<br>";
    echo $tipo = $_FILES['foto']['type'];
    echo"<br>";
    echo $tamano = $_FILES['foto']['size'];
    echo"<br>";
    echo $temp = $_FILES['foto']['tmp_name'];
    echo"<br>";

    echo $nuevoNombre=$_SESSION['id_usuario'].".png";

    move_uploaded_file($temp,'../images/'.$nuevoNombre);

    $id_usuario = $_SESSION['id_usuario'];

    $sqlupdate = "UPDATE usuarios 
                  SET foto='$nuevoNombre' 
                  WHERE id_usuario='$id_usuario'";

    $stmt=$conn->prepare($sqlupdate);
    $stmt->execute();

    echo '<meta http-equiv="refresh" content="0; url=../pantallas/panelDeControl.php">';

    //Actualizar Contraseña
    if(!empty($_POST['password'])){
        $pass=md5($_REQUEST['password']);

        $sqlupdate = "UPDATE usuarios 
                      SET contra='$pass' 
                      WHERE id_usuario='$id_usuario'";
                      
        $stmt=$conn->prepare($sqlupdate);
        $stmt->execute();

        echo ("<br>".$pass."<br>");
    }
    else{
        echo "No hay Contraseña para actualizar <br>";
    }
?>
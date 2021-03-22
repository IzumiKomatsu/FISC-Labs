<?php
    $hostname="mysql.laboratoriosfisc.ds507.online";
    $database="dblaboratoriosfisc";
    $username="laboratoriosfisc";
    $password="20laboratoriodb";

    $conn=new mysqli($hostname, $username, $password, $database);

    if($conn->connect_errno){
        echo "Conexión fallida";
    }

?>
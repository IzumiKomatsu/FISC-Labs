<?php
    session_start();
    mysqli_close($conn); 
    session_unset();
    header('Location: ../index.php');
?>
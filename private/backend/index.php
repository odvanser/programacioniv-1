<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: private/backend/principal.php');
    }else{
        header('location: ../login.php');
    }


?>
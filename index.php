<?php
    session_start();

    if (isset($_SESSION['password']) == $value['password']){
        header('location: admin/dashboard.php');
    }
    else{
        header('location: login/login.php');
    }

?>
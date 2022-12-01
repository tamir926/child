<?php
    ob_start();
    session_start();

    unset($_SESSION['logged']);
    unset($_SESSION['logged_id']);
    unset($_SESSION['logged_name']);
    unset($_SESSION['logged_tel']);
   
    header('Location: login');

?>

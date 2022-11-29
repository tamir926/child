<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    //$token = getBearerToken();
    if (!isset($_SESSION['logged']) || !$_SESSION['logged'])
    {
        header('Location: login');
    }
?>

<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$dbhost = 'localhost';
$dbuser = 'turuu';
$dbpass = 'Turuu123';
$dbname = 'child';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_set_charset($conn,'utf8mb4');
mysqli_select_db($conn,$dbname);// (($dbname,$conn);

//GLOBAL VARIABLES
$g_title="Child";
$path = 'http://localhost/child/';
$g_description = "Child";
$g_author="MaGnatE @ MindSymbol";
$g_icon = "assets/img/favicon.png";
$logo = 'http://localhost/child/assets/img/logo.png';
$branch = ' and a.branch = 3';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

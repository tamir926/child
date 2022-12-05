<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$dbhost = 'localhost';

// $dbuser = 'townmn_register_app';
// $dbpass = 'Fpmkc=JkN]7p';
// $dbname = 'townmn_register_app';

$dbuser = 'root';
$dbpass = '';
$dbname = 'child';


$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_set_charset($conn,'utf8mb4');
mysqli_select_db($conn,$dbname);// (($dbname,$conn);

//GLOBAL VARIABLES
$g_title="Child";
$g_author="MaGnatE @ MindSymbol";
$g_description="СӨБ-н бүртгэлийн систем";
$g_icon="assets/img/favicon.png";

?>

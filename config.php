<?

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'child';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_set_charset($conn,'utf8mb4');
mysqli_select_db($conn,$dbname);// (($dbname,$conn);

//GLOBAL VARIABLES
$g_title="Child";
$g_description = "Child";
$g_author="MaGnatE @ MindSymbol";
$g_icon = "assets/img/favicon.png";
?>
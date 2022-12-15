<?php
	ob_start();
	session_start();
	unset($_SESSION['id']);	
	unset($_SESSION['name']);
	unset($_SESSION['avatar']);
	unset($_SESSION['timestamp']);
	unset($_SESSION['logged']);
	header('Location: ../login');
?>
<?php 
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['email']);
	unset($_SESSION['authenticated']);
	session_destroy();
	header("location: ../anon/home.php");
?>
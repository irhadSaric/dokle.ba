<?php
	include("conn.php");
	
	session_unset();
	session_destroy();

	header("location:index.php");
	exit();
?>
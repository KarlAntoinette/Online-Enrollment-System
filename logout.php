<?php
	include "connect.php";
	session_start();
	
	unset ($_SESSION["utype"]);
	
	session_destroy();
	echo "<script>window.open('index.php','_self');</script>";
?>
<?php
	include "connect.php";
	session_start();
	
	$del = $_GET["id"];

	$sql1="DELETE FROM users WHERE id='$del'";
	$db->query($sql1);

	if($db -> query($sql1)){
		$sql2="DELETE FROM students WHERE id='$del'";
		$db->query($sql2);
			if($db -> query($sql2)){
				echo "<script>window.open('admin/index.php?mes2=Student Deleted','_self');</script>";
			}
			else{
				echo "<script>window.open('admin/index.php?mes2=Student Not Deleted','_self');</script>"; 
			}
	}
	else{
		echo "<script>window.open('admin/index.php?mes2=Student Not Deleted','_self');</script>";
	}
?>
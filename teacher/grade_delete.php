<?php
	include "../connect.php";
	session_start();
	
	$del = $_GET["grade_id"];

	$sql1="DELETE FROM grade WHERE grade_id='$del'";
	$db->query($sql1);

	if($db -> query($sql1)){
		echo "<script>window.open('grade.php?mes2=Grade Deleted','_self');</script>";

	}
	else{
		echo "<script>window.open('grade.php?mes2=Grade NOT Deleted','_self');</script>"; 
	}
?>

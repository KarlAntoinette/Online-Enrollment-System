<?php
	include "connect.php";
	session_start();
	
	$del = $_GET["sub_course_id"];

	$sql="DELETE FROM sub_course WHERE sub_course_id='$del'";
	$db->query($sql);

	if($db -> query($sql)){
		echo "<script>window.open('admin/assign_sub.php?mes2=Subject Deleted','_self');</script>";
	}
	else{
		echo "<script>window.open('admin/assign_sub.php?mes2=Subject Not Deleted','_self');</script>";
	}
?>

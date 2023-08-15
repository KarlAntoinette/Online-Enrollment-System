<?php
	include "connect.php";
	session_start();
	
	$del = $_GET["subject_teach_id"];

	$sql="DELETE FROM sub_teach WHERE subject_teach_id='$del'";
	$db->query($sql);

	if($db -> query($sql)){
		echo "<script>window.open('admin/assign_teach.php?mes2=Subject Deleted','_self');</script>";
	}
	else{
		echo "<script>window.open('admin/assign_teach.php?mes2=Subject Not Deleted','_self');</script>";
	}
?>

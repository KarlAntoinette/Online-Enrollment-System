<?php
	include "connect.php";
	session_start();
	
	$del = $_GET["course_student_id"];

	$sql="DELETE FROM course_student WHERE course_student_id='$del'";
	$db->query($sql);

	if($db -> query($sql)){
		echo "<script>window.open('admin/assign_stud.php?mes2=Student Deleted','_self');</script>";
	}
	else{
		echo "<script>window.open('admin/assign_stud.php?mes2=Student Not Deleted','_self');</script>";
	}
?>

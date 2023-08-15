<?php
	include "connect.php";
	session_start();
	
	$del = $_GET["course_id"];

	$sql1="DELETE FROM courses WHERE course_id='$del'";
	$db->query($sql1);

	if($db -> query($sql1)){
		$sql2="DELETE FROM course_student WHERE course_id='$del'";
		$db->query($sql2);
            echo "<script>window.open('admin/course.php?mes2=Course Deleted','_self');</script>";
			if($db -> query($sql2)){
				$sql3="DELETE FROM sub_course WHERE course_id='$del'";
				$db->query($sql2);
					if($db -> query($sql3)){
						echo "<script>window.open('admin/course.php?mes2=Course Deleted','_self');</script>";
					}
			}
			else{
				echo "<script>window.open('admin/course.php?mes2=Course Not Deleted','_self');</script>"; 
			}
	}
	else{
		echo "<script>window.open('admin/course.php?mes2=Course Not Deleted','_self');</script>";
	}
?>

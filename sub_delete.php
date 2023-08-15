<?php
	include "connect.php";
	session_start();
	
	$del = $_GET["subject_id"];

	$sql1="DELETE FROM subjects WHERE subject_id='$del'";
	$db->query($sql1);

	if($db -> query($sql1)){
		$sql2="DELETE FROM sub_teach WHERE subject_id='$del'";
		$db->query($sql2);
            echo "<script>window.open('admin/subjects.php?mes=Subject Deleted','_self');</script>";
			if($db -> query($sql2)){
				$sql3="DELETE FROM sub_course WHERE id='$del'";
				$db->query($sql2);
					if($db -> query($sql3)){
						echo "<script>window.open('admin/subjects.php?mes2=Subject Deleted','_self');</script>";
					}
			}
			else{
				echo "<script>window.open('admin/subjects.php?mes2=Subject Not Deleted','_self');</script>"; 
			}
	}
	else{
		echo "<script>window.open('admin/subjects.php?mes2=Subject Not Deleted','_self');</script>";
	}
?>

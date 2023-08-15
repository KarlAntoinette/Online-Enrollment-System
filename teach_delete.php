<?php
	include "connect.php";
	session_start();
	
	$del = $_GET["id"];

	$sql1="DELETE FROM teachers WHERE id='$del'";
	$db->query($sql1);

	if($db -> query($sql1)){
		$sql2="DELETE FROM users WHERE id='$del'";
		$db->query($sql2);
			if($db -> query($sql2)){
				$sql3="DELETE FROM sub_teach WHERE id='$del'";
				$db->query($sql2);
					if($db -> query($sql3)){
						echo "<script>window.open('admin/index.php?mes2=Teacher Deleted','_self');</script>";
					}
			}
			else{
				echo "<script>window.open('admin/index.php?mes2=Teacher Not Deleted','_self');</script>"; 
			}
	}
	else{
		echo "<script>window.open('admin/index.php?mes2=Teacher Not Deleted','_self');</script>";
	}
?>

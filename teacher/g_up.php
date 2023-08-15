<?php
	include "../connect.php";
	session_start();
	if(!isset($_SESSION['teacher']))
	{
		echo"<script>window.open('../index.php?mes=Access Denied..','_self');</script>";	
    }   

    if(isset($_POST["submit"])) {
        if($_POST["grade"] <= 100){
            $sq="UPDATE grade SET grade='{$_POST["grade"]}' WHERE grade_id={$_POST["grade_id"]}";
                if($db->query($sq)) {
                    echo "
                        <script>window.open('grade.php?mes1=Student Grade Update Successful','_self') </script>";
                }
                else {
                    echo "
                        <script>window.open('grade.php?mes2=Student Grade Update Unsuccessful','_self') </script>";
                }
        }
        else {
            echo "
                <script>window.open('grade.php?mes2=Student Grade Update Invalid','_self') </script>";
        }
    }           
?>
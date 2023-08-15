<?php
	include "../connect.php";
	session_start();
	if(!isset($_SESSION['admin']))
	{
		echo"<script>window.open('../index.php?mes=Access Denied..','_self');</script>";	
}

if(isset($_GET["id"]))
	{
		$sql="SELECT * FROM course_student 
        INNER JOIN students ON course_student.id = students.id
        WHERE students.id='{$_GET["id"]}'";
		$res=$db->query($sql);
		if($res->num_rows > 0)
		{
			$row=$res->fetch_assoc();
			$course=$row["course_id"];
			$id=$_GET["id"];
		}
		else
		{
			echo"<script>window.open('index.php?mes=Hatdog','_self');</script>";	
		}
	}
?>

<?php include "../header.php"; ?>

<?php include "../sidebar.php"; ?>

<div class="content">
    <div class="col-lg-8 ">
        <div class="row">
            <div class="col-lg-12 col-xl-12 offset-lg-3 offset-xl-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="title">Student Course</h3>
                        <p class="category">Update Student Course</p>
                    </div>
                        <div class="card-body">
                            <?php
                                if(isset($_POST["submit"])) {
                                    $sq="UPDATE course_student SET course_id='{$_POST["course_id"]}' WHERE id={$_POST["id"]}";
                                        if($db->query($sq)) {
                                            echo "
                                                <script>window.open('assign_stud.php','_self') </script>";
                                            echo "
                                                <div class='alert alert-success' role='alert'>
                                                    Course Update Successful
                                                </div>"; 
                                        }
                                        else {
                                            echo "
                                                <div class='alert alert-danger' role='alert'>
                                                    Profile Update Invalid
                                                </div>";
                                        }
                                }           
                            ?>
                            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" placeholder="<?php $row['fname'] ?>" value="<?php $row["id"] ?>" name="id" required class="input" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Course</label>
                                                <select class="form-control text-muted" placeholder="Course" name="course_id" style="background-color:#27293d;">
                                                    <?php 
                                                        $sl="SELECT * FROM courses";
                                                        $r=$db->query($sl);
                                                            if($r->num_rows>0) {
                                                                echo"<option value='' style='font-size: 15px;''>SELECT COURSE</option>";
                                                                while($ro=$r->fetch_assoc()) {
                                                                    echo "<option value='{$ro["course_id"]}' style='color:white; font-size: 15px;'>{$ro["coursename"]}</option>"; 
                                                                }
                                                            }
                                                    ?>
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-fill btn-primary" name="submit">Update</button>
                                    </div>
                            </form>
                        </div>
                </div>
            </div>            
        </div>
    </div>
</div>

<?php include "../footer.php"; ?>
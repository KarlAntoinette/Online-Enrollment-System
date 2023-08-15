<?php
	include "../connect.php";
	session_start();
	if(!isset($_SESSION['teacher']))
	{
		echo"<script>window.open('../index.php?mes=Access Denied..','_self');</script>";
		
	}	
    
    $sql="SELECT * FROM teachers WHERE id={$_SESSION["id"]}";
    $res=$db->query($sql);
    if($res->num_rows>0) {
        $row=$res->fetch_assoc();
    }

?>

<?php include "../header.php"; ?>

<?php include "../sidebar.php"; ?>

<div class="content">
    <div class="row">
        <div class="card card-plain">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Input Grades</h3>
                    <p class="category">Input Grades per student</p>
                        <?php
                            if(isset($_GET["mes1"])) {
                                echo"<div class='alert alert-success' role='alert'>{$_GET["mes1"]}</div>";	
                            }
                            if(isset($_GET["mes2"])) {
                                echo"<div class='alert alert-danger' role='alert'>{$_GET["mes2"]}</div>";	
                            }
                        ?>
            </div>
            <div class="card-body">
                <div class="col-lg-8">
                    <div class="col-lg-12 col-xl-12 offset-lg-3 offset-xl-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="title">Subject</h3>
                                <p class="category">Choose Subject to Grade</p>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Subject Name</label>
                                                <select class="form-control text-muted" name="subject" required class="input" style="background-color:#27293d;">
                                                    <?php 
                                                        $sl="SELECT * FROM sub_teach
                                                        INNER JOIN subjects ON sub_teach.subject_id = subjects.subject_id
                                                        WHERE sub_teach.id = {$_SESSION["id"]}";
                                                        $r=$db->query($sl);
                                                            if($r->num_rows>0) {
                                                                echo"<option value='' style='font-size: 15px;''>SELECT SUBJECT</option>";
                                                                while($ro=$r->fetch_assoc()) {
                                                                    echo "<option value='{$ro["subject_id"]}' style='color:white; font-size: 15px;'>{$ro["subname"]}</option>"; 
                                                                }
                                                            }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-fill btn-primary" name="view">Get Students</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="output">
        <div class="row">
            <div class="card card-plain">
                <?php
					if(isset($_POST["view"]))
						{
                            echo "
                                <div class='card-body'>
                                    <div class='col-lg-8'>
                                        <div class='col-lg-12 col-xl-12 offset-lg-3 offset-xl-3'>
                                            <div class='card'>
                                                <div class='card-header'>
                                                    <h3 class='title'>Add Grade</h3>
                                                    <p class='category'>Add Grade Per Student</p>
                                                </div>
                                                    <div class='card-body'>";
								$sql="SELECT * from students
                                INNER JOIN course_student ON students.id = course_student.id
                                INNER JOIN sub_course ON course_student.course_id = sub_course.course_id
                                WHERE subject_id='{$_POST["subject"]}'";
								$re=$db->query($sql);
								if($re->num_rows>0) {
                                    echo '
                                        <form method="post" action="grade_sub.php">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">';
									$i=0;
									while($r=$re->fetch_assoc())
									{
										$i++;
										echo "
                                            <div class='form-group'>
                                                <label>{$r["fname"]}</label>
                                                <input type='hidden' class='form-control' name='subject_id' value='{$r["subject_id"]}'>
                                                <input type='hidden' class='form-control' name='chkl[]' value='{$r["id"]}'>
                                                <input type='hidden' class='form-control' name='course_id' value='{$r["course_id"]}'>
                                                <input type='text' class='form-control' name='chkl1[]'>
                                            </div>
										";
									}
                                    echo "
                                        <div class='card-footer'>
                                            <button type='submit' class='btn btn-fill btn-primary' name='submit'>Add Grade</button>
                                        </div>";
								}
							else{
								echo "No record Found";
							}
								echo "
                                            </div>
                                        </div>
                                    </div>
                                </form>";
						}
				?>
            </div>
        </div>
    </div>
</div>

<?php include "../footer.php"; ?>
<?php
	include "../connect.php";
	session_start();
	
	$upd = $_GET["grade_id"];

	$sql="SELECT * FROM grade 
    INNER JOIN students ON grade.id = students.id
    INNER JOIN subjects ON grade.subject_id = subjects.subject_id
    WHERE grade_id='$upd'";
	$res=$db->query($sql);

    if($res->num_rows>0){
        $row=$res->fetch_assoc();
    }
?>

<?php include "../header.php"; ?>

<?php include "../sidebar.php"; ?>

<div class="content">
    <div class="row">
        <div class="card card-plain">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Update Grades</h3>
                    <p class="category">Update <?php echo $row["fname"] ?> Grade</p>
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
                                <h3 class="title"><?php echo $row["subname"] ?> Grade</h3>
                                <p class="category"><?php echo $row["fname"] ?> Grade update</p>
                            </div>
							<div class="card-body">
                                
								<form method="post" action="g_up.php">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Subject Name</label>
                                                <input type="text" class="form-control" placeholder="<?php echo $row["subname"] ?>" readonly>
                                                <input type="hidden" class="form-control" name="grade_id" value="<?php echo $row["grade_id"] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Grade</label>
                                                <input type="text" class="form-control" placeholder="<?php echo $row["grade"] ?>" name="grade" required class="input">
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-fill btn-primary" name="submit">Update Grade</button>
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
</div>



<?php include "../footer.php"; ?>
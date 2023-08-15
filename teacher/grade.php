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
                <h3 class="card-title font-weight-bold">Grades</h3>
                    <p class="category">View Student Grades per Subject</p>
                        <?php
                            if(isset($_GET["mes1"])) {
                                echo"<div class='alert alert-success' role='alert'>{$_GET["mes1"]}</div>";	
                            }
							else if(isset($_GET["mes2"])){
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
                                <p class="category">Choose Subject to View</p>
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
					if(isset($_POST["view"])){
                        echo"
						<div class='col-lg-12'>
							<div class='card  card-plain'>
								<div class='card-header'>
									<h3 class='card-title font-weight-bold'> Students</h3>
									<p class='category'>Subjects and Teachers</p>
								</div>
								<div class='card-body'>
									<div class='card-body'>
										<div class='table-responsive'>
											<table class='table tablesorter' id=''>
												<thead class='text-primary'>
													<tr>
														<th class='text-center'>Student Name</th>
														<th class='text-center'>Course</th>
														<th class='text-center'>Grade</th>
														<th class='text-center'>Action</th>
													</tr>
												</thead>";
						$sql="SELECT * from grade
						INNER JOIN students ON students.id = grade.id
						INNER JOIN courses ON grade.course_id = courses.course_id
						WHERE grade.subject_id='{$_POST["subject"]}'";
						$re=$db->query($sql);
						if($re->num_rows>0){
							$i=0;
							while($r=$re->fetch_assoc()){
								$i++;
									echo "
									<tr>
										<td class='text-center'>{$r["fname"]}</td>
										<td class='text-center'>{$r["coursename"]}</td>
										<td class='text-center'>{$r["grade"]}</td>
										<td class='text-center'>
                                            <a href='grade_update.php?grade_id={$r["grade_id"]}' class='btn btn-success'>Update</a>
                                            <a href='grade_delete.php?grade_id={$r["grade_id"]}' onclick='javascript:confirmationDelete($(this));return false;'  class='btn btn-danger'>Delete</a>
                                        </td>
									</tr>";
							}
						}
						else{
							echo "
								<tr>
									<td class='text-center'>No Record Found</td>
									<td class='text-center'>No Record Found</td>
									<td class='text-center'>No Record Found</td>
									<td class='text-center'>No Record Found</td>
								</tr>";
						}
					}
				?>
			</div>
		</div>
	</div>
</div>




<?php include "../footer.php"; ?>
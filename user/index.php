<?php
	include "../connect.php";
	session_start();
	if(!isset($_SESSION['student']))
	{
		echo"<script>window.open('../index.php?mes=Access Denied..','_self');</script>";
		
	}	
    
    $sql="SELECT * FROM students WHERE id={$_SESSION["id"]}";
    $res=$db->query($sql);
    if($res->num_rows>0) {
        $row=$res->fetch_assoc();
    }

?>

<?php include "../header.php"; ?>

<?php include "../sidebar.php"; ?>

<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card  card-plain">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold"> <?php echo $row["fname"] ?> Schedule</h3>
                    <p class="category">Subjects and Teachers</p>
                        <?php
                            if(isset($_GET["mes"])) {
                                echo"<div class='alert alert-danger' role='alert'>{$_GET["mes"]}</div>";	
                            }
                        ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Subjects</th>
                                    <th>Teacher</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $s="SELECT * FROM course_student
                                INNER JOIN sub_course ON course_student.course_id = sub_course.course_id
                                INNER JOIN sub_teach ON sub_course.subject_id = sub_teach.subject_id
                                INNER JOIN teachers ON sub_teach.id = teachers.id
                                INNER JOIN subjects ON sub_teach.subject_id = subjects.subject_id
                                WHERE course_student.id={$_SESSION["id"]}";
                                $res=$db->query($s);
                                    if($res->num_rows>0) {
                                    $i=0;
                                    while($r=$res->fetch_assoc()) {
                                        $i++;                           
                                        echo" 
                                            <tr>
                                                <td>{$r["subname"]}</td>
                                                <td>{$r["fname"]}</td>
                                            </tr> "; 
                                    }
                                    }
                                    else{
                                        echo" 
                                            <tr>
                                                <td>No Record Yet</td>
                                                <td>No Record Yet</td>
                                                <td>No Record Yet</td>
                                            </tr> ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold"> <?php echo $row["fname"] ?> Grades</h3>
                    <p class="category">Grades per subject</p>
                        <?php
                            if(isset($_GET["mes"])) {
                                echo"<div class='alert alert-danger' role='alert'>{$_GET["mes"]}</div>";	
                            }
                        ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th class='text-center'>Subjects</th>
                                    <th class='text-center'>Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $s="SELECT * FROM grade
                                INNER JOIN subjects ON grade.subject_id = subjects.subject_id
                                WHERE grade.id={$_SESSION["id"]}";
                                $res=$db->query($s);
                                    if($res->num_rows>0) {
                                    $i=0;
                                    while($r=$res->fetch_assoc()) {
                                        $i++;                           
                                        echo" 
                                            <tr>
                                                <td>{$r["subname"]}</td>
                                                <td class='text-center'>{$r["grade"]}</td>
                                            </tr> "; 
                                    }
                                    }
                                    else{
                                        echo" 
                                            <tr>
                                                <td>No Record Yet</td>
                                                <td>No Record Yet</td>
                                                <td>No Record Yet</td>
                                            </tr> ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="javascript:void(0)">
                                <img class="avatar" src="../assets/img/emilyz.jpg" alt="...">
                                <h5 class="title"><?php echo $row["fname"] ?></h5>
                            </a>
                        </div>
                    </p>
                    <div class="card-description">
                        <label>Date of Birth:</label>
                            <p class="description d-flex justify-content-center">
                                <?php echo $row["dob"] ?>
                            </p>
                        <label>Gender:</label>
                            <p class="description d-flex justify-content-center">
                                <?php echo $row["gen"] ?>
                            </p>
                        <label>Emergency Contact:</label>
                            <p class="description d-flex justify-content-center">
                                <?php echo $row["econ"] ?>
                            </p>
                        <label>Contact Number:</label>
                            <p class="description d-flex justify-content-center">
                                <?php echo $row["con"] ?>
                            </p>
                        <label>Address:</label>
                            <p class="description d-flex justify-content-center">
                                <?php echo $row["addr"] ?>
                            </p>
                    </div>
                    <div class="card-footer">
                        <div class="button-container">
                            <button onclick="location.href='profile_update.php'" class="btn btn-round btn-success">Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include "../footer.php"; ?>
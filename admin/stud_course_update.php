<?php
	include "../connect.php";
	session_start();

    $id = $_GET["id"];

	$sql="SELECT * FROM course_student 
    INNER JOIN students ON course_student.id = students.id
    WHERE course_student.id={$_GET['id']}";
	$res=$db->query($sql);

    if($res->num_rows>0){
        $row=$res->fetch_assoc();
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
                                    $sq="UPDATE course_student SET course_id='{$_POST["course_id"]}',class_id='{$_POST["class_id"]}' WHERE id={$_POST["id"]}";
                                        if($db->query($sq)) {
                                            echo "
                                                <script>window.open('assign_stud.php?mes1=Student Update Successful','_self') </script>";
                                        }
                                        else {
                                            echo "
                                                <script>window.open('assign_stud.php?mes2=Student Update Invalid','_self') </script>";
                                        }
                                }           
                            ?>
                            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" placeholder="<?php echo $row["fname"] ?>" name="fname" readonly>
                                            <input type="hidden" class="form-control" value="<?php echo $row["id"] ?>" name="id">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Course</label>
                                                <select class="form-control text-muted" name="course_id" style="background-color:#27293d;">
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Section</label>
                                                <select class="form-control text-muted" name="class_id" style="background-color:#27293d;">
                                                    <?php 
                                                        $sl="SELECT * FROM class";
                                                        $r=$db->query($sl);
                                                            if($r->num_rows>0) {
                                                                echo"<option value='' style='font-size: 15px;''>SELECT SECTION</option>";
                                                                while($ro=$r->fetch_assoc()) {
                                                                    echo "<option value='{$ro["class_id"]}' style='color:white; font-size: 15px;'>{$ro["classname"]}</option>"; 
                                                                }
                                                            }
                                                    ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Year Level</label>
                                            <select class="form-control text-muted" name="yearlevel" required class="input" style="background-color:#27293d;">
                                                <option value="" style="font-size: 15px;">SELECT YEAR LEVEL</option>
                                                <option value="1st" style="color:white; font-size: 15px;">1st Year</option>
                                                <option value="2nd" style="color:white; font-size: 15px;">2nd Year</option>
                                                <option value="3rd" style="color:white; font-size: 15px;">3rd Year</option>
                                                <option value="4th" style="color:white; font-size: 15px;">4th Year</option>
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
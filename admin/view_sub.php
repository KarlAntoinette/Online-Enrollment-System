<?php
	include "../connect.php";
	session_start();
	if(!isset($_SESSION['admin']))
	{
		echo"<script>window.open('../index.php?mes=Access Denied..','_self');</script>";	
    }

    $sql="SELECT * FROM users WHERE id={$_SESSION["id"]}";
    $res=$db->query($sql);
        if($res->num_rows>0) {
            $row=$res->fetch_assoc();
        }
?>

<?php include "../header.php"; ?>
<?php include "../sidebar.php"; ?>


<div class="content">
    <div class="card card-plain">
        <div class="row">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Subjects</h3>
                    <p class="category">View subjects per course or teacher</p>
                        <?php
                            if(isset($_GET["mes"])) {
                                echo"<div class='alert alert-danger' role='alert'>{$_GET["mes"]}</div>";	
                            }
                        ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-plain">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="title">Subjects per Course</h3>
                                <p class="category">View Subjects per Course</p>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Course Name</label>
                                                <select class="form-control text-muted" placeholder="SELECT COURSE" name="course" required class="input" style="background-color:#27293d;">
                                                    <?php 
                                                        $sl="SELECT * FROM courses";
                                                        $r=$db->query($sl);
                                                            if($r->num_rows>0) {
                                                                echo"<option value='' style='font-size: 15px;''>SELECT COURSE</option>";
                                                            while($ro=$r->fetch_assoc()) {
                                                                echo "<option value='{$ro["course_id"]}' style='color:white; font-size: 15px;'>{$ro["coursename"]}</option>"; }
                                                            }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-fill btn-primary" name="view1">View</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-plain">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="title">Subjects per Teacher</h3>
                                <p class="category">View Subjects per Teacher</p>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Subject Name</label>
                                                <select class="form-control text-muted" placeholder="SELECT TEACHER" name="teacher" required class="input" style="background-color:#27293d;">
                                                    <?php 
                                                        $sl="SELECT * FROM teachers";
                                                        $r=$db->query($sl);
                                                            if($r->num_rows>0) {
                                                                echo"<option value='' style='font-size: 15px;''>SELECT TEACHER</option>";
                                                            while($ro=$r->fetch_assoc()) {
                                                                echo "<option value='{$ro["id"]}' style='color:white; font-size: 15px;'>{$ro["fname"]}</option>"; }
                                                            }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-fill btn-primary" name="view2">View</button>
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
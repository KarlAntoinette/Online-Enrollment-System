<?php
	include "../connect.php";
	session_start();
	if(!isset($_SESSION['admin']))
	{
		echo"<script>window.open('../index.php?mes=Access Denied..','_self');</script>";	
}

$id = $_GET["subject_id"];

	$sql="SELECT * FROM subjects
    WHERE subject_id='$id'";
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
                                    if($_POST["units"] <= 6){
                                        $sq="UPDATE subjects SET req='{$_POST["req"]}',units='{$_POST["units"]}',sem='{$_POST["sem"]}' 
                                        WHERE subject_id={$_POST["sub"]}";
                                        if($db->query($sq)) {
                                            echo "
                                                <script>window.open('subjects.php','_self') </script>";
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
                                            <label>Subject Name</label>
                                            <input type="text" class="form-control" placeholder="<?php echo $row["subname"] ?>" name="subname" readonly>
                                            <input type="hidden" class="form-control" value="<?php echo $row["subject_id"] ?>" name="sub">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Pre-Requisite</label>
                                                <select class="form-control text-muted" name="req" style="background-color:#27293d;" required class="input">
                                                    <?php 
                                                        $sl="SELECT * FROM subjects";
                                                        $r=$db->query($sl);
                                                            if($r->num_rows>0) {
                                                                echo"<option value='None' style='font-size: 15px;''>None</option>";
                                                                while($ro=$r->fetch_assoc()) {
                                                                    echo "<option value='{$ro["subname"]}' style='color:white; font-size: 15px;'>({$ro["subcode"]}) - {$ro["subname"]}</option>"; 
                                                                }
                                                            }
                                                    ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Units</label>
                                            <input type="text" class="form-control" placeholder="<?php echo $row["units"] ?>" name="units" required class="input">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Semester</label>
                                                <select class="form-control text-muted" name="sem" style="background-color:#27293d;" required class="input">
                                                    <option value="<?php echo $row["sem"] ?>" style="font-size: 15px;"><?php echo $row["sem"] ?></option>
                                                    <option value="1st" style="color:white; font-size: 15px;">1st</option>
                                                    <option value="2nd" style="color:white; font-size: 15px;">2nd</option>
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
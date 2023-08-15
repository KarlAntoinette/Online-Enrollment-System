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
    <div class="col-lg-8 ">
        <div class="row">
            <div class="col-lg-12 col-xl-12 offset-lg-3 offset-xl-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="title">Profile</h3>
                        <p class="category">Change Profile Information</p>
                    </div>
                        <div class="card-body">
                            <?php
                                if(isset($_POST["submit1"])) {
                                    $sq="UPDATE teachers SET dob='{$_POST["dob"]}',econ='{$_POST["econ"]}',con='{$_POST["con"]}',gen='{$_POST["gen"]}',addr='{$_POST["addr"]}' where id={$_SESSION["id"]}";
                                        if($db->query($sq)) {
                                            echo "
                                                <div class='alert alert-success' role='alert'>
                                                    Profile Update Successful
                                                </div>"; }
                                        else {
                                            echo "
                                                <div class='alert alert-danger' role='alert'>
                                                    Profile Update Invalid
                                                </div>";}
                                }           
                            ?>
                            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" placeholder="<?php echo $row["fname"] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                                <select class="form-control text-muted" placeholder="Gender" name="gen" style="background-color:#27293d;">
                                                        <option value='' style='color:white; font-size: 15px;'>Select Gender</option>
                                                        <option value='Male' style='color:white; font-size: 15px;'>Male</option>
                                                        <option value='Female' style='color:white; font-size: 15px;'>Female</option>
                                                        <option value='Other' style='color:white; font-size: 15px;'>Other</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                                <input type="date" class="form-control" placeholder="Birthdate" name="dob">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" rows="5" class="form-control" placeholder="Ex: Davao City, Philippines" name="addr">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Emergency Contact</label>
                                            <input type="text" class="form-control" placeholder="Enter Emergency Contact" name="econ">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Emergency Contact Number</label>
                                            <input type="text" class="form-control" placeholder="Ex: 090000000" maxlength="11" name="con">
                                        </div>
                                    </div>
                                </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-fill btn-primary" name="submit1">Update Profile</button>
                                    </div>
                            </form>
                        </div>
                </div>
            </div>            
        </div>
    </div>
</div>

<?php include "../footer.php"; ?>
<?php
	include "../connect.php";
	session_start();
	if(!isset($_SESSION['student']))
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
    <div class="col-lg-8 ">
        <div class="row">
            <div class="col-lg-12 col-xl-12 offset-lg-3 offset-xl-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="title">Change Password</h3>
                    </div>
                        <div class="card-body">
                                <?php
                                    if(isset($_POST["submit"])) {
                                        $sql="select * from users where password='{$_POST["opass"]}' and id='{$_SESSION["id"]}'";
                                        $result=$db->query($sql);
                                            if($result->num_rows>0) {
                                                if($_POST["npass"]==$_POST["cpass"]) {
                                                    $sql="UPDATE users SET  password='{$_POST["npass"]}' where  id='{$_SESSION["id"]}'";
                                                    $db->query($sql);
                                                        echo"
                                                            <div class='alert alert-success' role='alert'>
                                                                Password Changed
                                                            </div>"; }
                                                else {
                                                        echo"
                                                            <div class='alert alert-danger' role='alert'>
                                                                Password Mismatched
                                                            </div>"; }
                                                    }
                                            else {
                                                echo"
                                                    <div class='alert alert-danger' role='alert'>
                                                        Wrong Current Password
                                                    </div>"; }
                                            }
                                ?>
                            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <input type="password" class="form-control" placeholder="Enter Current Password" name="opass" required class="input">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" placeholder="Enter New Password" name="npass" required class="input">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Confirm New Password</label>
                                            <input type="password" class="form-control" placeholder="Confirm New Password" name="cpass" required class="input">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-fill btn-primary" name="submit">Change Password</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>            
        </div>
    </div>
</div>

<?php include "../footer.php"; ?>
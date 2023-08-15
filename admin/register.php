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
    <div class="row">
        <div class="card card-plain">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Register</h3>
                    <p class="category">Add User To System And School</p>
                        <?php
                            if(isset($_GET["mes"])) {
                                echo"<div class='alert alert-danger' role='alert'>{$_GET["mes"]}</div>";	
                            }
                        ?>
            </div>
            <div class="card-body">
                <div class="col-lg-8">
                    <div class="col-lg-12 col-xl-12 offset-lg-3 offset-xl-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="title">Register User</h3>
                                <p class="category">Register User And Designate Them To A User Type</p>
                            </div>
                            <div class="card-body">
                                <?php
                                    if(isset($_POST["submit"])) {
                                        $sq="insert into users(fname,password,email,utype) values('{$_POST["fname"]}',1234,'{$_POST["email"]}','{$_POST["utype"]}')";
                                            if($db->query($sq)) {
                                                if($_POST["utype"] == "student"){
                                                    $last_id = mysqli_insert_id($db);
                                                    $sq1="insert into students(id,fname) values('$last_id','{$_POST["fname"]}')";
                                                    $res=mysqli_query($db,$sq1);
                                                        echo "
                                                            <div class='alert alert-success' role='alert'>
                                                                Student Registration Successful
                                                            </div>"; }
                                                    else if($_POST["utype"] == "teacher"){
                                                        $last_id = mysqli_insert_id($db);
                                                        $sq2="insert into teachers(id,fname) values('$last_id','{$_POST["fname"]}')";
                                                        $res=mysqli_query($db,$sq2);
                                                            echo "
                                                                <div class='alert alert-success' role='alert'>
                                                                    Teacher Registration Successful
                                                                </div>"; }
                                                    else {
                                                        echo "
                                                            <div class='alert alert-success' role='alert'>
                                                                Admin Registration Successful
                                                            </div>"; }
                                            }
                                                else {
                                                    echo "
                                                        <div class='alert alert-danger' role='alert'>
                                                            Registration Invalid
                                                        </div>"; 
                                                }
                                    }           
                                ?>
                                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" placeholder="Ex: Juan Dela Cruz" name="fname" required class="input">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" placeholder="Ex: example@example.com" name="email" required class="input">
                                            </div>
                                            <div class="form-group">
                                                <label>User Type</label>
                                                    <select class="form-control text-muted" placeholder="SELECT USER TYPE" name="utype" required class="input" style="background-color:#27293d;">
                                                        <option value="" style="font-size: 15px;">SELECT USER TYPE</option>
                                                        <option value="admin" style="color:white; font-size: 15px;">Admin</option>
                                                        <option value="teacher" style="color:white; font-size: 15px;">Teacher</option>
                                                        <option value="student" style="color:white; font-size: 15px;">Student</option>
                                                    </select>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-fill btn-primary" name="submit">Register User</button>
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